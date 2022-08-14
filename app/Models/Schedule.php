<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'break',
    ];

    public function schedule_details(): HasMany
    {
        return $this->hasMany(ScheduleDetail::class);
    }
}
