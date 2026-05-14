<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerWork extends Model
{
    use HasFactory;
    protected $fillable = [
        'worker_id',
        'title',
        'description',
        'work_image'
    ];

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}
