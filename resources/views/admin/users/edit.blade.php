{{-- admin/users/edit.blade.php --}}

{{-- gebruikt 'admin' layout --}}
@extends('layouts.admin')

{{-- content sectie --}}
@section('content')
<div class="container-admin">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Edit <b>User</b></h2>
                </div>
            </div>
        </div>

        {!! Form::model($user, ['method' => 'PUT', 'route' => ['admin.users.update', $user->id]]) !!}

            <div class="form-group">
                <label>Name</label>
                <input type="text" value="@isset($user->name){{$user->name}}@endisset" name="name" class="form-control"
                    placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" value="@isset($user->email){{$user->email}}@endisset" name="email" class="form-control"
                    placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" value="@isset($user->address){{$user->address}}@endisset" name="address" class="form-control"
                    placeholder="Enter address">
            </div>
            <div class="form-group">
                <label>Residence</label>
                <input type="text" value="@isset($user->residence){{$user->residence}}@endisset" name="residence" class="form-control"
                    placeholder="Enter residence">
            </div>
            <div class="form-group">
                <label>Postal code</label>
                <input type="text" value="@isset($user->postal_code){{$user->postal_code}}@endisset" name="postal_code" class="form-control"
                    placeholder="Enter postal code">
            </div>
            <div class="form-group">
                <label>Checked in until</label>
                <input type="text" value="@isset($user->checked_in_to){{$user->checked_in_to}}@endisset" name="checked_in_to" class="form-control datetimepicker"
                    placeholder="Enter checked in until">
            </div>
            <div class="form-group">
                <label>Checked in room</label>
                <input type="text" value="@isset($user->checked_in_room){{$user->checked_in_room}}@endisset" name="checked_in_room" class="form-control"
                    placeholder="Enter checked in room">
            </div>
            <div class="form-group">
                <label>Checked out room</label>
                <input type="text" value="@isset($user->checked_out_room){{$user->checked_out_room}}@endisset" name="checked_out_room" class="form-control"
                    placeholder="Enter checked out room">
            </div>
            <div class="form-group">
                <label>Checked out time</label>
                <input type="text" value="@isset($user->checked_out_time){{$user->checked_out_time}}@endisset" name="checked_out_room" class="form-control datetimepicker"
                    placeholder="Enter checked out time">
            </div>
            <div class="form-group">

            {{Form::label('role_id', 'Role')}}
            {{Form::select('role_id', ['1' => 'User', '2' => 'Moderator', '3' => 'Administrator'], $user->role_id, ['class' => 'browser-default custom-select', 'id' => 'exampleInputRole1'])}}

            </div>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}﻿
    </div>
</div>


   
@endsection

