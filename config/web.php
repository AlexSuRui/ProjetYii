<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'app',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu', // it can be '@path/to/your/layout'.
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'app\models\User',
                    'idField' => 'user_id'
                ],
            ],
        ],
        'menus' => [
            'assignment' => [
                'label' => 'Grand Access' // change label
            ],
            'route' => null, // disable menu route
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ]
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '3tOqGF22V_TRFhwwNVzBM_s3-vKVO-SK',
        ],
        'cache' => [
            'class' => 'yii\caching\fileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'ad' => [
            'class' => 'Edvlerblog\Adldap2\Adldap2Wrapper',
            /*
             * Set the default provider to one of the providers defined in the
             * providers array.
             *
             * If this is commented out, the entry 'default' in the providers array is
             * used.
             *
             * See https://github.com/Adldap2/Adldap2/blob/master/docs/connecting.md
             * Setting a default connection
             *
             */
            // 'defaultProvider' => 'another_provider',

            /*
             * Adlapd2 v7.X.X can handle multiple providers to different Active Directory sources.
             * Each provider has it's own config.
             *
             * In the providers section it's possible to define multiple providers as listed as example below.
             * But it's enough to only define the "default" provider!
             */
            'providers' => [
                /*
                 * Always add a default provider!
                 *
                 * You can get the provider with:
                 * $provider = \Yii::$app->ad->getDefaultProvider();
                 * or with $provider = \Yii::$app->ad->getProvider('default');
                 */
                'default' => [//Providername default
                    // Connect this provider on initialisation of the LdapWrapper Class automatically
                    'autoconnect' => true,
                    // The provider's schema. Default is \Adldap\Schemas\ActiveDirectory set in https://github.com/Adldap2/Adldap2/blob/master/src/Connections/Provider.php#L112
                    // You can make your own https://github.com/Adldap2/Adldap2/blob/master/docs/schema.md or use one from https://github.com/Adldap2/Adldap2/tree/master/src/Schemas
                    // Example to set it to OpenLDAP:
                    // 'schema' => new \Adldap\Schemas\OpenLDAP(),
                    // The config has to be defined as described in the Adldap2 documentation.
                    // https://github.com/Adldap2/Adldap2/blob/master/docs/configuration.md
                    'config' => [
                        // Your account suffix, for example: matthias.maderer@example.lan
                        'account_suffix' => '@example.lan',
                        // You can use the host name or the IP address of your controllers.
                        'domain_controllers' => ['server01.example.lan', 'server02.example.lan'],
                        // Your base DN. This is usually your account suffix.
                        'base_dn' => 'dc=example,dc=lan',
                        // The account to use for querying / modifying users. This
                        // does not need to be an actual admin account.
                        'admin_username' => 'username_ldap_access',
                        'admin_password' => 'password_ldap_access!',
                    ]
                ],
            ], // close providers array
        ], //close ad
        'db' => require(__DIR__ . '/db.php'),
//        'urlManager' => [
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
//            'rules' => [
//            ],
//        ],  
    ],
//    
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
