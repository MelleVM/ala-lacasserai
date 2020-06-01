{{-- pages/profile.blade.php --}}

{{-- gebruikt de 'app' layout --}}
@extends('layouts.app')

{{-- 'content' sectie --}}
@section('content')

<div class="section-1">
    <div class="wrapper">
        <div class="container">
            <h1>My Profile</h1>
            <div class="img"><img src="/storage/images/user.jpg" alt="">
                {{-- naam van ingelogde gebruiker ophalen --}}
                <div class="name">{{Auth::user()->name}}</div>
                {{-- email van ingelogde gebruiker ophalen --}}
                <div class="email">{{Auth::user()->email}}</div>
                <a class="btn-square-profile">Edit Profile</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="card-profile">
        {{-- Gebruikers Informatie --}}
        <div class="user-info">
           <span class="user-title">Address</span>
           <span class="user-data">{{Auth::user()->address}}</span>
        </div>
        <div class="user-info">
            <span class="user-title">Residence</span>
            <span class="user-data">{{Auth::user()->residence}}</span>
        </div>
        <div class="user-info">
            <span class="user-title">Postal Code</span>
            <span class="user-data">{{Auth::user()->postal_code}}</span>
        </div>
    </div>

    {{-- Dit stukje HTML is voor de "Featured" rooms, 
        oftewel kamers die een speciale actie hebben  --}}
    <div class="side-section">
        <h2>Featured Rooms</h2>
        <a href="/rooms/1" class="room">
            <img src="/storage/images/room-2.png" alt="">
            <div class="room-wrapper">
                <div class="discount-triangle"></div>
                <div class="discount-percentage-container">
                    <div class="discount-percentage">50%</div>
                    <div class="discount-percentage-off">off</div>
                </div>
                <div class="rating-container">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                        class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <div class="location-container">
                    <div class="rating-text">Title</div>
                    <div class="location">Boston, MA</div>
                </div>
                <div class="price-container">
                    <div class="old-price">€50</div>
                    <div class="price">
                        <sup>€</sup>
                        50
                    </div>
                    <span class="time">/night</span>
                </div>
            </div>
        </a>
        <a href="/rooms/1" class="room">
            <img src="/storage/images/room-1.jpg" alt="">
            <div class="room-wrapper">
                <div class="discount-triangle"></div>
                <div class="discount-percentage-container">
                    <div class="discount-percentage">50%</div>
                    <div class="discount-percentage-off">off</div>
                </div>
                <div class="rating-container">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                        class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <div class="location-container">
                    <div class="rating-text">Title</div>
                    <div class="location">Boston, MA</div>
                </div>
                <div class="price-container">
                    <div class="old-price">€50</div>
                    <div class="price">
                        <sup>€</sup>
                        50
                    </div>
                    <span class="time">/night</span>
                </div>
            </div>
        </a>
        <a href="/rooms/1" class="room">
            <img src="/storage/images/room-1.jpg" alt="">
            <div class="room-wrapper">
                <div class="discount-triangle"></div>
                <div class="discount-percentage-container">
                    <div class="discount-percentage">50%</div>
                    <div class="discount-percentage-off">off</div>
                </div>
                <div class="rating-container">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                        class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <div class="location-container">
                    <div class="rating-text">Title</div>
                    <div class="location">Boston, MA</div>
                </div>
                <div class="price-container">
                    <div class="old-price">€50</div>
                    <div class="price">
                        <sup>€</sup>
                        50
                    </div>
                    <span class="time">/night</span>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
