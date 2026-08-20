<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobRequest extends Model
{
    protected $table = 'job_request';

	protected $hidden = [
    ];

	protected $guarded = [];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
