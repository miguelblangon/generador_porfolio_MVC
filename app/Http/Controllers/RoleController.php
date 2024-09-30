<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-role|edit-role|delete-role', ['only' => ['index','show']]);
        $this->middleware('permission:create-role', ['only' => ['create','store']]);
        $this->middleware('permission:edit-role', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-role', ['only' => ['destroy']]);
    }
    private function btnEdit(int $id):string {

        return '<a href="'.route("roles.edit",$id).'" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </a>';

    }
    private function btnDelete(int $id):string {

        return '
        <form action="'.route('roles.destroy',$id).'" method="post" class="d-inline">'.
        '<input type="hidden" name="_token" value="'. csrf_token(). '" />
        <input type="hidden" name="_method" value="DELETE">
        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
            <i class="fa fa-lg fa-fw fa-trash"></i>
        </button>
        </form>';

    }


   /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $roles = Role::orderBy('id','DESC')->get(['id','name']);
        $array = [];
            foreach ($roles as $value) {
                $array[]= [$value->id,$value->name,'<nobr>'.$this->btnEdit($value->id).$this->btnDelete($value->id).'</nobr>'];
            }
        return view('roles.index', [
            'roles' => $array
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('roles.create', [
            'permissions' => Permission::get(['id','name'])->pluck('name','name')->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request): RedirectResponse
    {
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions??[]);
        return redirect()->route('roles.edit', $role->id)
                ->with(['message'=>'Rol Creado con exito','icon'=>'success']);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        if($role->name=='Super Admin'){
            abort(403, 'El ROL SUPER ADMIN NO PUEDE SER EDITADO');
        }
        return view('roles.edit', [
            'role' => $role,
            'permissions' => Permission::get(['id','name'])->pluck('name','name')->toArray() ,
            'rolePermissions' => $role->permissions->pluck('name','name')->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {

        $input = $request->only('name');
        $role->update($input);
        $role->syncPermissions($request->permissions??[]);

        return redirect()->back()
                ->with(['message'=>'Rol Actualizado','icon'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        if($role->name=='Super Admin'){
            abort(403, 'EL ROL SUPER ADMIN NO PUEDE SER ELIMINADO');
        }
        if(auth()->user()->hasRole($role->name)){
            abort(403, 'NO SE PUEDE ELIMINAR EL ROL ASIGNADO AL USUARIO');
        }
        $role->delete();
        return redirect()->route('roles.index')
        ->with(['message'=>'Rol Eliminado','icon'=>'error']);
    }


}
