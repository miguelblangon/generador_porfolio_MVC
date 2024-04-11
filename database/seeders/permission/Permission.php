<?php
namespace Database\Seeders\Permission;

class Permission{
    private $regular,$unicos;
    public function __construct(array $regular=[] ,array $unicos =[]){
        $this->regular=$regular;
        $this->unicos=$unicos;
    }

    public function permission():array {
        $permission=[];
        if ($this->regular) {
            foreach ($this->regular as $value) {
                $permission[]='create-'.$value;
                $permission[]='view-'.$value;
                $permission[]='edit-'.$value;
                $permission[]='delete-'.$value;
                $permission[]='only-user-'.$value;
            }
        }

        if ($this->unicos) {
            foreach ($this->unicos as $value) {
                $permission[]='view-'.$value;
            }
        }

        return  $permission;
    }
    public function roles(string $permiso,array $accessControl) : array
    {
        $permission=[];
        foreach ($accessControl as  $value) {
            $permission[]=$value.'-'.$permiso;
        }
        return $permission;
    }
}
