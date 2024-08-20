<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_time',
        'task_description',
        'animal_id',
        'quantity',
        'worker_notes',
        'worker_id',
    ];

    // Relationships, if needed
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }
}
