<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Answer extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'answers';

    protected $fillable = [
        'description', 'problem_id'
    ];
}
