<?php

require_once __DIR__."/../vendor/autoload.php";

use Uccu\DmcatTool\Traits\InstanceTrait;
use Uccu\DmcatTool\Tool\LocalConfig;
use Uccu\DmcatHttp\Request;
use Uccu\DmcatHttp\Response;
use Uccu\DmcatHttp\Route;

LocalConfig::$_CONFIG_ROOT = dirname(dirname(__FILE__)).'/Conf/';

// define('REQUEST_PATH','xxx');

$req = Request::getSingleInstance();


// $res = Response::getSingleInstance();
// $res->r302('https://www.baidu.com');

// echo $req->get('a','s');
// echo REQUEST_PATH;

class Con{
    use InstanceTrait;
    function f(){

        echo 'test';
    }
}

Route::getSingleInstance()->parse();

echo "\n";