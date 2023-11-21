@extends('layout')
@section('title', 'Room Detail')

@section('content')
<section class="rooms__banner">
    <h2 class="rooms__firsttitle" id="rooms__firsttitle">THE ULTIMATE LUXURY </h2>
    <h3 class="rooms__secondtitle" id="rooms__secondtitle">The Ultimate Room</h3>
    <div class="rooms__buttons" id="rooms__buttons">
        <a class="banner-buttons__home" href="../index.html
                ">
            Home
        </a>
        <p>|</p>
        <a class="banner-buttons__about" href="../index.html
                ">
            Rooms Details
        </a>
    </div>
</section>

<section class="room-details__type">
    <div class="room-details-type__info">
        <div class="room-details-type-info__container">
            <h2 class="room-details-type-info__h2">Double Bed</h2>
            <h4 class="room-details-type-info__h4">Luxury Double Bed</h4>
        </div>
        <h3 class="room-details-type-info__h3">
            $345<span class="room-details-type-info-h3__span">/Night</span>
        </h3>
    </div>
    <img class="room-details-type__img" src="../img/slider-rooms3.jpg" alt="room" />
    <div class="room-details-type__availability">
        <h4 class="room-details-type-availability__h4">Check Availability</h4>
        <form class="room-details-type-availability__form" id="room-details-type-availability__form">
            <label for="check-in">Check In</label>
            <input type="date" name="check-in" id="room-details-type-availability-form__check-in" />
            <label for="check-out">Check Out</label>
            <input type="date" name="check-out" id="room-details-type-availability-form__check-out" />
            <label for="name">Full Name</label>
            <input type="text" name="name" id="room-details-type-availability-form__name" placeholder="Full Name" />
            <label for="email">Email</label>
            <input type="email" name="email" id="room-details-type-availability-form__email" placeholder="Email" />
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="room-details-type-availability-form__phone" placeholder="Number Phone" />
            <label for="message">Message</label>
            <input type="text" name="message" id="room-details-type-availability-form__message" placeholder="Your Message" />
            <button id="room-details-type-availability-form__button" class="room-details-type-availability-form__button" type="submit">CHECK
                AVAILABILITY</button>
        </form>
        <div class="room-details-type__modal-form-disponible modal-rooms-details">
            <button class="modal-rooms-details__button-close" id="modal-rooms-details__button-close">
                <img class="modal-rooms-details__img" src="../img/close_icon.png" alt="close" />
            </button>
            <h3 class="modal-rooms-details__h3">¡Thank you for your request!</h3>
            <p class="modal-rooms-details__paraph">We have received it correctly.
                Someone from our Team will get
                back to you very soon</p>
            <h4 class="modal-rooms-details__h4">The Miranda Hotel</h4>
        </div>
        <!--  <div class="modal-rooms-details">
                    <button class="modal-rooms-details__button-close" id="modal-rooms-details__button-close">
                        <img class="modal-rooms-details__img" src="../img/close_icon.png" alt="close"/>
                    </button>
                    <h3 class="modal-rooms-details__h3">¡We are sorry</h3>
                    <p class="modal-rooms-details__paraph">This room is not available for the
                        dates you need. Please try different
                        dates or try a different room.</p>
                    <h4 class="modal-rooms-details__h4">The Miranda Hotel</h4>
                </div> -->
    </div>
    <p class="room-details-type__paraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut
        perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
        aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
        explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
        consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui
        dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora
        incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
</section>

<section class="room-details__amenities">
    <h2 class="room-details-amenities__h2">Amenities</h2>
    <div class="room-details-amenitie__container">
        <div class="room-details-amenities__icon-container">
            <div class="room-details-amenities-icon-container__info">
                <img class="room-details-amenities-icon-container-info__img" src="../img/air-icon.png" alt="air" />
                <p class="room-details-amenities-icon-container-info__paraph">
                    Air conditioner
                </p>
            </div>
            <div class="room-details-amenities-icon-container__info">
                <img class="room-details-amenities-icon-container-info__img" src="../img/launch-icon.png" alt="launch" />
                <p class="room-details-amenities-icon-container-info__paraph">
                    Breakfast
                </p>
            </div>
            <div class="room-details-amenities-icon-container__info">
                <img class="room-details-amenities-icon-container-info__img" src="../img/cleaning-icon.png" alt="cleaning" />
                <p class="room-details-amenities-icon-container-info__paraph">
                    Cleaning
                </p>
            </div>
            <div class="room-details-amenities-icon-container__info">
                <img class="room-details-amenities-icon-container-info__img" src="../img/grocery-icon.png" alt="grocery" />
                <p class="room-details-amenities-icon-container-info__paraph">
                    Grocery
                </p>
            </div>
            <div class="room-details-amenities-icon-container__info">
                <img class="room-details-amenities-icon-container-info__img" src="../img/shopper-icon.png" alt="shop" />
                <p class="room-details-amenities-icon-container-info__paraph">Shop near</p>
            </div>
            <div class="room-details-amenities-icon-container__info">
                <img class="room-details-amenities-icon-container-info__img" src="../img/headphone-icon.png" alt="headphones" />
                <p class="room-details-amenities-icon-container-info__paraph">24/7 Online Support</p>
            </div>
            <div class="room-details-amenities-icon-container__info">
                <img class="room-details-amenities-icon-container-info__img" src="../img/locked-icon.png" alt="locked" />
                <p class="room-details-amenities-icon-container-info__paraph">Smart Security</p>
            </div>
        </div>

        <div class="room-details-amenities__icon-container container__2">
            <div class="room-details-amenities-icon-container__info">
                <img class="room-details-amenities-icon-container-info__img" src="../img/wifi-gold-icon.png" alt="wifi" />
                <p class="room-details-amenities-icon-container-info__paraph">High speed WIFI</p>
            </div>
            <div class="room-details-amenities-icon-container__info">
                <img class="room-details-amenities-icon-container-info__img" src="../img/kitchen-icon.png" alt="kitchen" />
                <p class="room-details-amenities-icon-container-info__paraph">Kitchen</p>
            </div>
            <div class="room-details-amenities-icon-container__info">
                <img class="room-details-amenities-icon-container-info__img" src="../img/bath-icon.png" alt="batch" />
                <p class="room-details-amenities-icon-container-info__paraph">Shower</p>
            </div>
            <div class="room-details-amenities-icon-container__info">
                <img class="room-details-amenities-icon-container-info__img" src="../img/single-bed-icon.png" alt="single-bed" />
                <p class="room-details-amenities-icon-container-info__paraph">Single bed</p>
            </div>
            <div class="room-details-amenities-icon-container__info">
                <img class="room-details-amenities-icon-container-info__img" src="../img/toalla-icon.png" alt="towel" />
                <p class="room-details-amenities-icon-container-info__paraph">Towels</p>
            </div>
            <div class="room-details-amenities-icon-container__info">
                <img class="room-details-amenities-icon-container-info__img" src="../img/llave-icon.png" alt="key-locker" />
                <p class="room-details-amenities-icon-container-info__paraph">Strong Locker</p>
            </div>
            <div class="room-details-amenities-icon-container__info">
                <img class="room-details-amenities-icon-container-info__img" src="../img/expert-icon.png" alt="expert" />
                <p class="room-details-amenities-icon-container-info__paraph">Expert Team</p>
            </div>
        </div>
    </div>
</section>

<div class="founder">
    <div class="founder__img-container">
        <img class="founder-img-container__img" src="../img/rosalina-img.jpg" alt="rosalina" />
        <div class="founder-img-container__square">
            <img class="founder-img-container-square-check__img" src="../img/white-check-icon.png" alt="check" />
        </div>
    </div>
    <h2 class="founder__h2">Rosalina D. William</h2>
    <h3 class="founder__h3">Founder, Qux Co.</h3>
    <p class="founder__paraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
        incididunt ut labore et dolore.</p>
</div>

<section class="cancellation-info">
    <h2 class="cancellation-info__h2">Cancellation</h2>
    <p class="cancellation-info__paraph">Phasellus volutpat neque a tellus venenatis, a euismod augue facilisis.
        Fusce ut metus mattis, consequat metus nec, luctus lectus. Pellentesque orci quis hendrerit sed eu
        dolor. Cancel up to 14 days to get a full refund.</p>
</section>

<section class="related-rooms">
    <h2 class="related-rooms__h2">Related Rooms</h2>
    <div class="rooms-list__room">

        <div class="swiper" id="swiper-rooms-details">
            <div class="swiper-wrapper swiper-wrapper__rooms-details">
                <div class="swiper-slide slide-img1">
                    <div class="discover-rooms__icons">
                        <img class="discover-rooms-icons__img" src="../img/bed-icon.png" alt="bed-icon" />
                        <img class="discover-rooms-icons__img" src="../img/wifi-icon.png" alt="wifi-icon" />
                        <img class="discover-rooms-icons__img" src="../img/car-icon.png" alt="car-icon" />
                        <img class="discover-rooms-icons__img" src="../img/cold-icon.png" alt="snow-icon" />
                        <img class="discover-rooms-icons__img" src="../img/gym-icon.png" alt="gym-icon" />
                        <img class="discover-rooms-icons__img" src="../img/no-smoking-icon.png" alt="no-smoking-icon" />
                        <img class="discover-rooms-icons__img" src="../img/cocktail-icon.png" alt="cocktail-icon" />
                    </div>
                    <img class="swiper-slide__img" src="../img/slider-rooms1.jpeg" alt="img1" />
                    <div class="box-container">
                        <h3 class="rooms-list-room__h3">Minimal Duplex Room</h3>
                        <p class="rooms-list-room__paraph">Lorem ipsum dolor sit amet, consectetur adipi sicing
                            elit, sed do eiusmod tempor.</p>
                        <div class="rooms-list-room__price-info">
                            <h2 class="rooms-list-room-price-info__h2">$345/Night</h2>
                            <button class="rooms-list-room-price-info__button">Booking now</button>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide slide-img2">
                    <div class="discover-rooms__icons">
                        <img class="discover-rooms-icons__img" src="../img/bed-icon.png" alt="bed-icon" />
                        <img class="discover-rooms-icons__img" src="../img/wifi-icon.png" alt="wifi-icon" />
                        <img class="discover-rooms-icons__img" src="../img/car-icon.png" alt="car-icon" />
                        <img class="discover-rooms-icons__img" src="../img/cold-icon.png" alt="snow-icon" />
                        <img class="discover-rooms-icons__img" src="../img/gym-icon.png" alt="gym-icon" />
                        <img class="discover-rooms-icons__img" src="../img/no-smoking-icon.png" alt="no-smoking-icon" />
                        <img class="discover-rooms-icons__img" src="../img/cocktail-icon.png" alt="cocktail-icon" />
                    </div>
                    <img class="swiper-slide__img" src="../img/slider-rooms2.jpg" alt="img1" />
                    <div class="box-container">
                        <h3 class="rooms-list-room__h3">Minimal Duplex Room</h3>
                        <p class="rooms-list-room__paraph">Lorem ipsum dolor sit amet, consectetur adipi sicing
                            elit, sed do eiusmod tempor.</p>
                        <div class="rooms-list-room__price-info">
                            <h2 class="rooms-list-room-price-info__h2">$345/Night</h2>
                            <button class="rooms-list-room-price-info__button">Booking now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-prev" id="swiper-button-prev-rooms-details"></div>
            <div class="swiper-button-next" id="swiper-button-next-rooms-details"></div>
        </div>

    </div>

</section>

@endsection