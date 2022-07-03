<?php
namespace Router;

include "pageController.php";
use Controller\Web;

class Route
{
    private static $routes = array();

    private function __construct() {}
    private function __clone() {}

    public static function route($pattern, $callback)
    {
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        self::$routes[$pattern] = $callback;
    }

    public static function execute($url)
    {
        $arr = explode('?',$url);
        $url = $arr[0];
        foreach (self::$routes as $pattern => $callback)
        {
            if (preg_match($pattern, $url, $params))
            {
                array_shift($params);
                return call_user_func_array($callback, array_values($params));
            }
        }
        return call_user_func('\Controller\Web::notFound');
    }
}