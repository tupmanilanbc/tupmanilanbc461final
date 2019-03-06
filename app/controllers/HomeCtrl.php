<?php

/**
 * Default controller
 * Class HomeController
 */
class HomeCtrl
{
    /**
     * @return View
     */
    public function index()
    {
        return View::render('auth/login');
    }
}
