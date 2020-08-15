<?php

// library
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/library/ip-vanish/module.php';

// implements
use Curl\Curl;
$IPVanish = new IPVanish();

// configuration
include('config/configuration.php');

$curl = new Curl();
$curl->setProxy($servers, $port, $username, $password);
$curl->setProxyType(CURLPROXY_SOCKS5);
$curl->get('http://checkip.dyndns.org/');

if ($curl->error) {
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
} else {
    preg_match_all('/IP Address: (.*)<\/body><\/html>/', $curl->response, $ip_address);

    echo $servers . ' | ' . $ip_address[1][0];
}