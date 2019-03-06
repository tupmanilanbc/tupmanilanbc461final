<?php namespace App\Requests;

use Kernel\Requests\HTTPRequest;

class CreateAccountRequest extends HTTPRequest
{

    /**
     * This is the route that will be used
     * to redirect when errors are present
     */
    protected $route = '/register';


    /**
     * Rules to be followed by request
     */
    protected $rules = [
        'firstname'        => 'required|min:2',
        'lastname'         => 'required|min:2',
        'email'            => 'name:Email|required|email|unique:users',
        'department'       => 'required',
        'username'         => 'required|min:8|max:32|unique:users',
        'password'         => 'required|min:8|max:32',
        'confirm-password' => 'required|match:password',
    ];

}