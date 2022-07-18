<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address_line_1',
        'address_line_2',
        'address_city',
        'address_region',
        'address_country',
        'organization_size',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
