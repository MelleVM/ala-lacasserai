<?php
// PagesController.php

namespace App\Http\Controllers;

// dingen die gebruikt worden door de controller 
use Illuminate\Http\Request;
use App\Booking;


class PagesController extends Controller
{
    public function index() {
        $title = 'Home';
        // return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function profile() {
        return view('pages.profile');
    }

    public function bookings() {

        $bookings = Booking::all();

        return view('pages.bookings', compact('bookings'));
    }

    public function documentation() {
        return view('admin.documentation');
    }
}
