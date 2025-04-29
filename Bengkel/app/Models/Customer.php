<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = ['name', 'phone_number', 'address'];

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}
