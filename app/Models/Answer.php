<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Answer extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'answers';

    protected $fillable = [
        'description', 'problem_id'
    ];

    /**
     * @return BelongsTo|\Jenssegers\Mongodb\Relations\BelongsTo
     */
    public function problem(): BelongsTo|\Jenssegers\Mongodb\Relations\BelongsTo
    {
        return $this->belongsTo(Problem::class);
    }
}
