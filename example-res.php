<?php

// library
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/library/ip-vanish/module.php';

// implements
use Curl\Curl;
$IPVanish = new IPVanish();

// configuration
include('config/configuration.php');

$collection = array(
    'servers' => $servers,
    'port' => $port,
    'username' => $username,
    'password' => $password,
);

print_r(json_encode($collection, JSON_PRETTY_PRINT));