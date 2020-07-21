<?php

return [
    //
    'commands' => [
        \Blankqwq\FactoryCode\Command\CreateStubCommand::class,
        \Blankqwq\FactoryCode\Command\CreateControllerCommand::class,
        \Blankqwq\FactoryCode\Command\CreateModelCommand::class,
        \Blankqwq\FactoryCode\Command\CreateClassCommand::class,
    ],
    //生产代码类型
    'type' => [
        'model'      => \Blankqwq\FactoryCode\Type\MakeModel::class,
        'controller' => \Blankqwq\FactoryCode\Type\MakeController::class,
    ],
    //生成文件后缀
    'file_suffix' => '.php',
    //驱动管理
    'manager' => \Blankqwq\FactoryCode\EngineManager::class,
    //模板目录
    'stub_folder' => './stub',

    //对应代码框架 目前支持['laravel','blankphp','default']
    'engine' => 'laravel',

    //是否开启注释
    'notes' => [
        'enable' => false,
    ],
    //缓存设置
    'cache' => [
        'enable' => true,
        'engine' => 'Cache',
        'type'   => 'Facade',
    ],
    //权限校验
    'gates' => [
        'enable' => false,
        'login'  => '',
        'guest'  => '',
        'diy'    => [],
    ],
    //表单校验
    'validate' => [
        'enable' => false,
    ],

    'stub_option' => [
        //Controller模板设定
        'controller' => [
            'laravel' => [
                'name_space' => 'App\Http\Controllers',
            ],
            'blankphp' => [
                'name_space' => 'App\Controllers',
            ],
            'default' => [
                'prefix'     => null,
                'suffix'     => 'Controllers',
                'name_space' => null,
            ],
        ],

        //Model模板设定
        'models' => [
            'laravel' => [
                'name_space' => 'App\Models',
            ],
            'blankphp' => [
                'name_space' => 'App\Models',
            ],
            'default' => [
                'prefix'     => null,
                'suffix'     => null,
                'name_space' => null,
            ],
        ],

        //Request模板
        'request' => [
            'laravel' => [
                'name_space' => 'App\Http\Requests',
            ],
        ],
    ],

];
