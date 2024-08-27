<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use HasFactory;
    protected $fillable = ['serial_code', 'description'];

    public function diagnosis()
    {
        return $this->hasOne(Diagnosis::class, 'cow_serial_code', 'cow_serial_code');
    }
}

