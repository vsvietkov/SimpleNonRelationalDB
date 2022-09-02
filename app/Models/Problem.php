<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Relations\HasMany;

class Problem extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'problems';

    protected $fillable = [
        'description', 'image'
    ];

    /**
     * @return HasMany
     */
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
