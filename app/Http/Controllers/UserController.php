<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
class UserController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-user|edit-user|delete-user', ['only' => ['index','show']]);
        $this->middleware('permission:create-user', ['only' => ['create','store']]);
        $this->middleware('permission:edit-user', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = User::orderBy('id','DESC')->get(['id','name','email']);
        $array = [];
        foreach ($model as  $value) {
            $array[]= $value->row;
        }
        return view('users.index', [
            'models' => $array
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->password);

        $user = User::create($input);
        $user->assignRole($request->roles);

        return redirect()->route('users.index')
                ->withSuccess('New user is added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        // Check Only Super Admin can update his [own Profile
        if ($user->hasRole('Super Admin')){
            if($user->id != auth()->user()->id){
                abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
            }
        }
        return view('users.edit', [
            'user' => $user,
            'roles' => Role::get(['id','name'])->pluck('name','name')->toArray(),
            'userRoles' => $user->roles->pluck('name','name')->toArray(),
            'permission'=>Permission::pluck('name','name')->toArray(),
            'userPermission'=>$user->getAllPermissions()->pluck('name')->toArray(),
            'usar'=>['Rol','Permisos']
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        //dd($request->request);
        $user->update(['name'=>$request->name]);


        if ($request->usar=='Rol' ) {
            $user->syncRoles($request->roles);
             $permision = Role::where('name', $request->roles)->first();
             $user->syncPermissions($permision->getAllPermissions()->pluck('name')->toArray());
        }

        if ($request->usar == 'Permisos' ) {
            $user->syncPermissions($request->permisos??[]);
        }
        return redirect()->back()
                ->with(['message'=>'Usuario Actualizado','icon'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        // About if user is Super Admin or User ID belongs to Auth User
        if ($user->hasRole('Super Admin') || $user->id == auth()->user()->id)
        {
            abort(403, 'No puedes borrar la cuenta de un administrador o tu propia cuenta');
        }

        $user->syncRoles([]);
        $user->syncPermissions([]);
        $user->delete();
        return redirect()->route('users.index')
                ->withSuccess('User is deleted successfully.');
    }
    //Funcion especial para Actualizar la contraseña de la peña por el tema del codigo
    public function updatePasswordCode($user, int $number):void {
       //dd($user->first() );
        $user->first()->update([
            'password'=>Hash::make($number)
        ]);
    }




}
