<?php
return [
        ['header' => 'Secciones'],
        [
            'text' => 'Porfolio',
            'url' => 'porfolio',
            'active' => ['porfolio','porfolio/create','porfolio/*/edit'],
            'icon' => 'fas fa-fw fa-user',
            'can' => 'view-menu-lateral-plantilla-usuario',
        ],
        [
            'text' => 'Introducción',
            'url' => 'introduccion',
            'active' => ['introduccion','introduccion/create','introduccion/*/edit'],
            'icon' => 'fas fa-fw fa-user',
            'can' => 'view-menu-lateral-introduccion-plantilla-usuario',
        ],
        [
            'text' => 'Info. Personal',
            'url' => 'about_me',
            'active' => ['about_me','about_me/create','about_me/*/edit'],
            'icon' => 'fas fa-fw fa-user',
            'can' => 'view-menu-lateral-about-plantilla-usuario',
        ],
        [
            'text' => 'Habilidades',
            'url' => 'habilidad',
            'active' => ['habilidad','habilidad/create','habilidad/*/edit'],
            'icon' => 'fas fa-fw fa-user',
            'can' => 'view-menu-lateral-about-plantilla-usuario',
        ],
        [
            'text' => 'Estudios',
            'url' => 'estudio',
            'active' => ['estudio','estudio/create','estudio/*/edit'],
            'icon' => 'fas fa-fw fa-user',
            'can' => 'view-menu-lateral-about-plantilla-usuario',
        ],
        ['header' => 'Acceso restringido', 'can' => 'view-menu-lateral-menu'],
        [
            'text' => 'Usuario',
            'url' => 'users',
            'active' => ['users','users/*/edit'],
            'icon' => 'fas fa-fw fa-user',
            'can' => 'view-menu-lateral-user',
        ],
        [
            'text' => 'Roles',
            'url' => 'roles',
            'active' => ['roles','roles/*/edit'],
            'icon' => 'fas fa-fw fa-user',
            'can' => 'view-menu-lateral-roles',
        ],
        [
            'text' => 'Menu',
            'url' => 'menu',
            'icon' => 'fas fa-fw fa-user',
            'can' => 'view-menu-lateral-menu',
        ],
        [
            'text' => 'Plantilla',
            'url' => 'plantillas',
            'active' => ['plantillas','plantillas/create','plantaillas/*/update'],
            'icon' => 'fas fa-fw fa-user',
            'can' => 'view-menu-lateral-plantilla',
        ],

];
