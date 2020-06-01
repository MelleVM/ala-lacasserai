<?php
// admin/RoomsController.php

namespace App\Http\Controllers\Admin;

// dingen die gebruikt worden door de controller 
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRoomsRequest;
use App\Http\Requests\Admin\UpdateRoomsRequest;

use DB;

class RoomsController extends Controller
{
    /**
     * Display a listing of Room.
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


            $rooms = Room::all();
        

        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating new Room.
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
        
        return view('admin.rooms.create');
    }

    /**
     * Store a newly created Room in storage.
     *
     * @param  \App\Http\Requests\StoreRoomsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomsRequest $request)
    {
        // als de gebruiker een role_id heeft dat gelijk is of kleiner dan 1
        // dan krijgt de gebruiker een error
        if (auth()->user()->role_id <= 1) {
            return abort(401);
        }


        //Handle file upload
        if($request->hasFile('cover_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        
        $room = Room::create($request->all());


        $room->cover_image = $fileNameToStore;



        return redirect()->route('admin.rooms.index');
    }


    /**
     * Show the form for editing Room.
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
        $room = Room::findOrFail($id);

        return view('admin.rooms.edit', compact('room'));
    }

    /**
     * Update Room in storage.
     *
     * @param  \App\Http\Requests\UpdateRoomsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomsRequest $request, $id)
    {
        // als de gebruiker een role_id heeft dat gelijk is of kleiner dan 1
        // dan krijgt de gebruiker een error
        if (auth()->user()->role_id <= 1) {
            return abort(401);
        }
        $room = Room::findOrFail($id);
        $room->update($request->all());



        return redirect()->route('admin.rooms.index');
    }


    /**
     * Display Room.
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
        $bookings = \App\Booking::where('room_id', $id)->get();

        $room = Room::findOrFail($id);

        return view('admin.rooms.show', compact('room', 'bookings'));
    }


    /**
     * Remove Room from storage.
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
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('admin.rooms.index');
    }

  
}