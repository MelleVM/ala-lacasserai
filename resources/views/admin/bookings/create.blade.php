{{-- admin/bookings/create.blade.php --}}

{{-- gebruikt 'admin' layout --}}
@extends('layouts.admin')

{{-- content sectie --}}
@section('content')

<div class="container-admin">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Create <b>Booking</b></h2>
                </div>
            </div>
        </div>

        {!! Form::open(['method' => 'POST', 'id' => 'booking-form', 'route' => ['admin.bookings.store']]) !!}
        <div class="form-group">
            <label>Time From</label>
                            <input type="text" autocomplete="off" name="time_from" class="datetimepicker form-control" placeholder="Select start date">
        </div>
        <div class="form-group">
            <label>Time To</label>
                            <input type="text" autocomplete="off" name="time_to" class="datetimepicker form-control" placeholder="Select end date">

        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="form-control" placeholder="Enter price">
        </div>
        <div class="form-group">
            <label>Room Number</label>
            <input type="text" name="room_number" class="form-control" placeholder="Enter room number">
        </div>
            <div class="form-group">
            {{Form::label('payed', 'Payed')}}
            {{Form::select('payed', [true => 'True', false => 'False'], false, ['class' => 'browser-default custom-select'])}}
        </div>
            <div class="form-group">
            {{Form::label('state', 'State')}}
            {{Form::select('state', ['confirmed' => 'Confirmed', 'pending' => 'Pending'], 'pending', ['class' => 'browser-default custom-select'])}}
        </div>
        <div class="form-group">
            <label>Payment Method</label>
            <input type="text" name="payment_method" class="form-control" placeholder="Enter payment method">
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
            <textarea placeholder="Additional Information" name="additional_information" class="w-100 p-2" rows="8"></textarea>
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}﻿
    </div>
</div>
@stop

{{-- extra javascript sectie --}}
@section('javascript')
@parent
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
</script>
<script>
    $('.datetimepicker').datetimepicker({
        format: "YYYY-MM-DD HH:mm"
    });

</script>
@stop
