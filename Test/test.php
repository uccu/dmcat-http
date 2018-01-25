<?php

require_once __DIR__."/../vendor/autoload.php";


use Uccu\DmcatTool\Tool\LocalConfig;
use Uccu\DmcatHttp\Request;
use Uccu\DmcatHttp\Response;

// define('REQUEST_PATH','xxx');

$req = Request::getSingleInstance();


// $res = Response::getSingleInstance();
// $res->r302('https://www.baidu.com');

// echo $req->get('a','s');
echo REQUEST_PATH;




echo "\n";