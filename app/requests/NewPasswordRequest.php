<?php namespace App\Requests;

use Kernel\Requests\HTTPRequest as Request;

class NewPasswordRequest extends Request
{

    /**
     * This is the route that will be used
     * to redirect when errors are present
     */
    protected $route = '/admin/users/change-my-password';


    /**
     * Rules to be followed by request
     */
    protected $rules = [
        'new-password' => 'required|min:8',
        'confirm-password' => 'required|match:new-password',
        'current-password' => 'required',
    ];

}