<?php

class AdminCtrl extends Auth
{
    /**
     * Controller Index
     * @return view
     **/
    public function index()
    {
        return render('admin/index');
    }
}
