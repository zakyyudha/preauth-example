<?php
\session_start();

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/preauth.php';


use Pdsi\Auth\Preauth;

$preauth = new Preauth($configPreauth);

$preauth->authenticate();