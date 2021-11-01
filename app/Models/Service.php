<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public $guarded = [];

    public function carType()
    {
        return $this->belongsTo(CarType::class, 'car_types_id');
    }
}
