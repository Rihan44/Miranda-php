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
                <input type="date" name="check_in" id="check_in_rooms" min="<?= date('Y-m-d') ?>" required />
            </div>
            <div class="banner-checkdate-form__input-container">
                <label>Departure Date</label>
                <input type="date" name="check_out" id="check_out_rooms" required />
            </div>
            <button class="banner-checkdate-form__button" type="submit">
                CHECK AVAILABILITY
            </button>
        </form>
    </section>
    @else
    <style>
        .swiper {
            width: 1500px;
        }

        .swiper-pagination {
            --swiper-pagination-bullet-border-radius: 0px;
            --swiper-pagination-bullet-size: 20px;
            --swiper-pagination-color: #bead8e;
            --swiper-pagination-bullet-inactive-color: transparent;
            --swiper-pagination-bullet-horizontal-gap: 5px;
        }

        .swiper-pagination-bullet-active {
            color: white;
        }
    </style>
<div class="rooms-list-grid__container">
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach ($rooms as $room)

                <div class="swiper-slide">
                    <div class="rooms-list__room">
                        <div class="discover-rooms__icons">
                            @foreach ($amenities_array as $amenity)
                            @if (isset($amenity_icons[$amenity]))
                            <img class="discover-rooms-icons__img" src="{{ $amenity_icons[$amenity] }}" alt="{{ $amenity }}" />
                            @endif
                            @endforeach
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
                </div>
            @endforeach

            ...
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

    <!-- <div class="rooms-list-grid__container">
        @foreach ($rooms as $room)
        <div class="rooms-list__room">
            <div class="discover-rooms__icons">
                @foreach ($amenities_array as $amenity)
                @if (isset($amenity_icons[$amenity]))
                <img class="discover-rooms-icons__img" src="{{ $amenity_icons[$amenity] }}" alt="{{ $amenity }}" />
                @endif
                @endforeach
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

    <div class="rooms__list-pagination">
            @for ($i = 1; $i <= $total_pages; $i++) 
                <button class="{{ $_GET['pag'] == $i ? 'btn__rooms-pag active' : 'btn__rooms-pag' }}">
                    <a href="{{ empty($_GET['check_in']) && empty($_GET['check_out']) ? '?pag=' . $i : '?check_in=' . $_GET['check_in'] . '&check_out=' . $_GET['check_out'] . '&pag=' . $i }}">
                        {{ $i }}
                    </a>
                </button>
            @endfor
        </div> -->
    @endif
</section>
@endsection