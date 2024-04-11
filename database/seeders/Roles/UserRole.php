<?php
namespace Database\Seeders\Roles;

use Database\Seeders\Permission\Permission;

class UserRole{

    public function permission() :array{
        $permission=[];
        $permisos = new Permission();
        $permisos_array= ['create','view','edit','delete','only-user'];
        $models_permission=[
            'about-plantilla-usuario',
            'introduccion-plantilla-usuario',
            'plantilla-usuario',
            'user',
        ];
        foreach ($models_permission as  $models) {
            foreach ($permisos->roles($models,$permisos_array) as  $string) {
                $permission[]=$string;
            }
        }
        $menu_permission=[
            //'menu-lateral-user',
            //'menu-lateral-menu',
            'menu-lateral-about-plantilla-usuario',
            'menu-lateral-introduccion-plantilla-usuario',
            'menu-lateral-plantilla',
            'menu-lateral-plantilla-usuario',
        ];
        foreach ($menu_permission as  $models) {
            foreach ($permisos->roles($models,['view']) as  $string) {
                $permission[]=$string;
            }
        }
        return $permission;


    }
}
