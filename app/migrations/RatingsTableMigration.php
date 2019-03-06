<?php namespace App\Migrations;

use Kernel\Database\Migration;

class RatingsTableMigration extends Migration
{

    /**
     * name of the table to migrate
     **/
    protected $table = "ratings";


    /**
     * field names and data types for this table
     */
    public function __construct()
    {
        $this->increments('id');
        $this->int('user_id');
        $this->int('evaluator_id');

        $this->varchar('rate_educ_qual'); // educ pts      |
        $this->varchar('rate_exp_length'); // acad pts     | these will total the CCE Pts
        $this->varchar('rate_prof_honors'); // prof achiev |
        $this->varchar('rate_discoveries');
        $this->varchar('rate_expert_svcs');
        $this->varchar('rate_membership');
        $this->varchar('rate_awards');
        $this->varchar('rate_prof_exam');
        $this->varchar('rate_comm_outreach');
        $this->varchar('date_certified');

        // Another Form
        $this->varchar('qce_pts');
        $this->varchar('new_rank');

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