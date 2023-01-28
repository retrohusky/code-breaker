<?php

namespace CodeBreaker;

use CodeBreaker\Controllers\CipherController;

require 'vendor/autoload.php';

App::instance();


$cipherController = new CipherController();
$cipherController->loadCipher();
$decoded = $cipherController->decode(')g!ld, j(!ad "> h>£ gdol>!o!" o!(!c>£');


$messageToCode = "Zażółć, gęślą jaźń.";
$codedMessage = $cipherController->code($messageToCode);
$decodedMessage = $cipherController->decode($codedMessage);
var_dump($decodedMessage === $messageToCode);