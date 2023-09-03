<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language' => 'ru',
    'sourceLanguage' => 'ru',
    'components' => [
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js'=>['../../themes/kobolg/assets/js/jquery-1.12.4.min.js']
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js'=>[]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],

            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '3QZSVAFInXiSj-xmSkZqC3fQ24RVHELe',
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
            // 'useFileTransport' to false and configure transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                    
                    'logFile' => '@app/runtime/logs/app.log'
                ],
            ],
        ],
        'db' => $db,
        'view'         => [
            'class' => 'app\components\View',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
    'on beforeAction' => function ($event){
        if (strpos($_SERVER['HTTP_ACCEPT'], 'text/html,application/xhtml+xml,application/xml;') !== false){
            $site = Yii::$app->db->createCommand("SELECT * FROM " . \app\components\helpers\Tbl::store . " WHERE site = :site")
            ->bindValue(':site', app\components\helpers\App::getDns())
            ->queryOne();
            if ($site && (Yii::$app->user->isGuest || in_array($site['user_id'], [Yii::$app->user->identity->id, Yii::$app->user->identity->parent_id]) ) ){
                $ln = Yii::$app->request->get('language');
                $language = Yii::$app->getRequest()->getCookies()->getValue('_language');
                $language = ($language) ? $language : 'ru';
                if ($ln && in_array($ln, array_keys(Yii::$app->params['languages'] ) ) ){
                    Yii::$app->response->cookies->add(new yii\web\Cookie([
                        'name' => '_language',
                        'value' => $ln,
                        'expire' => time() + 2592000,
                        'path' => "/"
                    ]));
                    $language = $ln;
                }
                Yii::$app->language = $language;
                Yii::$app->sourceLanguage = $language;

                $cur = Yii::$app->request->get('cur');
                $currency = Yii::$app->getRequest()->getCookies()->getValue('_currency');
                if (!$currency || $cur){
                    Yii::$app->response->cookies->remove('_currency');
                    Yii::$app->response->cookies->add(new yii\web\Cookie([
                        'name' => '_currency',
                        'value' => ($cur) ? $cur : 'rub',
                        'expire' => time() + 2592000,
                        'path' => "/"
                    ]));
                    Yii::$app->response->redirect(app\components\helpers\App::strip_param_from_url(yii\helpers\Url::current(), 'cur' ));
                }

                $vid = Yii::$app->getRequest()->getCookies()->getValue('_vid');

                if (!$vid){
                    Yii::$app->db
                        ->createCommand()
                        ->insert(\app\components\helpers\Tbl::visit, 
                            [
                                'domain' => str_ireplace('www.', '', parse_url(Yii::$app->request->hostinfo, PHP_URL_HOST)),
                                'created_at' => time()
                            ]
                        )
                        ->execute();

                    $vid = \app\components\helpers\App::idEncode(Yii::$app->db->getLastInsertID(), 32);

                    Yii::$app->db
                        ->createCommand()
                        ->update(\app\components\helpers\Tbl::visit, ['session' => $vid], ['id' => \app\components\helpers\App::idDecode($vid)])
                        ->execute();

                    Yii::$app->response->cookies->add(new yii\web\Cookie([
                        'name' => '_vid',
                        'value' => \app\components\helpers\App::idDecode($vid),
                        'expire' => time() + 3124138248,
                        'path' => "/"
                    ]));
                }
                //exit(\app\components\helpers\App::idDecode($vid));
                Yii::$app->db
                ->createCommand()
                ->insert(\app\components\helpers\Tbl::view, 
                    [
                        'visit_id' => \app\components\helpers\App::idDecode($vid),
                        'user_id' => (Yii::$app->user->isGuest) ? null : Yii::$app->user->identity->id,
                        'url' => Yii::$app->request->referrer,
                        'referer' => Yii::$app->request->hostInfo . Yii::$app->request->url,
                        'ip' => Yii::$app->getRequest()->getUserIP(),
                        'created_at' => time()
                    ]
                )->execute();
            }else{
                exit("404");
            }
        }
    }
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
