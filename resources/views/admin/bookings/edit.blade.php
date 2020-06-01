{{-- admin/bookings/edit.blade.php --}}

{{-- gebruikt 'admin' layout --}}
@extends('layouts.admin')

{{-- content sectie --}}
@section('content')

<div class="container-admin">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Edit <b>Booking</b></h2>
                </div>
            </div>
        </div>

        {!! Form::model($booking, ['method' => 'PUT', 'route' => ['admin.bookings.update', $booking->id]]) !!}
        <div class="form-group">
            <label>Time From</label>
            <input value="{{$booking->time_from}}" autocomplete="off" type="text" name="time_from" class="form-control datetimepicker" placeholder="Select date">
        </div>
        <div class="form-group">
            <label>Time To</label>
            <input value="{{$booking->time_to}}" autocomplete="off" type="text" name="time_to" class="form-control datetimepicker" placeholder="Select date">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input value="{{$booking->price}}" type="text" name="price" class="form-control" placeholder="Enter price">
        </div>
        <div class="form-group">
            <label>Room Number</label>
            <input value="{{$booking->room_number}}" type="text" name="room_number" class="form-control" placeholder="Enter room number">
        </div>
        <div class="form-group">
            {{Form::label('payed', 'Payed')}}
            {{Form::select('payed', [true => 'True', false => 'False'], $booking->payed, ['class' => 'browser-default custom-select'])}}
        </div>
            <div class="form-group">
            {{Form::label('state', 'State')}}
            {{Form::select('state', ['confirmed' => 'Confirmed', 'pending' => 'Pending'], $booking->state, ['class' => 'browser-default custom-select'])}}
        </div>
        <div class="form-group">
            <label>Payment Method</label>
            <input value="{{$booking->payment_method}}" type="text" name="payment_method" class="form-control" placeholder="Enter payment method">
        </div>
        <div class="form-group">
            {!! Form::label('room_id', trans('Room ID').'', ['class' => 'control-label']) !!}
            {!! Form::select('room_id', $rooms, old('room_id'), ['class' => 'form-control select2']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('user_id', trans('User ID').'', ['class' => 'control-label']) !!}
            {!! Form::select('user_id', $users, old('user_id'), ['class' => 'form-control select2']) !!}
        </div>
        <div class="form-group">
            <label>Additional Information</label>
            <textarea placeholder="Additional Information" name="additional_information" class="w-100 p-2"
                rows="8">{{$booking->additional_information}}</textarea>
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}﻿
    </div>
</div>
@stop

