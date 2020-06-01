{{-- admin/rooms/create.blade.php --}}

{{-- gebruikt 'admin' layout --}}
@extends('layouts.admin')

{{-- content sectie --}}
@section('content')
<div class="container-admin">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Create <b>Room</b></h2>
                </div>
            </div>
        </div>

    {!! Form::open(['method' => 'POST', 'enctype' => 'multipart/form-data', 'route' => ['admin.rooms.store']]) !!}
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control"
                    placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label>Room Number</label>
                <input type="text" name="room_number" class="form-control" 
                    placeholder="Enter Room Number">
            </div>
            <div class="form-group">
                <label>Room Floor</label>
                <input type="text" name="floor" class="form-control" 
                    placeholder="Enter Room Floor">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" class="form-control" 
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
            {{Form::select('state', ['available' => 'Available', 'unavailable' => 'Unavailable'], 'available', ['class' => 'browser-default custom-select'])}}
            </div>
            <div class="form-group">
            {{Form::label('clean', 'Enter if room has been cleaned')}}
            {{Form::select('clean', [true => 'True', false => 'False'], true, ['class' => 'browser-default custom-select'])}}
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
                <label>Cover Image</label> <br>
                {{Form::file('cover_image')}}
            </div>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}﻿
    </div>
</div>
@stop
