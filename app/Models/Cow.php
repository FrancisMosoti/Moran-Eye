<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cow extends Model
{
    use HasFactory;

    // Define which attributes can be mass assigned
    protected $fillable = [
        'serial_code',
        'breed',
        'dob',
        'purpose',
        'vaccination_health_records',
        'gender',
        'image',
        'user_id',
    ];
}
