<?php
// admin/UsersController.php

namespace App\Http\Controllers\Admin;

// dingen die gebruikt worden door de controller 
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // als de gebruiker een role_id heeft dat gelijk is of kleiner dan 1
        // dan krijgt de gebruiker een error
        if (auth()->user()->role_id <= 1) {
            return abort(401);
        }


                $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // als de gebruiker een role_id heeft dat gelijk is of kleiner dan 1
        // dan krijgt de gebruiker een error
        if (auth()->user()->role_id <= 1) {
            return abort(401);
        }
        
        return view('admin.users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        // als de gebruiker een role_id heeft dat gelijk is of kleiner dan 1
        // dan krijgt de gebruiker een error
        if (auth()->user()->role_id <= 1) {
            return abort(401);
        }
        $user = User::create($request->all());



        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // als de gebruiker een role_id heeft dat gelijk is of kleiner dan 1
        // dan krijgt de gebruiker een error
        if (auth()->user()->role_id <= 1) {
            return abort(401);
        }
        

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        // als de gebruiker een role_id heeft dat gelijk is of kleiner dan 1
        // dan krijgt de gebruiker een error
        if (auth()->user()->role_id <= 1) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->update($request->all());



        return redirect()->route('admin.users.index');
    }


    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // als de gebruiker een role_id heeft dat gelijk is of kleiner dan 1
        // dan krijgt de gebruiker een error
        if (auth()->user()->role_id <= 1) {
            return abort(401);
        }
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // als de gebruiker een role_id heeft dat gelijk is of kleiner dan 1
        // dan krijgt de gebruiker een error
        if (auth()->user()->role_id <= 1) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }

}
