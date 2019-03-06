<?php

use Kernel\Security\Token;
class ClientAuth
{
    public function __construct()
    {
        if (!isset($_SESSION['client'])) {
            $_SESSION['__INTENDED__'] = $_SERVER['REQUEST_URI'];
            return Route::redirect(route('auth.login'));
        } else {
            Session::remove('__INTENDED__');
        }
    }
}