<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if($user->hasRole('superadmin')) {
            return Inertia::render('Departments/Index', [
                'departments' => Department::all(),
            ]);
        }

        return Inertia::render('Departments/Index', [
            'departments' => $user->organization->departments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request): Response
    {
        $user = $request->user();

        if($user->hasRole('superadmin')) {
            return Inertia::render('Departments/CreateEdit', [
                'organizations' => Organization::all(),
            ]);
        }
        return Inertia::render('Departments/CreateEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'organization_id' => 'required',
        ]);

        $department = Department::create($input);

        return redirect()->route('department.show', $department);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return Inertia::render('Departments/Show', [
            'department' => $department->load('admins', 'employees'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addEmployee(Department $department)
    {
        $users = $department->organization->users()->doesntHave('department')->get();

        return Inertia::render('Departments/AddEmployee', compact('department', 'users'));
    }

    public function storeEmployee(Request $request, Department $department)
    {
        $input = $request->validate([
            'user_id' => 'required|exists:App\Models\User,id',
            'isAdmin' => 'required|boolean',
        ]);

        $user = User::find($input['user_id']);
        $user->department_id = $department->id;
        $user->save();

        if($input['isAdmin']) {
            $department->admins()->attach($user);
        }

        return redirect()->route('department.show', $department);
    }
}
