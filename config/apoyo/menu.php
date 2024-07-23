<?php
return [
        ['header' => 'Secciones'],
        [
            'text' => 'Porfolio',
            'url' => 'porfolio',
            'active' => ['porfolio','porfolio/create','porfolio/*/edit'],
            'icon' => 'fas fa-book-dead',
            'can' => 'view-menu-lateral-plantilla-usuario',
        ],
        [
            'text' => 'Introducción',
            'url' => 'introduccion',
            'active' => ['introduccion','introduccion/create','introduccion/*/edit'],
            'icon' => 'fas fa-eye',
            'can' => 'view-menu-lateral-introduccion-plantilla-usuario',
        ],
        [
            'text' => 'Info. Personal',
            'url' => 'about_me',
            'active' => ['about_me','about_me/create','about_me/*/edit'],
            'icon' => 'fas fa-user-secret',
            'can' => 'view-menu-lateral-about-plantilla-usuario',
        ],
        [
            'text' => 'Habilidades',
            'url' => 'habilidad',
            'active' => ['habilidad','habilidad/create','habilidad/*/edit'],
            'icon' => 'fas fa-project-diagram',
            'can' => 'view-menu-lateral-habilidad-plantilla-usuario',
        ],
        [
            'text' => 'Estudios',
            'url' => 'estudio',
            'active' => ['estudio','estudio/create','estudio/*/edit'],
            'icon' => 'fas fa-medal',
            'can' => 'view-menu-lateral-estudio-plantilla-usuario',
        ],
        [
            'text' => 'Exp. Profesional',
            'url' => 'experiencias',
            'active' => ['experiencias','experiencias/create','experiencias/*/edit'],
            'icon' => 'fas fa-infinity',
            'can' => 'view-menu-lateral-experiencias-plantilla-usuario',
        ],
        [
            'text' => 'Cursos',
            'url' => 'cursos',
            'active' => ['cursos','cursos/create','cursos/*/edit'],
            'icon' => 'fas fa-hiking',
            'can' => 'view-menu-lateral-cursos-plantilla-usuario',
        ],
        [
            'text' => 'Servicios',
            'url' => 'servicios',
            'active' => ['servicios','servicios/create','servicios/*/edit'],
            'icon' => 'fas fa-hand-holding-usd',
            'can' => 'view-menu-lateral-servicios-plantilla-usuario',
        ],

        //Admins
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
            'icon' => 'fas fa-graduation-cap',
            'can' => 'view-menu-lateral-roles',
        ],
        [
            'text' => 'Plantilla',
            'url' => 'plantillas',
            'active' => ['plantillas','plantillas/create','plantaillas/*/edit'],
            'icon' => 'fas fa-file-import',
            'can' => 'view-menu-lateral-plantilla',
        ],
        [
            'text' => 'Secciones',
            'url' => 'secciones',
            'active' => ['secciones','secciones/create','secciones/*/edit'],
            'icon' => 'fas fa-folder',
            'can' => 'view-menu-lateral-secciones',
        ],
        [
            'text' => 'Noticias',
            'url' => 'noticias',
            'active' => ['noticias','noticias/create','noticias/*/edit'],
            'icon' => 'fas fa-rss',
            'can' => 'view-menu-lateral-noticias',
        ],

];

