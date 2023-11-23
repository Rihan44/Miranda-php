@extends('layout')
@section('title', 'Rooms')

@section('content')
<section class="rooms__banner">
    <h2 class="rooms__firsttitle" id="rooms__firsttitle">THE ULTIMATE LUXURY </h2>
    <h3 class="rooms__secondtitle" id="rooms__secondtitle">The Ultimate Room</h3>
    <div class="rooms__buttons" id="rooms__buttons">
        <a class="banner-buttons__home" href="../index.php
                ">
            Home
        </a>
        <p>|</p>
        <a class="banner-buttons__about" href="../rooms.php
                ">
            Rooms
        </a>
    </div>
</section>

<section class="rooms__list">
    @if($no_rooms)
        <h3 class="rooms__list-no-rooms">There are no rooms in that date range, search again?</h3>
        <section class="banner__checkdate">
            <form class="banner-checkdate__form" id="form_check_availability" method="GET">
                <div class="banner-checkdate-form__input-container">
                    <label for="arrive">Arrival date</label>
                    <input type="date" name="check_in" id="check_in_rooms" min="{{$today_date}}"/>
                </div>
                <div class="banner-checkdate-form__input-container">
                    <label>Departure Date</label>
                    <input type="date" name="check_out" id="check_out_rooms"/>
                </div>
                <button class="banner-checkdate-form__button" type="submit">
                    CHECK AVAILABILITY
                </button>
            </form>
        </section>
    @endif
    <div class="rooms-list-grid__container">
        @foreach ($rooms as $room)
        <div class="rooms-list__room">
            <div class="discover-rooms__icons">
                <img class="discover-rooms-icons__img" src="../img/bed-icon.png" alt="bed-icon" />
                <img class="discover-rooms-icons__img" src="../img/wifi-icon.png" alt="wifi-icon" />
                <img class="discover-rooms-icons__img" src="../img/car-icon.png" alt="car-icon" />
                <img class="discover-rooms-icons__img" src="../img/cold-icon.png" alt="snow-icon" />
                <img class="discover-rooms-icons__img" src="../img/gym-icon.png" alt="gym-icon" />
                <img class="discover-rooms-icons__img" src="../img/no-smoking-icon.png" alt="no-smoking-icon" />
                <img class="discover-rooms-icons__img" src="../img/cocktail-icon.png" alt="cocktail-icon" />
            </div>
            <img class="rooms-list-room__img" src="{{$room['URL']}}" alt="room" />
            <h3 class="rooms-list-room__h3">{{$room['room_type']}}</h3>
            <p class="rooms-list-room__paraph">{{$room['description']}}</p>
            <div class="rooms-list-room__price-info">
                <h2 class="rooms-list-room-price-info__h2">${{$room['price']}}/Night</h2>
                <button class="rooms-list-room-price-info__button">
                    <a href="rooms_details.php?id={{$room['id']}}">Booking now</a>
                </button>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection