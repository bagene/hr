<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = $request->user()
            ->organization
            ->users
            ->load('department');

        return Inertia::render('Employees/Index', compact('employees'));
    }

    public function show(User $employee)
    {
        return Inertia::render('Employees/Show', [
            'employee' => $employee->load('department'),
        ]);
    }
}
