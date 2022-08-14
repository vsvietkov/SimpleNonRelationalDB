<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Relations\BelongsTo;

class Answer extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'answers';

    protected $fillable = [
        'description', 'problem_id'
    ];

    /**
     * @return BelongsTo
     */
    public function problem(): BelongsTo
    {
        return $this->belongsTo(Problem::class);
    }
}
