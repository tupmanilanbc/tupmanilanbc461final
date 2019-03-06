<?php namespace App\Migrations;

use Kernel\Database\Migration;

class UsersTableMigration extends Migration
{

    /**
     * Name of the table to migrate
     **/
    protected $table = "users";


    /**
     * Setup field names data types
     * for this table
     **/
    public function __construct()
    {
        $this->increments('id');
        $this->varchar('firstname', ['null' => true]);
        $this->varchar('lastname', ['null' => true]);
        $this->char('username', ['unique' => true]);
        $this->char('password', ['unique' => true]);
        $this->char('email', ['unique' => true, 'null' => true]);
        $this->varchar('number');
        $this->varchar('avatar', ['null' => true]);
        $this->varchar('position', ['length' => 50, 'null' => true]);
        $this->varchar('department', ['nullable' => true]);
        $this->char('role', ['length' => 50]);
        $this->char('active', ['length' => 3]);
        $this->varchar('remember_token', ['null' => true]);
        $this->varchar('created');
        $this->varchar('updated');
    }


    /**
     * Install the migration
     *
     * @return void
     **/
    public function up()
    {
        return $this->install();
    }


    /**
     * Drop the table
     *
     * @return void
     **/
    public function down()
    {
        return $this->uninstall();
    }

}