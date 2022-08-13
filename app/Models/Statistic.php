<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Statistic extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'statistics';

    protected $fillable = [
        'answer_id',
        'count' // the number of people that chose the same answer
    ];
}
