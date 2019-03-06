<?php namespace App\Migrations;

use Kernel\Database\Migration;

class EducationalAttainmentMigration extends Migration
{

    /**
     * name of the table to migrate
     **/
    protected $table = "app_educational_attainment";


    /**
     * field names and data types for this table
     */
    public function __construct()
    {
        $this->increments('id');
        $this->int('user_id');
        $this->varchar('degree_earned');
        $this->varchar('specialization');
        $this->varchar('institution');
        $this->varchar('year_obtained');
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