<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Inertia\Inertia;
use Inertia\Response;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Organizations/Index', [
            'orgs' => Organization::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Organizations/CreateEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => ['required'],
            'address_line_1' => ['required'],
            'address_line_2' => ['required'],
            'address_city' => ['required'],
            'address_region' => ['required'],
            'address_country' => ['required'],
            'organization_size' => ['required'],
        ]);

        $org = Organization::create($input);

        return Inertia::render('Organizations/Show', [
            'org' => $org->load('users'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $org)
    {
        return Inertia::render('Organizations/Show', [
            'org' => $org->load('users'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $org)
    {
        return Inertia::render('Organizations/CreateEdit', compact('org'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $org)
    {
        $input = $request->validate([
            'name' => ['required'],
            'address_line_1' => ['required'],
            'address_line_2' => ['required'],
            'address_city' => ['required'],
            'address_region' => ['required'],
            'address_country' => ['required'],
            'organization_size' => ['required'],
        ]);

        $org->update($input);

        return redirect(route('organization.show', $org));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \IlluminaCreatte\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Create user form for org
     * 
     * @param Organization $org
     * 
     * @return Response
     */
    public function create_account(Organization $org)
    {
        return Inertia::render('Organizations/CreateAccount', compact('org'));
    }

    /**
     * Create user for org
     * 
     * @param Request $request
     * @param Organization $org
     * 
     * @return Response
     */
    public function store_account(Request $request, Organization $org)
    {
        $input = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
        ]);

        $role = $request->validate([
            'role' => ['required'],
        ]);

        $user = $org->users()->create($input);
        $user->assignRole($role['role']);
 
        Password::sendResetLink(
            $request->only('email')
        );

        return redirect(route('organization.show', $org));
    }
}
