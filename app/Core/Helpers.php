<?php

namespace Core;

class Helpers
{

    public static function clean($data, $type = "str")
    {
        switch ($type) {
            case "str":
                return nl2br(htmlspecialchars(stripslashes(trim(strip_tags($data)))));
                break;
            case "int":
                return (int)$data;
            default:
                return nl2br(htmlspecialchars(stripslashes(trim(strip_tags($data)))));
                break;
        }
    }


    public static function asset($path = '')
    {
        $uri = BASE_PATH . '/' . BASE_ASSET_PATH . '/' . $path;

        return $uri;
    }


    public static function path($path = '')
    {
        $uri = BASE_PATH . '/' . $path;

        return $uri;
    }


    public static function parseURI()
    {
        $parseUri = [] ;
        if (isset($_GET['uri'])) {
            return $parseUri = explode('/', filter_var(rtrim(self::clean($_GET['uri']), '/'), FILTER_SANITIZE_URL));
        }

        return $parseUri;
    }


    public static function getQueryString()
    {
        $queryString = filter_var(rtrim(self::clean($_SERVER['QUERY_STRING']), '/'), FILTER_SANITIZE_URL);
        $queryString = explode('&', $queryString);
        unset($queryString[0]);
        $queryString = implode('&', $queryString);
        $queryString = trim($queryString, 'amp;amp;');

        return $queryString;
    }


    public static function getCurrentURI()
    {
        $parseUri = self::parseURI();
        $currentUri = $parseUri ? implode('/', self::parseURI()) : '';

        return $currentUri;
    }


    public static function isCurrentURI($path = '')
    {
        $currentUri = self::getCurrentURI();
        $strPos = ($path != '') ? strpos($currentUri, $path, 0) : -1;
        $bool = ($strPos === 0 || $path == $currentUri);

        return $bool;
    }


    public static function isRequestMethod($method = "POST")
    {
        $bool = false;
        if (strtoupper($_SERVER['REQUEST_METHOD']) == strtoupper($method)) {
            $bool = true;
        }

        return $bool;
    }


    public static function isAdminAuth()
    {
        return isset($_SESSION['admin_auth']) && $_SESSION['admin_auth'];
    }


    public static function adminAuth()
    {
        return $_SESSION['admin_auth'] = true;
    }
}
