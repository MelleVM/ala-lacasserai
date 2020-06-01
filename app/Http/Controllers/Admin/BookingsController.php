<?php
// admin/BookingsController.php

namespace App\Http\Controllers\Admin;


// dingen die gebruikt worden door de controller 
use Carbon\Carbon;
use App\Booking;
use App\User;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBookingsRequest;
use App\Http\Requests\Admin\UpdateBookingsRequest;

class BookingsController extends Controller
{
    /**
     * Display a listing of Booking.
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

            $bookings = Booking::all();


        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating new Booking.
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

        $users = User::get()->pluck('name', 'id')->prepend(trans('Please Select'), '');
        $rooms = Room::get()->pluck('id', 'id')->prepend(trans('Please Select'), '');

        return view('admin.bookings.create', compact('users', 'rooms'));
    }

    /**
     * Store a newly created Booking in storage.
     *
     * @param  \App\Http\Requests\StoreBookingsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingsRequest $request)
    {
        // als de gebruiker een role_id heeft dat gelijk is of kleiner dan 1
        // dan krijgt de gebruiker een error
        if (auth()->user()->role_id <= 1) {
            return abort(401);
        }

        $time_from = $request->time_from;
        $time_to = $request->time_to;

        $diff_hours = Carbon::parse($time_to)->diffInHours(Carbon::parse($time_from));
        $diff_days = Carbon::parse($time_to)->diffInDays(Carbon::parse($time_from));

        if ($time_from >= date("Y-m-d H:i") && $time_to >= date("Y-m-d H:i") && $time_to > $time_from) {

                if ($diff_hours >= 2) {
                    // $booking->nights = $diff_days; 
                    // $booking = Booking::create($request->all());

                $booking = new Booking;
                $booking->time_from = $request->time_from;
                $booking->time_to = $request->time_to;
                $booking->additional_information = $request->additional_information;
                $booking->user_id = $request->user_id;
                $booking->room_id = $request->room_id;
                $booking->room_number = $request->room_number;
                $booking->price = $request->price;
                $booking->payment_method = $request->payment_method;
                $booking->nights = $diff_days;
                $booking->save();






                    return redirect('/rooms')->with('success', 'Booking Created');
                } else {
                    return back()->with('error', "The minimum is 2 hours");
                }
        } 
        else {
            return back()->with('error', "The date/time is incorrect");
        }

    }


    /**
     * Show the form for editing Booking.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // als de gebruiker een role_id heeft dat gelijk is of kleiner dan 1
        // dan krijgt de gebruiker een error
        if (auth()->user()->role_id <= 1) {
            return abort(401);
        }

        $users = User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $rooms = Room::get()->pluck('room_number', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $booking = Booking::findOrFail($id);

        return view('admin.bookings.edit', compact('booking', 'users', 'rooms'));
    }

    /**
     * Update Booking in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingsRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingsRequest $request, $id)
    {
        // als de gebruiker een role_id heeft dat gelijk is of kleiner dan 1
        // dan krijgt de gebruiker een error
        if (auth()->user()->role_id <= 1) {
            return abort(401);
        }
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());


        return redirect()->route('admin.bookings.index');
    }


    /**
     * Display Booking.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // als de gebruiker een role_id heeft dat gelijk is of kleiner dan 1
        // dan krijgt de gebruiker een error
        if (auth()->user()->role_id <= 1) {
            return abort(401);
        }
        $booking = Booking::findOrFail($id);

        return view('admin.bookings.show', compact('booking'));
    }


    /**
     * Remove Booking from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // als de gebruiker een role_id heeft dat gelijk is of kleiner dan 1
        // dan krijgt de gebruiker een error
        if (auth()->user()->role_id <= 1) {
            return abort(401);
        }
        $booking = Booking::find($id);
        $booking->delete();

        return redirect('/admin/bookings')->with('success', 'Booking Removed');
    }

}
