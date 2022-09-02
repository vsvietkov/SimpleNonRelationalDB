<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Relations\BelongsTo;
use Jenssegers\Mongodb\Relations\HasOne;

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

    /**
     * @return HasOne
     */
    public function statistic(): HasOne
    {
        return $this->hasOne(Statistic::class);
    }

    /**
     * @return string
     */
    public function getStatisticPercentage(): string
    {
        $answers    = Problem::find($this['problem_id'])->answers()->get();
        $totalCount = $answers[0]->statistic()->first()['count'] + $answers[1]->statistic()->first()['count'];

        return (($this->statistic()->first()['count'] / $totalCount) * 100) . '%';
    }
}
