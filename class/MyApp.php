<?php

class MyApp
{

    public static function runRequest()
    {

        $uri = explode('/', $_SERVER['REQUEST_URI']);

        if (empty($uri[1])) {
            include $_SERVER['DOCUMENT_ROOT'] . '/controller/RunController.php';
            $controller = new RunController;
            if (empty($uri[2])) {
                $controller->index();
            }
        } else {
            $uri[1] = ucfirst($uri[1]) . 'Controller';
            include $_SERVER['DOCUMENT_ROOT'] . '/controller/' . $uri[1] . '.php';
            $controller = new $uri[1];
            $controller->{$uri[2]}();
        }

    }

    public static function isAjax()
    {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        }

        return false;
    }
}

