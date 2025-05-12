<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'location_id',
        'resort_id',
        'image',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function resort()
    {
        return $this->belongsTo(Resort::class);
    }

    use HasFactory;
}
