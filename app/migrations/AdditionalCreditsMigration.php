<?php namespace App\Migrations;

use Kernel\Database\Migration;

class AdditionalCreditsMigration extends Migration
{

    /**
     * name of the table to migrate
     **/
    protected $table = "app_additional_credits";


    /**
     * field names and data types for this table
     */
    public function __construct()
    {
        $this->increments('id');
        $this->int('user_id');
        $this->varchar('baccalaureate');
        $this->varchar('masters');
        $this->varchar('doctoral');
        $this->varchar('approval_status');
        $this->varchar('created');
        $this->varchar('updated');
    }


    /**
     * Install the migration
     *
     * @return void
     */
    public function up()
    {
        return $this->install();
    }


    /**
     * Drop the table
     *
     * @return void
     */
    public function down()
    {
        return $this->uninstall();
    }

}