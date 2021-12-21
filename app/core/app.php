<?php


/*
 * The urls are in the form of: website.com/controllerName/methodeName/parameters
 * based on the url, this class routes to the required controller with the required method
 * the default controller is 'home', default method is 'index'
 * */
class App
{
    protected $controller = "home";
    protected $method = "index";
    protected $params;

    public function __construct()
    {
        $url = $this->parseURL();

        // get controller
        $url[0] = str_replace("-", "_", $url[0]);
        if(file_exists("../app/controllers/" . strtolower($url[0]) . ".php"))
        {
            $this->controller = strtolower($url[0]);
            //unset($url[0]);
        }
        else // if such controller doesn't exist: redirect to home
        {
            header("Location: " . ROOT);
            die;
        }
        require_once "../app/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;


        // get methode
        if(isset($url[1]))
        {
            $url[1] = strtolower($url[1]);
            if(method_exists($this->controller, $url[1]) && is_callable([$this->controller, $url[1]]))
            {
                $this->method = $url[1];
                //unset($url[1]);
            }
            else // if such methode doesn't exist use the index methode
            {
                header("Location: " . ROOT . $url[0]);
            }
        }

        // get the rest from url --> Parameters
        $this->params = (count($url) > 2) ? array_slice($url, 2) : array();

        // run the controller's methode given the parameters
        call_user_func_array([$this->controller,$this->method], $this->params);
    }


    /**
     *  function returns {arr[0] = str0, arr[1] = str2 .....} from url website.com/str1/str2/str3...../
     * @param void
     * @return array
     */
    private function parseURL()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : "home";
        return explode("/", filter_var(trim($url,"/"),FILTER_SANITIZE_URL));
    }

}