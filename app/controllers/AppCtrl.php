<?php

/**
 * Default controller
 * Class HomeController
 */
class AppCtrl extends ClientAuth
{
    /**
     * @return View
     */
    public function index()
    {
        return View::render('app/dashboard');
    }
}
