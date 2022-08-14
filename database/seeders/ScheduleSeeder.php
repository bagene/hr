<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::find(1);

        $fixed = Schedule::create([
            'user_id' => $superAdmin->id,
            'type' => 'fixed',
            'break' => 60,    
        ]);

        $flexi = Schedule::create([
            'user_id' => $superAdmin->id,
            'type' => 'flexible',
            'break' => 60,    
        ]);

        for($i = 1 ; $i < 8 ; $i++) {
            $isOff = $i > 5;
            
            $fixed->schedule_details()->create([
                'day' => $i,
                'start' => $isOff ? null : '08:00',
                'end' => $isOff ? null : '17:00',
                'break' => $isOff ? null : 60,
                'is_off' => $isOff,
            ]);

            $flexi->schedule_details()->create([
                'day' => $i,
                'start' => $isOff ? null : '08:00',
                'end' => $isOff ? null : '17:00',
                'break' => $isOff ? null : 60,
                'is_off' => $isOff,
            ]);
        }

    }
}
