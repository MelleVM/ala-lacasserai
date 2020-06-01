<?php
// RoomsController.php

namespace App\Http\Controllers;

// dingen die gebruikt worden door de controller 
use Illuminate\Http\Request;
use App\Booking;
use App\User;
use App\Room;
use App\Order;
use DB;

use App\Http\Requests\Admin\UpdateBookingsRequest;

class RoomsController extends Controller
{
            /*
    |--------------------------------------------------------------------------
    | Rooms Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the display, editing and creation of rooms.
    |
    */
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
        
        $title = 'Rooms';
        $search = \Request::get('search'); 
        $sort = \Request::get('sort');
        $show_order = \Request::get('show_order');

        if (empty($sort)) {
            $sort = 'title';
        }
        if (empty($show_order)) {
            $show_order = 'asc';
        }
        $rooms = Room::where('title','like','%'.$search.'%')->orderBy($sort, $show_order)->paginate(15);
     
        return view('rooms.index',compact('rooms'))->with('title', $title);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {

        $rooms = Room::get()->pluck('room_number', 'id')->prepend(trans('Please Select'), '');

        $room = Room::find($id);
        return view('rooms.show', compact('rooms'))->with('room', $room);
  
    }


}

