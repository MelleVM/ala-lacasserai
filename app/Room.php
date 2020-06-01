<?php
// Room.php

namespace App;

// dingen die gebruikt worden 
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    // Table Name
    protected $table = 'rooms';

    protected $fillable = [
        'title', 'room_number', 'floor', 'description', 'type', 'rating', 'state', 'price', 'disc', 'clean', 'cover_image'
    ];
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user() {
        return $this->belongsTo('App\Room');
    }
}