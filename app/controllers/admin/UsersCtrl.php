<?php

use Kernel\Security\Hash;
use Kernel\Security\Token;
use App\Models\Log;
use App\Models\User;
use Kernel\Requests\FileRequest as File;
use App\Requests\UserAccountRequest;
use App\Requests\NewPasswordRequest;
use App\Requests\EditUserAccountRequest;

class UsersCtrl extends Auth
{

    /**
     * Controller Index
     *
     * @return view
     **/
    public function index()
    {
        return render('admin/users/index');
    }


    /**
     * Fetch resource
     *
     * @return mixed
     **/
    public function fetch()
    {
        $users = User::order('id', 'desc')->get();

        print("
        <table class='table table-responsive table-striped table-bordered' id='table'>
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Username</td>
                <td>E-mail</td>
                <td>Number</td>
                <td>Role</td>
                <td>Active</td>
                <td>Date Added</td>
            </tr>
            </thead>
            <tbody>
        ");

        foreach ($users as $user):
            $icon = $user->active == 'yes' ? 'active' : 'inactive';
            $date = date('F j, Y', $user->created) . ' at ' . date('h:i A', $user->created);
            $strike = $user->active == 'no' ? 'strikeout' : '';
            $edit = $user->id == Session::user()->id ? " <sup><a href='" . route('admin.users.edit') . "'>[EDIT]</a></sup>" : '';

            $ifSuperUser = Session::user()->role == 'superadmin' ? "                <td class='table-manage'>
                    <span class='action btn-{$icon}' onclick='cms.toggle(\"" . route('admin.users.activate', $user->id) . "\")'></span>
                </td>" : "                <td class='table-manage'>
                    <span class='action btn-{$icon}'></span>
                </td>";

            print("
            <tr>
                <td>$user->id</td>
                <td class='$strike'>$user->firstname $user->lastname $edit</td>
                <td>$user->username</td>
                <td>$user->email</td>
                <td>$user->number</td>
                <td>$user->role</td>
                {$ifSuperUser}
                <td>$date</td>
            </tr>");
        endforeach;

        print ("</tbody></table>");
    }


    /**
     * Create a resource
     *
     * @return view
     * */
    public function create()
    {
        return render('admin/users/create');
    }


    /**
     * Store the resource
     *
     * @return view
     * */
    public function store()
    {
        $request = new UserAccountRequest();

        if ($request->validate()) {

            if (isset($_FILES['avatar'])) {
                $file = new File($_FILES['avatar']);
                $avatar = time() . '.' . $file->getExtension();
                $file->save('uploads/avatars/' . $avatar);
            } else {
                $avatar = 'default.jpg';
            }

            User::insert([
                'firstname' => $request->get('firstname'),
                'lastname' => $request->get('lastname'),
                'username' => $request->get('username'),
                'password' => Hash::encode($request->get('password')),
                'email' => $request->get('email'),
                'number' => $request->get('number'),
                'avatar' => $avatar,
                'position' => $request->get('position'),
                'role' => $request->get('role'),
                'active' => 'no',
                'remember_token' => Token::create(),
                'created' => time(),
                'updated' => time(),
            ]);

            Log::insert([
                'user_id' => Session::user()->id,
                'type' => 'users',
                'description' => 'User Accounts',
                'content' => 'added an account.',
                'created' => time(),
                'updated' => time(),
            ]);

            Session::setFlash('flash', "<h4 class='text-success'>New account created.</h4><br>");
            return redirect(route('admin.users.create'));
        }
    }


    /**
     * Edit a resource
     *
     * @return view
     */
    public function edit()
    {

        $user = User::find(Session::user()->id);

        return render('admin/users/edit', ['user' => $user]);
    }


    /**
     * update the resource
     *
     * @return mixed
     */
    public function update()
    {
        $request = new EditUserAccountRequest();


        if ($request->validate()) {
            $user = User::find($request->get('id'));

            if (strlen($_FILES['avatar']['name']) > 0) {
                $file = new File($_FILES['avatar']);
                $avatar = time() . '.' . $file->getExtension();
                $file->save('uploads/avatars/' . $avatar);
            } else {
                $avatar = $user->avatar;
            }

            $user->firstname = $request->get('firstname');
            $user->lastname = $request->get('lastname');
            $user->username = $request->get('username');
            $user->email = $request->get('email');
            $user->number = $request->get('number');
            $user->avatar = $avatar;
            $user->position = $request->get('position');
            $user->updated = time();

            if (Hash::encode($request->get('current-password')) == $user->password) {
                if ($user->save()) {
                    Session::setFlash('flash', "<h4 class='text-success'>Profile Updated.</h4><br>");
                } else {
                    Session::setFlash('flash', "<h4 class='text-error'>There's an error updating your profile.</h4><br>");
                }
            } else {
                Session::setFlash('flash', "<h4 class='text-error'>Please enter your current password to save.</h4><br>");
            }

            return redirect(route('admin.users.edit'));
        }
    }


    /**
     * Edit a resource
     *
     * @return view
     */
    public function changePassword()
    {
        $user = User::find(Session::user()->id);

        return render('admin/users/change-password', ['user' => $user]);
    }


    /**
     * update Password
     *
     * @return mixed
     */
    public function savePassword()
    {
        $request = new NewPasswordRequest();
        $user = User::find(Session::user()->id);

        if ($request->validate()) {
            if (Hash::encode($request->get('current-password')) == $user->password) {
                $user->password = Hash::encode($request->get('new-password'));
                if ($user->save()) {
                    Session::setFlash('flash', "<h4 class='text-success'>Password Updated, please try <b><a href='/login'>logging in</a></b> to see changes.</h4><br>");
                } else {
                    Session::setFlash('flash', "<h4 class='text-error'>There's an error updating your password.</h4><br>");
                }
            } else {
                Session::setFlash('flash', "<h4 class='text-error'>Please enter your current password to save.</h4><br>");
            }

            return redirect(route('admin.users.password'));
        }
    }


    /**
     * Destroy a resource
     *
     * @return redirect
     * @param $id
     */
    public function activate($id)
    {
        $user = User::find($id);

        if ($user->active == 'yes') {
            $user->active = 'no';
        } else {
            $user->active = 'yes';
        }

        if ($user->save()) {
            return print 1;
        } else {
            return print 0;
        }
    }
}
