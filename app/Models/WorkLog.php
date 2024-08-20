<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkLog extends Model
{
    use HasFactory;

    protected $fillable = ['worker_id', 'work_description', 'log_date'];

    // Relationship with User (Worker)
    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }
}
