<?php

use kartik\datecontrol\Module;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => BASE_PATH,
    'vendorPath' => VENDOR_PATH,
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'aYQrSPDJCMW43zLZhbZljxSJwa1w9TGB',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mail',

            'transport' => [
                'class'      => 'Swift_SmtpTransport',
                'host'       => $_ENV['MAILER_HOST'],
                'username'   => $_ENV['MAILER_USERNAME'],
                'password'   => $_ENV['MAILER_PASSWORD'],
                'port'       => $_ENV['MAILER_PORT'],
                'encryption' => $_ENV['MAILER_ENCRYPTION'],
            ],

            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => $_ENV['USE_MAILER'] === "true" ? false : true,

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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:[\w\-]+>/<id:\d+>' => '<controller>/view',
                '<controller:[\w\-]+>/<action:[\w\-]+>/<id:\d+>' => '<controller>/<action>',
                '<controller:[\w\-]+>/<action:[\w\-]+>' => '<controller>/<action>',
            ],
        ],
        'formatter' => [
            'class'             => 'yii\i18n\Formatter',
            'nullDisplay'       => '-',
            'thousandSeparator' => ',',
            'decimalSeparator'  => '.',
            'currencyCode'      => 'Rp ',
        ],
        // 'assetManager' => [
        //     'bundles' => [
        //         'yii\bootstrap4\BootstrapAsset' => false,
        //         'yii\bootstrap\BootstrapAsset' => false,
        //         'yii\bootstrap\BootstrapPluginAsset' => false,
        //         'wbraganca\dynamicform\DynamicFormAsset' => [
        //             'basePath' => '@webroot/js',
        //             'baseUrl' => '@web/js',
        //             'js' => [
        //                 YII_ENV_DEV ? 'replace-yii2-dynamic-form.js' : 'replace-yii2-dynamic-form.min.js',
        //             ],
        //         ],
        //         'johnitvn\ajaxcrud\CrudAsset' => [
        //             'basePath' => '@webroot/js',
        //             'baseUrl' => '@web/js',
        //             'depends' => [
        //                 'yii\web\YiiAsset',
        //             ],
        //             'css' => [],
        //         ],
        //     ],
        // ],
        'i18n' => [
            'translations' => [
                'diecoding' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@diecoding/languages',
                ],
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/languages',
                ],
            ],
        ],

        'assign' => [
            'class' => 'app\components\Assign',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        // 'themeConfig' => [
        //     'class' => 'diecoding\components\ThemeConfig',
        // ],
        // 'device' => [
        //     'class' => 'skeeks\yii2\mobiledetect\MobileDetect'
        // ],
    ],
    'params' => $params,
    'as access' => [
        'class' => 'diecoding\rbac\components\AccessControl',
        'allowActions' => [
            '*',
            // 'site/*',
        ],
        'denyActions' => [
            // 'setup-rbac/*',
        ],
    ],
    // 'container' => [
    //     'definitions' => [
    //         \yii\widgets\LinkPager::class => \yii\bootstrap4\LinkPager::class,
    //     ],
    // ],

    'modules' => [

        'setup-rbac' => [
            'class' => 'diecoding\rbac\Module',
            'menus' => [
                // 'user' => null,
                // 'rule' => null,
                // 'menu' => null,
            ],
        ],

        // SETUP KONFIGURASI KARTIK GRIDVIEW
        'gridview' => [
            'class' => 'kartik\grid\Module',
        ],

        // SETUP KONFIGURASI KARTIK DATECONTROL
        'datecontrol' => [
            'class' => 'kartik\datecontrol\Module',
            // format settings for displaying each date attribute (ICU format example)
            'displaySettings' => [
                Module::FORMAT_DATE => 'dd MMMM yyyy',
                Module::FORMAT_TIME => 'HH:mm:ss',
                Module::FORMAT_DATETIME => 'dd-MM-yyyy HH:mm:ss',
            ],
            // format settings for saving each date attribute (PHP format example)
            'saveSettings' => [
                Module::FORMAT_DATE => 'yyyy-MM-dd',                // saves as unix timestamp
                Module::FORMAT_TIME => 'HH:mm:ss',
                Module::FORMAT_DATETIME => 'yyyy-MM-dd HH:mm:ss',
            ],
            // set your display timezone
            'displayTimezone' => 'Asia/Jakarta',
            // set your timezone for date saved to db
            'saveTimezone' => 'UTC+7',
            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,
            // use ajax conversion for processing dates from display format to save format.
            'ajaxConversion' => true,
        ],
    ],
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
        // 'generators' => [
            // 'crud-frogetor' => [
            //     'class' => 'themes\frogetor\generators\crud\Generator',
            // ],
            // 'ajaxcrud-frogetor' => [
            //     'class' => 'themes\frogetor\generators\ajaxcrud\Generator',
            // ],
        // ]
    ];
}

return $config;
