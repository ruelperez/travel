<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'location_name',
    ];

    public function resort(){
        return $this->hasMany(Resort::class);
    }

    use HasFactory;
}
