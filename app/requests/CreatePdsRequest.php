<?php namespace App\Requests;

use Kernel\Requests\HTTPRequest;

class CreatePdsRequest extends HTTPRequest
{

    /**
     * This is the route that will be used
     * to redirect when errors are present
     */
    protected $route = '/app/pds/create';


    /**
     * Rules to be followed by request
     */
    protected $rules = [
        'firstname'             => 'required',
        'middlename'            => 'required',
        'lastname'              => 'required',
        'civil_status'          => 'required',
        'dob'                   => 'required',
        'home_address'          => 'required',
        'mailing_address'       => 'required',
        'telephone_number'      => 'required',
        'mobile_number'         => 'required',
        'college'               => 'required',
        'rank'                  => 'required',
        'department'            => 'required',
        'appointment_status'    => 'required',
        'last_appointment_date' => 'required',
        'date_submitted'        => 'required',
    ];

}