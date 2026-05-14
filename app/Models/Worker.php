<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkerWork;

class Worker extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'position',
        'photo',
        'experience',
        'description'
    ];
    public function works()
    {
        return $this->hasMany(WorkerWork::class);
    }
}
