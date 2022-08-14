<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if($user->hasRole('superadmin')) {
            return Inertia::render('Employees/Index', [
                'employees' => User::all()->load('department'),
            ]);
        }
        
        $employees = $user->organization->users->load('department');

        return Inertia::render('Employees/Index', compact('employees'));
    }

    public function show(User $employee)
    {
        return Inertia::render('Employees/Show', [
            'employee' => $employee->load([
                'department',
                'profile' => fn($q) => $q->exclude(['id','created_at','updated_at']),
                'schedule',
                'schedule.schedule_details',
            ]),
        ]);
    }
}
