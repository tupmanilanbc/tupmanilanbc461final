<?php

use App\Models\Log;
use App\Models\User;
use Kernel\Security\Hash;
use Kernel\Security\Token;
use App\Requests\LoginRequest;

class AuthCtrl
{

    /**
     * Show Login View
     *
     * @return view
     */
    public function index()
    {
        return View::render('auth/login');
    }

    /**
     * Login a user
     *
     * @return mixed
     */
    public function attempt()
    {
        $request = new LoginRequest($_POST);

        if ($request->validate()) {
            $attempt = User::where('username', $request->get('username'))
                ->where('password', Hash::encode($request->get('password')))
                ->where('active', 'yes');

            if ($attempt->exists()) {
                $user = $attempt->first();

                Log::insert([
                   'user_id' => $user->id,
                   'type' => 'Login',
                   'description' => "$user->role access.",
                   'content' => " logged in.",
                   'created' => time(),
                   'updated' => time(),
                ]);

                $user->remember_token = Token::create();
                $user->save();
                if ($user->role == 'administrator' || $user->role == 'superadmin') {
                    $_SESSION['user'] = $user();
                } else {
                    $_SESSION['client'] = $user();
                }

                if (intended()) {
                    return redirect(intended());
                } else {
                    if ($user->role == 'administrator' || $user->role == "superadmin") {
                        return Route::redirect('/admin');
                    } else {
                        return Route::redirect('/app');
                    }
                }
            } else {
                Session::setFlash('flash', '<i class="text-danger">username or password is incorrect.</i><br><br>');
            }
        }
        return Route::redirect(route('auth.login'));
    }

    /**
     * Logout
     *
     * @return Route
     */
    public function logout()
    {
        if (!empty(Session::user())) {
            Log::insert([
                'user_id' => Session::user()->id,
                'type' => 'Logout',
                'description' => Session::user()->role . " access.",
                'content' => " logged out of Admin.",
                'created' => time(),
                'updated' => time(),
            ]);
        } else if (!empty(Session::get('client'))) {
            Log::insert([
                'user_id' => Session::get('client')->id,
                'type' => 'Logout',
                'description' => Session::get('client')->role . " access.",
                'content' => " logged out of Faculty Interface.",
                'created' => time(),
                'updated' => time(),
            ]);
        }
        
        return Session::destroy();
    }
}