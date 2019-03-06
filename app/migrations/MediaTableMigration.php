<?php namespace App\Migrations;

use Kernel\Database\Migration;

class MediaTableMigration extends Migration
{

    /**
     * name of the table to migrate
     **/
    protected $table = "media";


    /**
     * field names and data types for this table
     */
    public function __construct()
    {
        $this->increments('id');
        $this->varchar('category', ['null' => true]);
        $this->text('notes', ['null' => true]);
        $this->varchar('name', ['unique' => true]);
        $this->varchar('extension', ['length' => 4]);
        $this->varchar('mime', ['length' => 50]);
        $this->int('size');
        $this->tinyint('user_id',['length' => 3]);
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