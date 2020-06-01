<?php
// UsersController.php

namespace App\Http\Controllers;

// dingen die gebruikt worden door de controller 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use DB;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->role_id !== '3'){
            return redirect('/')->with('error', 'Unauthorized page');
        } else {
            $users = User::orderBy('created_at', 'desc')->paginate(5);
            return view('users.index')->with('users', $users);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show')->with('user', $user);
    }


}

