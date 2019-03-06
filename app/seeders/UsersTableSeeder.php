<?php namespace App\Seeders;

use App\Models\User;
use Kernel\Security\Hash;

/**
 * Class UsersTableSeeder
 *
 * @package App\Seeders
 */
class UsersTableSeeder
{
    /**
     * Seed the database table
     */
    public function __construct()
    {
        User::insert([

            'firstname' => 'John',
            'lastname' => 'Doe',
            'username' => 'johndoe',
            'password' => Hash::encode('johndoe'),
            'email' => 'john.doe@email.dev',
            'number' => 999999999,
            'avatar' => 'default.jpg',
            'role' => 'superadmin',
            'active' => 'yes',
            'created' => time(),
            'updated' => time(),
        ]);

        User::insert([
            'firstname' => 'Jane',
            'lastname' => 'Doe',
            'username' => 'janedoe',
            'email'   => 'janedoe@email.net',
            'department' => 'Math',
            'password' => Hash::encode('janedoe'),
            'role'  => 'client',
            'active' => 'yes',
            'created' => time(),
            'updated' => time()
        ]);
    }
}