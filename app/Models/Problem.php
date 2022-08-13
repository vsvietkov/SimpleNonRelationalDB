<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Problem extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'problems';

    protected $fillable = [
        'description', 'image'
    ];

    /**
     * @return HasMany|\Jenssegers\Mongodb\Relations\HasMany
     */
    public function answers(): HasMany|\Jenssegers\Mongodb\Relations\HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
