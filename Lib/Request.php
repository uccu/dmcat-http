<?php
namespace Uccu\DmcatHttp;
use Uccu\DmcatTool\Traits\InstanceTrait;

class Request{

    use InstanceTrait;

    function __construct(){
        $this->flesh_path();
    }

    public $path;
    public $folder;



    public function flesh_path($request = null){

        if(!$request){
            global $argc;
            global $argv;
            if(defined('REQUEST_PATH'));
            elseif(!isset($argc)){
                define('REQUEST_PATH',!empty($_SERVER['PATH_INFO'])?substr($_SERVER['PATH_INFO'],1):($_SERVER['REQUEST_URI']?preg_replace('#\?.*$#','',substr($_SERVER['REQUEST_URI'],1)):''));
            }else define('REQUEST_PATH',$argv[1]);
            $request = REQUEST_PATH;
        }
        
        $this->folder = $request ? explode('/',$request) : array();
        $this->path = $request;

    }



    public function __get($name){

        if($name == 'get'){
            
            return $this->$name = $_GET;

        }elseif($name == 'post'){

            return $this->$name = $_POST;

        }elseif($name == 'request'){

            return $this->$name = $_REQUEST;
            
        }elseif($name == 'file'){

            return $this->$name = $_FILE;

        }elseif($name == 'cookie'){

            return $this->$name = $_COOKIE;

        }
        return null;

    }

    private function muti($name,$way,$filter){

        $name2 = [];

        foreach($name as $k=>$v){

            $g = $this->{$way}($v,$filter);
            if(!is_null($g))$name2[$v] = $g;
        }
        return $name2;
        

    }

    private function filter($content,$filter){
        if(is_null($content))return null;
        elseif($filter == 'd')return  floor($content);
        elseif($filter == 'raw')return $content;
        elseif($filter == 's')return (string)$content;

        return null;
    }

    

    function file($name){

        if(is_array($name)){

            return $this->muti($name,__FUNCTION__);
        }

        return $this->file[$name];
        
    }

    function __call($name,$args){

        if(!in_array($name,['get','post','request','cookie']))return null;

        empty($args[0]) && $args[0] = null;
        empty($args[1]) && $args[1] = 's';

        if(is_array($args[0])){

            return $this->muti($args[0],__FUNCTION__,$args[1]);
        }
        empty($this->{$name}[$args[0]]) && $this->{$name}[$args[0]] = null;
        return $this->filter($this->{$name}[$args[0]],$args[1]);

    }


    











}