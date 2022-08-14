<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ScheduleController extends Controller
{
    /**
     * Create Schedule Page
     * 
     * @return Response
     */
    public function create(): Response
    {
        $templates = Schedule::where('user_id', 1)
            ->with('schedule_details')
            ->get();

        return Inertia::render('Schedules/Create', compact('templates'));
    }
}
