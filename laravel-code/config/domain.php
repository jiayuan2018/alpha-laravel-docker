<?php

$domain = env('APP_WEB_DOMAIN','.laravel-dev.com');

$allowDomain =  [
    '.laravel-dev.com',
    '.laravel-online.com',
    '.your-dev.com',
    '.your-online.com'
];
$requestHost = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
foreach($allowDomain as $allow){
    if(strpos($requestHost,$allow)!==false){
        return $requestHost;
    }
}

return rand(1000,2000).$domain;
