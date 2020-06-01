{{-- admin/users/create.blade.php --}}

{{-- gebruikt 'admin' layout --}}
@extends('layouts.admin')

{{-- content sectie --}}
@section('content')
<div class="container-admin">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Create <b>User</b></h2>
                </div>
            </div>
        </div>

    {!! Form::open(['method' => 'POST', 'route' => ['admin.users.store']]) !!}
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control"
                    placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control"
                    placeholder="Enter address">
            </div>
            <div class="form-group">
                <label>Residence</label>
                <input type="text" name="residence" class="form-control"
                    placeholder="Enter residence">
            </div>
            <div class="form-group">
                <label>Postal Code</label>
                <input type="text" name="postal_code" class="form-control"
                    placeholder="Enter Postal Code">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">

            {{Form::label('role_id', 'Role')}}
            {{Form::select('role_id', ['1' => 'User', '2' => 'Moderator', '3' => 'Administrator'], 1, ['class' => 'browser-default custom-select', 'id' => 'exampleInputRole1'])}}

            </div>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}﻿
    </div>
</div>
@endsection
