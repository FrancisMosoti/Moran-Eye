<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Apartment extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function Ap_Rooms(): HasMany
    {
        return $this->hasMany(Rooms::class);
    }

}
