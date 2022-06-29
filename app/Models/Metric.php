<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Metric extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'company_id',
        'request_id',
        'parent_request_id',
        'started_at',
        'ended_at',
        'request',
        'response',
    ];

    protected $casts = [
        'request' => 'array',
        'response' => 'array',
    ];

    public function timeInSeconds(): float
    {
        return (($this->ended_at - $this->started_at) / 1000000000);
    }
}
