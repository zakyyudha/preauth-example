<?php

$configPreauth = [
    'preauth_secret'=>'preauth-secret-satellite-only',
    'preauth'=>[
        'intranet'=>[
            'ipaddr'=>['127.0.0.1', '::1'],
            'preauthKey'=> "simple-sso-darto"
        ]
    ],
    'redirectTo' => 'index.php'
];