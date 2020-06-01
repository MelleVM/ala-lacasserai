{{-- admin/rooms/index.blade.php --}}

{{-- gebruikt 'admin' layout --}}
@extends('layouts.admin')

{{-- content sectie --}}
@section('content')
<div class="container-admin">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>Rooms</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="/admin/rooms/create" class="btn btn-success"><span><i class="fas fa-plus-circle"></i> Add
                            New Room</span></a>
                </div>
            </div>
        </div>
        <div class="scroll-wrapper">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Rating (stars)</th>
                            <th>State</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Clean</th>
                            <th>Cover Image</th>
                            <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                <tr>
                            <td>{{$room->id}}</td>
                            <td>{{$room->title}}</td>
                            <td>{{$room->type}}</td>
                            <td>{{$room->rating}}</td>
                            <td>{{$room->state}}</td>
                            <td>{{$room->price}}</td>
                            <td>{{$room->disc}}</td>
                            <td>@if ($room->clean == true) True @else False @endif </td>
                            <td>{{$room->cover_image}}</td>
                    <td>
                        <a href="/admin/rooms/{{$room->id}}/edit" class="edit"><i class="fas fa-pencil-alt"></i></a>
                        {{-- <a href="#deleteEmployeeModal" class="delete"><i
                                class="fas fa-trash-alt"></i></a> --}}

                        {!!Form::open(['action' => ['RoomsController@destroy', $room->id], 'method' => 'POST',
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
            <div class="hint-text">Showing <b>{{count($rooms)}}</b> out of <b>{{count($rooms)}}</b> entries</div>
        </div>
    </div>
</div>


@endsection
