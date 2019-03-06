<?php namespace App\Migrations;

use Kernel\Database\Migration;

class ConferencesSeminarsMigration extends Migration
{

    /**
     * name of the table to migrate
     **/
    protected $table = "app_conferences_seminars";


    /**
     * field names and data types for this table
     */
    public function __construct()
    {
        $this->increments('id');
        $this->int('user_id');
        $this->varchar('conference_title');
        $this->varchar('sponsor_agency');
        $this->varchar('inclusive_dates');
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