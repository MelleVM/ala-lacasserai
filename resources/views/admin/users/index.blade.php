{{-- admin/users/index.blade.php --}}

{{-- gebruikt 'admin' layout --}}
@extends('layouts.admin')

{{-- content sectie --}}
@section('content')
 
<div class="container-admin">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>Users</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="/admin/users/create" class="btn btn-success"><span><i class="fas fa-plus-circle"></i> Add
                            New User</span></a>
                </div>
            </div>
        </div>
        <div class="scroll-wrapper">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Residence</th>
                    <th>Postal Code</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Checked In To</th>
                    <th>Checked In Room</th>
                    <th>Checked Out Time</th>
                    <th>Checked Out Room</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->residence}}</td>
                    <td>{{$user->postal_code}}</td>
                    <td>{{$user->email}}</td>
                    <td> @switch($user)

                        @case($user->role_id == 1)
                        User
                        @break

                        @case($user->role_id == 2)
                        Moderator
                        @break

                        @case($user->role_id == 3)
                        Administrator
                        @break

                        @endswitch</td>
                    <td>{{$user->checked_in_to}}</td>
                    <td>{{$user->checked_in_room}}</td>
                    <td>{{$user->checked_out_time}}</td>
                    <td>{{$user->checked_out_room}}</td>
                    <td>
                        <a href="/admin/users/{{$user->id}}/edit" class="edit"><i class="fas fa-pencil-alt"></i></a>
                        {{-- <a href="#deleteEmployeeModal" class="delete"><i
                                class="fas fa-trash-alt"></i></a> --}}

                        {!!Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST',
                        'class' => 'crud-btn-parent', 'name' => 'delete', 'id' => 'delete'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{-- {{Form::submit("Delete", ['class' => 'crud-btn crud-btn-delete'])}} --}}
                        {!!Form::close()!!}

                        <button type="submit" form="delete"><i
                                class="fas fa-trash-alt"></i></button>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        <div class="clearfix">
            <div class="hint-text">Showing <b>{{count($users)}}</b> out of <b>{{count($users)}}</b> entries</div>
        </div>
    </div>
</div>

@endsection
