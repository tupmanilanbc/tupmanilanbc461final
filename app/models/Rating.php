<?php namespace App\Models;

use Kernel\Database\QueryBuilder as Model;

/**
 * Class User
 * @package App\Models
 */
class Rating extends Model
{
    /**
     * table name that will be used by this model
     * @var string
     */
    protected static $table = "ratings";
}

