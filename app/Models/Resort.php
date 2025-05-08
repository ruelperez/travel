<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resort extends Model
{
    protected $fillable = [
        'location_id',
        'resort_name',
        'image',
        'price',
        'original',
        'type',
        'package',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function resort_pic(){
        return $this->hasMany(ResortPic::class);
    }

    use HasFactory;
}
