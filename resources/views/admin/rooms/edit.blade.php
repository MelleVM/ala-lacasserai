{{-- admin/rooms/edit.blade.php --}}

{{-- gebruikt 'admin' layout --}}
@extends('layouts.admin')

{{-- content sectie --}}
@section('content')
<div class="container-admin">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Edit <b>Room</b></h2>
                </div>
            </div>
        </div>

        {!! Form::model($room, ['method' => 'PUT', 'route' => ['admin.rooms.update', $room->id]]) !!}

            <div class="form-group">
                <label>Title</label>
                <input type="text" value="@isset($room->title){{$room->title}}@endisset" name="title" class="form-control"
                    placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label>Room Number</label>
                <input type="text" value="@isset($room->room_number){{$room->room_number}}@endisset" name="room_number" class="form-control" 
                    placeholder="Enter Room Number">
            </div>
            <div class="form-group">
                <label>Room Floor</label>
                <input type="text" value="@isset($room->floor){{$room->floor}}@endisset" name="floor" class="form-control" 
                    placeholder="Enter Room Floor">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" value="@isset($room->description){{$room->description}}@endisset" name="description" class="form-control" 
                    placeholder="Enter Description">
            </div>
            <div class="form-group">
            {{Form::label('type', 'Enter Room Type')}}
            {{Form::select('type', ['single' => 'Single', 'double' => 'Double', 'family' => 'Family'], 'single', ['class' => 'browser-default custom-select'])}}
            </div>
            <div class="form-group">
            {{Form::label('rating', 'Enter Room Rating')}}
            {{Form::select('rating', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'], 1, ['class' => 'browser-default custom-select'])}}
            </div>
            <div class="form-group">
            {{Form::label('state', 'Enter Room State')}}
            {{Form::select('state', ['available' => 'Available', 'unavailable' => 'Unavailable'], $room->state, ['class' => 'browser-default custom-select'])}}
            </div>
           <div class="form-group">
            {{Form::label('clean', 'Enter if room has been cleaned')}}
            {{Form::select('clean', [true => 'True', false => 'False'], $room->clean, ['class' => 'browser-default custom-select'])}}
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" value="@isset($room->price){{$room->price}}@endisset" name="price" class="form-control"
                    placeholder="Enter Price">
            </div>
            <div class="form-group">
                <label>Discount</label>
                <input type="text" value="@isset($room->disc){{$room->disc}}@endisset" name="disc" class="form-control"
                    placeholder="Enter Discount">
            </div>
            <div class="form-group">
                <label>Cover Image</label>
                <input type="text" value="@isset($room->cover_image){{$room->cover_image}}@endisset" name="cover_image" class="form-control"
                    placeholder="Enter Cover Image">
            </div>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}﻿
    </div>
</div>
@endsection

