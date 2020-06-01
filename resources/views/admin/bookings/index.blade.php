{{-- admin/bookings/index.blade.php --}}

@inject('request', 'Illuminate\Http\Request')

{{-- gebruikt 'admin' layout --}}
@extends('layouts.admin')

{{-- content sectie --}}
@section('content')

    <div class="container-admin">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>Bookings</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="/admin/bookings/create" class="btn btn-success"><span><i class="fas fa-plus-circle"></i> Add
                            New Booking</span></a>
                </div>
            </div>
        </div>
        <div class="scroll-wrapper">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Time From</th>
                    <th>Time To</th>
                    <th>User ID</th>
                    <th>Room ID</th>
                    <th>Additional Information</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td>{{$booking->id}}</td>
                    <td>{{$booking->time_from}}</td>
                    <td>{{$booking->time_to}}</td>
                    <td>{{$booking->user_id}}</td>
                    <td>{{$booking->room_id}}</td>
                    <td>{{$booking->additional_information}}</td>
                    <td>
                        <a href="/admin/bookings/{{$booking->id}}/edit" class="edit"><i class="fas fa-pencil-alt"></i></a>

                        {!!Form::open(['action' => ['Admin\BookingsController@destroy', $booking->id], 'method' => 'POST',
                        'class' => 'crud-btn-parent', 'name' => 'delete', 'id' => 'delete'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
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
            <div class="hint-text">Showing <b>{{count($bookings)}}</b> out of <b>{{count($bookings)}}</b> entries</div>
        </div>
    </div>
</div>


@endsection

{{-- extra javascript sectie --}}
@section('javascript') 
    <script>
        @can('booking_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.bookings.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection