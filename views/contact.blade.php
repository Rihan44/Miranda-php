@extends('layout')
@section('title', 'Contact')

@section('content')
<section class="rooms__banner">
    <h2 class="rooms__firsttitle" id="rooms__firsttitle">THE ULTIMATE LUXURY </h2>
    <h3 class="rooms__secondtitle" id="rooms__secondtitle">New Details</h3>
    <div class="rooms__buttons" id="rooms__buttons">
        <a class="banner-buttons__home" href="../index.html
                ">
            Home
        </a>
        <p>|</p>
        <a class="banner-buttons__about" href="../index.html
                ">
            Blog
        </a>
    </div>
</section>

<div class="contact-info">
    <div class="contact-info__container">
        <img class="contact-info-container__img" src="../img/location-icon.png" alt="location" />
        <div class="contact-info-container__data">
            <h4 class="contact-info-container-data__h4">Hotel Address</h4>
            <p class="contact-info-container-data__paraph">19/A, Cirikon City hall Tower</p>
            <p class="contact-info-container-data__paraph">New York, NYC</p>
        </div>
    </div>
    <div class="contact-info__container">
        <img class="contact-info-container__img" src="../img/phone-icon.png" alt="phone" />
        <div class="contact-info-container__data">
            <h4 class="contact-info-container-data__h4">
                Phone Number
            </h4>
            <p class="contact-info-container-data__paraph">
                + 97656 8675 7864 7
            </p>
            <p class="contact-info-container-data__paraph">
                + 876 766 8675 765 6
            </p>
        </div>
    </div>
    <div class="contact-info__container">
        <img class="contact-info-container__img" src="../img/email-icon.png" alt="email" />
        <div class="contact-info-container__data">
            <h4 class="contact-info-container-data__h4">Email</h4>
            <p class="contact-info-container-data__paraph">
                info@webmail.com
            </p>
            <p class="contact-info-container-data__paraph">
                jobs.webmail@mail.com
            </p>
        </div>
    </div>
</div>
<div class="mapa-hotel">
    <iframe class="mapa-hotel__iframe" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12148.53154482835!2d-3.7146958!3d40.4280563!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4229fc15efcb09%3A0xb0036150b0cd3867!2sOXYGEN%20Academy%20%7C%20Full%20Stack%20Bootcamps!5e0!3m2!1ses!2ses!4v1695291478382!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<div class="contact-form-container">
    <form class="contact-form-container__formulario" id="form_contact">
        <div class="inputs-box">
            <div class="contact-form-container-formulario__input-container">
                <img class="contact-form-container-formulario-input-container__icon" src="../img/person-gold-icon.png" alt="person" />
                <input class="contact-form-container-formulario-input-container__input" type="text" name="name" id="full-name" placeholder="Your full name" />
            </div>
            <div class="contact-form-container-formulario__input-container">
                <img class="contact-form-container-formulario-input-container__icon" src="../img/gold-phone-icon.png" alt="phone" />
                <input class="contact-form-container-formulario-input-container__input" type="text" name="number" id="number-input" placeholder="Add phone number" />
            </div>
        </div>

        <div class="inputs-box">
            <div class="contact-form-container-formulario__input-container">
                <img class="contact-form-container-formulario-input-container__icon" src="../img/email-gold-icon.png" alt="email" />
                <input class="contact-form-container-formulario-input-container__input" type="email" name="email" id="email-input" placeholder="Enter email address" />
            </div>
            <div class="contact-form-container-formulario__input-container">
                <img class="contact-form-container-formulario-input-container__icon" src="../img/book-gold-icon.png" alt="book" />
                <input class="contact-form-container-formulario-input-container__input" type="text" name="subject" id="subject-input" placeholder="Enter subject" />
            </div>
        </div>

        <div class="inputs-box">
            <div class="contact-form-container-formulario__input-container">
                <img class="contact-form-container-formulario-input-container__icon" src="../img/pen-icon.png" alt="pen" />
                <textarea name="" id="" cols="30" rows="10" placeholder="Enter message" class="contact-form-container-formulario-input-container__textarea"></textarea>
            </div>
        </div>
        <button class="contact-form-container-formulario__button">SEND</button>
    </form>
    <p id="paragraph__enviado">Formulario enviado con exito!</p>
</div>
@endsection