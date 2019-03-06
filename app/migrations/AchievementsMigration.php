<?php namespace App\Migrations;

use Kernel\Database\Migration;

class AchievementsMigration extends Migration
{

    /**
     * name of the table to migrate
     **/
    protected $table = "app_achievements";


    /**
     * field names and data types for this table
     */
    public function __construct()
    {
        $this->increments('id');
        $this->int('user_id');
        $this->varchar('award_title');
        $this->varchar('field_of_service');
        $this->varchar('organization');
        $this->varchar('level');
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