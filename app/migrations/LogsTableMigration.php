<?php namespace App\Migrations;

use Kernel\Database\Migration;

class LogsTableMigration extends Migration
{

    /**
     * name of the table to migrate
     **/
    protected $table = "logs";


    /**
     * field names and data types for this table
     */
    public function __construct()
    {
        $this->increments('id');
        $this->tinyint('user_id', ['length'=> 3]);
        $this->varchar('type');
        $this->tinytext('description', ['null' => true]);
        $this->text('content');
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