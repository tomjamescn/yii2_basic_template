<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'aliases' => [
        //此别名在Application.php中预定义了,但是不知道为什么,路径对不起来
        '@bower' => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' .DIRECTORY_SEPARATOR . 'bower-asset',
    ],
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'yuwyxiK6SR1CQueMNwFl4WEERJr4B3aQ',
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
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            //消息跟踪级别
            //假如 YII_DEBUG 开启则是3，否则是0。 这意味着，假如 YII_DEBUG 开启，每个日志消息在日志消息被记录的时候，
            //将被追加最多3个调用堆栈层级；假如 YII_DEBUG 关闭， 那么将没有调用堆栈信息被包含。
            'traceLevel' => YII_DEBUG ? 3 : 0,

            //每新增一条日志都落地到文件,部署到线上最好改大,否则高并发下可能会影响性能
            'flushInterval' => 1,

            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'exportInterval' => 1,
                    'levels' => ['error', 'warning', 'profile', 'trace', 'info'],
                    'logFile' => '@runtime/logs/console.log',
                    'logVars' => [],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,

    /*事件-begin*/
    'on beforeRequest' => function ($event) {
        Yii::trace("on beforeRequest");
    },
    'on beforeAction' => function ($event) {
        Yii::trace("on beforeAction");
    },
    'on afterRequest' => function ($event) {
        Yii::trace("on afterRequest");
    },

    'on afterAction' => function ($event) {
        Yii::trace("on afterAction");
    },
    /*事件-end*/

    //缺省路由
//    'defaultRoute' => 'site/about',

    //全路由拦截
//    'catchAll' => ['site/about'],

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
