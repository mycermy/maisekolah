<?php

namespace Core;

class Session
{
    public static function get($key, $default = null)
    {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function flash($key, $message)
    {
        $_SESSION['_flash'][$key] = $message;
    }
    
    public static function unflash()
    {
        $_SESSION['_flash'] = [];
    }

    public static function flush()
    {
        $_SESSION = [];
    }

    public static function destroy($name = 'PHPSESSID')
    {
        self::flush();

        session_destroy();

        $params = session_get_cookie_params();
        setcookie($name, "", time() - 86400, $params['path'], $params['domain']);
    }
}
