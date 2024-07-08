<?php
return[
    'Datatables' => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'asset' => true,
                'location' => 'vendor/datatables/js/jquery.dataTables.min.js',
            ],
            [
                'type' => 'js',
                'asset' => true,
                'location' => 'vendor/datatables/js/dataTables.bootstrap4.min.js',
            ],
            [
                'type' => 'css',
                'asset' => true,
                'location' => 'vendor/datatables/css/dataTables.bootstrap4.min.css',
            ],
        ],
    ],
    'Select2' => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'asset' => true,
                'location' => 'vendor/select2/js/select2.full.min.js',
            ],
            [
                'type' => 'css',
                'asset' => true,
                'location' => 'vendor/select2/css/select2.min.css',
            ],
            [
                'type' => 'css',
                'asset' => true,
                'location' => 'vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css',
            ],
        ],
    ],
    'Sweetalert2' => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'asset' => true,
                'location' => 'vendor/sweetalert2/sweetalert2.min.js',
            ],
            [
                'type' => 'css',
                'asset' => true,
                'location' => 'vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css',
            ],
        ],
    ],
    'Pace' => [
        'active' => false,
        'files' => [
            [
                'type' => 'css',
                'asset' => false,
                'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
            ],
            [
                'type' => 'js',
                'asset' => false,
                'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
            ],
        ],
    ],
    'BootstrapSwitch' => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'asset' => true,
                'location' => 'vendor/bootstrap-switch/js/bootstrap-switch.min.js',
            ],
        ],
    ],
    'TempusDominusBs4' => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'asset' => true,
                'location' => 'vendor/moment/moment.min.js',
            ],
            [
                'type' => 'js',
                'asset' => true,
                'location' => 'vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
            ],
            [
                'type' => 'css',
                'asset' => true,
                'location' => 'vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
            ],
        ],
    ],
    'Summernote' => [
    'active' => false,
    'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/summernote/summernote-bs4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/summernote/summernote-bs4.min.css',
                ],
        ],
    ],
];
