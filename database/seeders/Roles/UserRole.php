<?php
namespace Database\Seeders\Roles;

use Database\Seeders\Permission\Permission;

class UserRole{

    public function permission() :array{
        $permission=[];
        $permisos = new Permission();
        $permisos_array= ['create','view','edit','delete','only-user'];
        $models_permission=[
            'about-plantilla-usuario',//OK
            'curso',//OK
            'introduccion-plantilla-usuario', //OK
            'estudios',//OK
            'experiencia',//OK
            'habilidad',//OK
            'plantilla-usuario',//OK
            'servicio',//OK
        ];
        foreach ($models_permission as  $models) {
            foreach ($permisos->roles($models,$permisos_array) as  $string) {
                $permission[]=$string;
            }
        }
        $menu_permission=[
            'menu-lateral-about-plantilla-usuario',//OK
            'menu-lateral-introduccion-plantilla-usuario',//OK
            'menu-lateral-plantilla-usuario',//OK
            'menu-lateral-habilidad-plantilla-usuario',//OK
            'menu-lateral-estudio-plantilla-usuario',//OK
            'menu-lateral-experiencias-plantilla-usuario',//OK
            'menu-lateral-cursos-plantilla-usuario',//OK
            'menu-lateral-servicios-plantilla-usuario',//OK
            'plantilla',//OK
        ];
        foreach ($menu_permission as  $models) {
            foreach ($permisos->roles($models,['view']) as  $string) {
                $permission[]=$string;
            }
        }
        return $permission;
    }
}
