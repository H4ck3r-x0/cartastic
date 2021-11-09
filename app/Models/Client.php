<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $guarded = [];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function lastInvoice()
    {
        return $this->hasOne(Invoice::class)->latest();
    }
}
