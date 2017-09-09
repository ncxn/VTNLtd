<?php
/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new \Phalcon\Config([
    'version' => '1.0',

    'database' => [
        'adapter'  => 'Mysql',
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname'   => 'vtnltd',
        'charset'  => 'utf8',
    ],

    'application' => [
        'appDir'         => APP_PATH . '/',
        'modelsDir'      => APP_PATH . '/common/models/',
        'libraryDir'     => APP_PATH . '/common/library/',
        'formsDir'       => APP_PATH . '/common/forms/',
        'migrationsDir'  => APP_PATH . '/migrations/',
        'cacheDir'       => BASE_PATH . '/cache/',
        'baseUri'        => preg_replace('/public([\/\\\\])index.php$/', '', $_SERVER["PHP_SELF"]),
        'cryptSalt'      => 'eEAfR|_&G&f,+vU]:jFr!!A&+71w1Ms9~8_4L!<@[N@DyaIP_2My|:+.u>/6m,$D',
    ],

    'printNewLine' => true,
    
    'useMail'=> true,
    
    // phalcon-user-plugin
    'pup' => [
        'redirect' => [
            'success' => 'user/profile',
            'failure' => 'user/login'    
        ],
        'resources' => [
            'type' => 'public',
            'resources' => [
                '*' => [
                    // All except
                    'user' => ['account', 'profile']
                ]
            ]
        ]
      ],  
    'connectors' => [
        'facebook' => [
            'appId' => 'YOUR_FACEBOOK_APP_ID',
            'secret' => 'YOUR_FACEBOOK_APP_SECRET'
        ],
        'linkedIn' => [
            'api_key' => 'YOUR_LINKED_IN_APP_ID',
            'api_secret' => 'YOUR_LINKED_IN_APP_SECRET',
            'callback_url' => 'CALLBACK_URL'
        ],
        'twitter' => [
            'consumer_key' => 'TWITTER_CONSUMER_KEY',
            'consumer_secret' => 'TWITTER_CONSUMER_SECRET',
            // Leave empty if you don't want to set it
            'user_agent' => 'YOUR_APPLICATION_NAME'
        ],
        'google' => [
            'application_name' => 'YOUR_APPLICATION_NAME',
            'client_id' => 'YOUR_CLIENT_ID',
            'client_secret' => 'YOUR_CLIENT_SECRET',
            'developer_key' => 'YOUR_DEVELOPER_KEY',
            'redirect_uri' => 'YOUR_REDIRECT_URI'
        ]
    ]
]);
