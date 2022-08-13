<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Problem extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'problems';

    protected $fillable = [
        'description', 'image'
    ];
}
