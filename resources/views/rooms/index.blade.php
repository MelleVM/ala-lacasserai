{{-- rooms/index.blade.php --}}

{{-- gebruikt 'app' layout --}}
@extends('layouts.app')

{{-- 'content' sectie --}}
@section('content')

<main>
    <div class="container">
        <div class="filter-bar">
            <h2><i class="fas fa-filter"></i> Filter</h2>
            {!! Form::open(['method'=>'GET','url'=>'rooms','class'=>'navbar-form navbar-left','role'=>'search']) !!}
            <div class="stars-container">
                <div class="top" id="top-stars">
                    <h3>Stars</h3>
                    <div id="expand-stars" class="expand"><i class="fas fa-sort-down"></i></div>
                </div>
                <div class="stars-wrapper">
                    <div class="stars five-stars">
                        <label class="container-1">
                            <input type="checkbox" value="1" name="filter" checked="checked">
                            <span class="checkmark"></span>
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                            ({{count($rooms->where('rating', 5))}})
                        </label>
                    </div>
                    <div class="stars four-stars">
                        <label class="container-1">
                            <input type="checkbox" value="2" name="filter" checked="checked">
                            <span class="checkmark"></span>
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i style="color: #dee1e7;" class="fas fa-star"></i>
                            ({{count($rooms->where('rating', 4))}})
                        </label>
                    </div>
                    <div class="stars three-stars">
                        <label class="container-1">
                            <input type="checkbox" value="3" name="filter" checked="checked">
                            <span class="checkmark"></span>

                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                style="color: #dee1e7;" class="fas fa-star"></i><i style="color: #dee1e7;"
                                class="fas fa-star"></i> ({{count($rooms->where('rating', 3))}})
                        </label>
                    </div>
                    <div class="stars two-stars">
                        <label class="container-1">
                            <input type="checkbox" value="4" name="filter" checked="checked">
                            <span class="checkmark"></span>
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i style="color: #dee1e7;"
                                class="fas fa-star"></i><i style="color: #dee1e7;" class="fas fa-star"></i><i
                                style="color: #dee1e7;" class="fas fa-star"></i> ({{count($rooms->where('rating', 2))}})
                        </label>
                    </div>
                    <div class="stars one-stars">
                        <label class="container-1">
                            <input type="checkbox" value="5" name="filter" checked="checked">
                            <span class="checkmark"></span>
                            <i class="fas fa-star"></i><i style="color: #dee1e7;" class="fas fa-star"></i><i
                                style="color: #dee1e7;" class="fas fa-star"></i><i style="color: #dee1e7;"
                                class="fas fa-star"></i><i style="color: #dee1e7;" class="fas fa-star"></i>
                            ({{count($rooms->where('rating', 1))}})
                        </label>
                    </div>
                </div>
            </div>

            <div class="seperator"></div>

            <div class="price-container">
                <div class="top" id="top-price">
                    <h3>Price per night</h3>
                    <div id="expand-price" class="expand"><i class="fas fa-sort-down"></i></div>
                </div>
                <div class="price-wrapper">
                    <div class="price price-one">
                        <label class="container-2">
                            <input type="radio" @isset($_GET['price']) @if ($_GET['price']==50) checked="checked" @endif
                                @endisset value=50 name="price">
                            <span class="checkmark-2"></span>
                            €0 - €50
                        </label>
                    </div>
                    <div class="price price-two">
                        <label class="container-2">
                            <input type="radio" @isset($_GET['price']) @if ($_GET['price']==100) checked="checked"
                                @endif @endisset name="price">
                            <span class="checkmark-2"></span>
                            €50 - €100
                        </label>
                    </div>
                    <div class="price price-three">
                        <label class="container-2">
                            <input type="radio" @isset($_GET['price']) @if ($_GET['price']==150) checked="checked"
                                @endif @endisset name="price">
                            <span class="checkmark-2"></span>
                            €100 - €150
                        </label>
                    </div>
                    <div class="price price-four">
                        <label class="container-2">
                            <input type="radio" @isset($_GET['price']) @if ($_GET['price']==200) checked="checked"
                                @endif @endisset name="price">
                            <span class="checkmark-2"></span>
                            €150 - €200
                        </label>
                    </div>
                    <div class="price price-five">
                        <label class="container-2">
                            <input type="radio" @isset($_GET['price']) @if ($_GET['price']==1000) checked="checked"
                                @endif @endisset name="price">
                            <span class="checkmark-2"></span>
                            €200+
                        </label>
                    </div>
                    <div class="price price-six">
                        <label class="container-2">
                            <input type="radio" @isset($_GET['price']) @if ($_GET['price']==5000) checked="checked"
                                @endif @else checked="checked" @endisset name="price">
                            <span class="checkmark-2"></span>
                            See All
                        </label>
                    </div>
                </div>
            </div>

            <div class="seperator"></div>

            <div class="discount-container">
                <div class="top" id="top-discount">
                    <h3>Special Discount</h3>
                    <div id="expand-discount" class="expand"><i class="fas fa-sort-down"></i></div>
                </div>
                <div class="discount-wrapper">
                    <div class="discount discount-one">
                        <label class="container-1">
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                            Hot Deal
                        </label>
                    </div>
                    <div class="discount discount-two">
                        <label class="container-1">
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                            Regular
                        </label>
                    </div>
                </div>
            </div>

            <div class="seperator"></div>

            <button type="submit" class="btn-square-red">SAVE</button>
            {!! Form::close() !!}
        </div>

        @include('inc.search',['url'=>'rooms','link'=>'rooms'])
        <div class="rooms">
            @if(count($rooms) > 0)
            @foreach($rooms as $room)
            <a href="/rooms/{{$room->id}}" class="room">
                <img src="/storage/cover_images/{{$room->cover_image}}" alt="">
                <div class="room-wrapper">
                    @if(isset($room->disc) && $room->disc != '0')
                    <div class="discount-triangle"></div>
                    <div class="discount-percentage-container">
                        <div class="discount-percentage">{{$room->disc / $room->price * 100}}%</div>
                        <div class="discount-percentage-off">off</div>
                    </div>
                    @endif
                    <div class="rating-container">
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
                    <div class="location-container">
                        <div class="rating-text">{{$room->title}}</div>
                        <div class="location">@isset($room->disc)Save Money @endisset</div>
                    </div>
                    <div class="price-container">
                        <div class="old-price">€{{$room->price}}</div>
                        <div class="price">
                            <sup>€</sup>
                            {{$room->price - $room->disc}}
                        </div>
                        <span class="time">/night</span>
                    </div>
                </div>
            </a>
            @endforeach
            @else
            <div class="result-wrapper">
                <h1>No rooms found.</h1>
                <a href="/rooms" class="btn-outline-red">See All Rooms</a>
            </div>
            @endif
        </div>
    </div>
</main>
@endsection
