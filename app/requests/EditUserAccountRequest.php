<?php namespace App\Requests;

use Kernel\Requests\HTTPRequest as Request;

class EditUserAccountRequest extends Request
{

    /**
     * This is the route that will be used
     * to redirect when errors are present
     */
    protected $route = '/admin/users/edit-profile';


    /**
     * Rules to be followed by request
     */
    protected $rules = [
        'firstname' => 'required',
        'lastname' => 'required',
        'current-password' => 'required',
        'email' => 'required|email',
        'number' => 'required|numeric',
    ];

}