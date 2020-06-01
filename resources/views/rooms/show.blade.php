{{-- rooms/show.blade.php --}}

{{-- gebruikt 'app' layout --}}
@extends('layouts.app')

{{-- 'content' sectie --}}
@section('content')

<main>
    <div class="container room-show">
        <div class="room-wrapper-show">
            <div class="img-wrapper">
                <div class="stars">
                    {{-- Ik gebruik hier een switch statement om het aantal sterren(rating) weer te geven --}}
                    @switch($room->rating)
                    @case(1)
                    <i class="fas fa-star"></i><i style="color: #dee1e7;" class="fas fa-star"></i><i
                        style="color: #dee1e7;" class="fas fa-star"></i><i style="color: #dee1e7;"
                        class="fas fa-star"></i><i style="color: #dee1e7;" class="fas fa-star"></i>
                    @break

                    @case(2)
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i style="color: #dee1e7;"
                        class="fas fa-star"></i><i style="color: #dee1e7;" class="fas fa-star"></i><i
                        style="color: #dee1e7;" class="fas fa-star"></i>
                    @break

                    @case(3)
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                        style="color: #dee1e7;" class="fas fa-star"></i><i style="color: #dee1e7;"
                        class="fas fa-star"></i>
                    @break

                    @case(4)
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                        class="fas fa-star"></i><i style="color: #dee1e7;" class="fas fa-star"></i>
                    @break

                    @case(5)
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                        class="fas fa-star"></i><i class="fas fa-star"></i>
                    @break

                    @default
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                        class="fas fa-star"></i><i class="fas fa-star"></i>
                    @endswitch
                </div>
                <img src="/storage/cover_images/{{$room->cover_image}}" alt="unavailable" class="img img-big">
                <img src="/storage/images/room-2.png" alt="unavailable" class="img img-small">
                <img src="/storage/images/room-2.png" alt="unavailable" class="img img-small">
            </div>
            <div class="room-booking">
                <div class="booking-price-container">
                    {{-- Ik gebruik hier een if statement om de korting weer te geven --}}
                    @if(isset($room->disc) && $room->disc != '0')
                    <div class="room-discount">{{$room->disc / $room->price * 100}}% off</div>
                    @endif

                    <div class="price-container">
                        <div class="old-price">€{{$room->price}}</div>
                        <div class="price">
                            <sup>€</sup>
                            {{$room->price - $room->disc}}
                        </div>
                        <span class="time">/night</span>
                    </div>
                </div>
                {!! Form::open(['method' => 'POST', 'id' => 'booking-form', 'route' => ['admin.bookings.store']]) !!}
                <input type="text" autocomplete="off" name="time_from" class="datetimepicker custom-input" placeholder="Select start date">
                <input type="text" autocomplete="off" name="time_to" class="datetimepicker custom-input" placeholder="Select end date">

                @isset (Auth::user()->id)
                {{Form::hidden('additional_information', 'None', [], 'None' )}}
                {{Form::hidden('payment_method', 'amex', ['id' => 'payment_method'], 'amex' )}}
                {{Form::hidden('room_id', $room->id, [], $room->id )}}
                {{Form::hidden('room_number', $room->room_number, [], $room->room_number )}}
                {{Form::hidden('price', $room->price - $room->disc, [], $room->price - $room->disc )}}
                {{Form::hidden('user_id', Auth::user()->id, [], Auth::user()->id )}}
                {!! Form::close() !!}﻿
                <button class="open-payment-modal btn-square-red">Book Now</button>
                @else
                {!! Form::close() !!}﻿
                <a href="/login" class="btn-square-red">Book Now</a>
                @endisset
            </div>
        </div>

        <div class="room-show-left-container">


            <div class="room-amenities">
                <div class="amenity free-wifi">
                    <i class="fas fa-wifi"></i>
                    <h4>Complimentary</h4>
                    <span>Free internet</span>
                </div>

                <div class="amenity free-roomservice">
                    <i class="fas fa-concierge-bell"></i>
                    <h4>Free of charge</h4>
                    <span>Room service</span>
                </div>

                @if(isset($room->disc) && $room->disc != '0')
                <div class="amenity discounted-price">
                    <i class="fas fa-coins"></i>
                    <h4>Economical Choice</h4>
                    <span>You save <span class="bold">€{{$room->disc}}</span> by booking this room</span>
                </div>
                @endif

            </div>

            <div class="room-details">
                <h2>{{$room->title}}</h2>
                <h4>{{$room->description}}</h4>
            </div>


        </div>

    </div>

</main>

<div class="modal-page-wrapper"></div>
<div class='container-payment-modal'>
    <form class='modal'>
        <header class='header'>
            <h1>Payment of €{{$room->price - $room->disc}}</h1>
            <div class='card-type'>
                <a class='card active' href='#'>
                    <img onclick="setPaymentMethod('amex')"
                        src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/Amex.png'>
                </a>
                <a class='card' href='#'>
                    <img onclick="setPaymentMethod('discover')"
                        src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/Discover.png'>
                </a>
                <a class='card' href='#'>
                    <img onclick="setPaymentMethod('visa')"
                        src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/Visa.png'>
                </a>
                <a class='card' href='#'>
                    <img onclick="setPaymentMethod('mastercard')"
                        src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/MC.png'>
                </a>
            </div>
        </header>
        <div class='content'>
            <div class='form'>
                <div class='form-row'>
                    <div class='input-group'>
                        <label for=''>Name on card</label>
                        <input placeholder='' type='text'>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='input-group'>
                        <label for=''>Card Number</label>
                        <input maxlength='16' placeholder='' type='number'>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='input-group'>
                        <label for=''>Expiry Date</label>
                        <input placeholder='' type='month'>
                    </div>
                    <div class='input-group'>
                        <label for=''>CVS</label>
                        <input maxlenght='4' placeholder='' type='number'>
                    </div>
                </div>
            </div>
        </div>
        <div class='footer'>
            <button type="submit" form="booking-form" class='button'>Complete Payment</button>
        </div>
    </form>
</div>

@endsection


@section('javascript')


<script>
    function setPaymentMethod(method) {
        $('#payment_method').val(method);
    }
</script>


@endsection
