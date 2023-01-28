<?php

namespace CodeBreaker;

require 'vendor/autoload.php';

App::instance();
var_dump(App::$path);

$cipherController = new \CodeBreaker\Controllers\CipherController();
$cipherController->loadCipher();
