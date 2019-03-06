<?php

/**
 * Default controller
 * Class HomeController
 */
use Kernel\Security\Hash;
use App\Requests\CreateAccountRequest as Request;
class RegistrationCtrl
{
    /**
     * @return View
     */
    public function index()
    {
        return View::render('frontend/registration');
    }


    public function store()
    {
        $req = new Request;

        if ($req->validate()) {
            $req->remove('confirm-password');
            $req->append('password', Hash::encode($req->get('password')));
            $req->append('role', 'client');
            $req->append('active', 'yes');
            $req->append('created', time());
            $req->append('updated', time());
            \App\Models\User::insert($req->values());
            Session::setFlash('flash', "<h4>You are now registered, proceed to <a href='/login/'>Login</a>.</h4>");
        } else {
            redirect('/register');
        }

        return redirect('/register');
    }
}
