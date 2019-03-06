<?php namespace App\Migrations;

use Kernel\Database\Migration;

class PdsTableMigration extends Migration
{

    /**
     * name of the table to migrate
     **/
    protected $table = "pds";


    /**
     * field names and data types for this table
     */
    public function __construct()
    {
        $this->increments('id');
        $this->int('user_id');
        $this->varchar('firstname');
        $this->varchar('middlename');
        $this->varchar('lastname');
        $this->varchar('civil_status');
        $this->varchar('dob');
        $this->varchar('home_address');
        $this->varchar('mailing_address');
        $this->varchar('telephone_number');
        $this->varchar('mobile_number');
        $this->varchar('college');
        $this->varchar('rank');
        $this->varchar('department');
        $this->varchar('present_rank');
        $this->varchar('appointment_status');
        $this->varchar('last_appointment_date');
        $this->varchar('date_submitted');
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