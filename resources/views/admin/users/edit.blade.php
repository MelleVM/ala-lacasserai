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
                <label for="exampleInputName1">Name</label>
                <input type="text" value="@isset($user->name){{$user->name}}@endisset" name="name" class="form-control" id="exampleInputName1" aria-describedby="emailHelp"
                    placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" value="@isset($user->email){{$user->email}}@endisset" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
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

