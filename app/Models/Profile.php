<?php

namespace App\Models;

use App\Traits\Excludable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;
    use Excludable;

    protected $fillable = [
        'employee_id',
        'first_name',
        'last_name',
        'gender',
        'nickname',
        'birthdate',
        'address_line',
        'address_city',
        'address_postcode',
        'address_province',
        'address_country',
        'telephone_number',
        'mobile_number',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
