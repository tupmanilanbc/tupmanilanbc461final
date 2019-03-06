<?php namespace App\Requests;

use Kernel\Requests\HTTPRequest as Request;

class UserAccountRequest extends Request
{

    /**
     * This is the route that will be used
     * to redirect when errors are present
     */
    protected $route = '/admin/users/new';


    /**
     * Rules to be followed by request
     */
    protected $rules = [
        'firstname' => 'required',
        'lastname' => 'required',
        'username' => 'required|min:8|unique:users',
        'password' => 'required|min:8|unique:users',
        'confirm-password' => 'required|match:password',
        'email' => 'required|email',
        'number' => 'required|numeric',
        'role' => 'required',
        'avatar' => 'required|file',
    ];

}