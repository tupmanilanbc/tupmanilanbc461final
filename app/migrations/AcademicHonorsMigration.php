<?php namespace App\Migrations;

use Kernel\Database\Migration;

class AcademicHonorsMigration extends Migration
{

    /**
     * name of the table to migrate
     **/
    protected $table = "app_academic_honors";


    /**
     * field names and data types for this table
     */
    public function __construct()
    {
        $this->increments('id');
        $this->int('user_id');
        $this->varchar('honors_received');
        $this->varchar('degree_obtained');
        $this->varchar('degree_obtained');
        $this->varchar('institution_address');
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