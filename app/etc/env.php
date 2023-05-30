<?php
return [
    'backend' => [
        'frontName' => 'admin'
    ],
    'cache' => [
        'graphql' => [
            'id_salt' => 'TsS4XS0f53sam8B5eB0nWi8CVNk5W9VI'
        ],
        'frontend' => [
            'default' => [
                'id_prefix' => 'f73_'
            ],
            'page_cache' => [
                'id_prefix' => 'f73_'
            ]
        ],
        'allow_parallel_generation' => false
    ],
    'remote_storage' => [
        'driver' => 'file'
    ],
    'queue' => [
        'consumers_wait_for_messages' => 1
    ],
    'crypt' => [
        'key' => '41506d2bb686493f8bf44f0e7d504340'
    ],
    'db' => [
        'table_prefix' => '',
        'connection' => [
            'default' => [
                'host' => 'localhost',
                'dbname' => 'magento2',
                'username' => 'admin',
                'password' => 'admin',
                'model' => 'mysql4',
                'engine' => 'innodb',
                'initStatements' => 'SET NAMES utf8;',
                'active' => '1',
                'driver_options' => [
                    1014 => false
                ]
            ]
        ]
    ],
    'resource' => [
        'default_setup' => [
            'connection' => 'default'
        ]
    ],
    'x-frame-options' => 'SAMEORIGIN',
    'MAGE_MODE' => 'developer',
    'session' => [
        'save' => 'files'
    ],
    'lock' => [
        'provider' => 'db'
    ],
    'directories' => [
        'document_root_is_pub' => true
    ],
    'cache_types' => [
        'config' => 1,
        'layout' => 0,
        'block_html' => 0,
        'collections' => 1,
        'reflection' => 1,
        'db_ddl' => 1,
        'compiled_config' => 1,
        'eav' => 1,
        'customer_notification' => 1,
        'config_integration' => 1,
        'config_integration_api' => 1,
        'full_page' => 0,
        'config_webservice' => 1,
        'translate' => 1
    ],
    'downloadable_domains' => [
        'alkeshsite.local'
    ],
    'install' => [
        'date' => 'Fri, 26 May 2023 16:49:25 +0000'
    ]
];
