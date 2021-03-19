<?php
//error_reporting(E_ERROR | E_WARNING);
/*
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */

class Core
{
    protected $params = [];
    protected $ans="";
    public function get($currenturl, $route)
    {
        if ($_SERVER['REQUEST_URI'] == $currenturl) {
            $url = rtrim($route, '@');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('@', $url);
            require_once '../app/controllers/' . $url[0] . '.php';
            $url[0] = new $url[0];
            call_user_func_array([$url[0], $url[1]], $this->params);
        }
//
        else{
            $url2 = rtrim($_SERVER['REQUEST_URI'], '/');
            $url2 = filter_var($url2, FILTER_SANITIZE_URL);
            $url2 = explode('/', $url2);
            /*if(isset($url2[1]) && !isset($url2[2]) && !isset($url2[3])){
                $this->ans = "/" . $url2[1];
            }
            elseif(isset($url2[1]) && isset($url2[2]) && isset($url2[3])){
                $this->ans = "/" . $url2[1] . "/" . $url2[2] . "/" . $url2[3];
            }*/
            $this->ans = '';
            foreach ($url2 as $key=>$value){
                if($key < 4) {
                    $this->ans .= $value;
                    $this->ans .= ($key==3)?"":"/";
                }
            }
            if ($this->ans == $currenturl) {
                require_once '../app/controllers/' . $url2[2] . '.php';
                $url2[2] = new $url2[2];
                call_user_func_array([$url2[2], $url2[3]], $this->params);
            }

        }
    }
}
//    protected $currentController = 'Pages';
//    protected $currentMethod = 'index';
//    protected $params = [];
//    public function __construct()
//    {
//        $url = $this->getUrl();
//        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
//            $this->currentController = ucwords($url[0]);
//            unset($url[0]);
//        }
//        require_once '../app/controllers/' . $this->currentController . '.php';
//        $this->currentController = new $this->currentController;
//        if (isset($url[1])) {
//            if (method_exists($this->currentController, $url[1])) {
//                $this->currentMethod = $url[1];
//                unset($url[1]);
//            }
//        }
//        $this->params = $url ? array_values($url) : [];
//        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
//    }
//    public function getUrl()
//    {
//        if (isset($_GET['url'])) {
//            $url = rtrim($_GET['url'], '/');
//            $url = filter_var($url, FILTER_SANITIZE_URL);
//            $url = explode('/', $url);
//            return $url;
//        }
//    }




