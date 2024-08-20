@extends('website.layouts.app')

@section('content')
<div class="container">
    <div class="container">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">Slide 1</div>
                <div class="swiper-slide">Slide 2</div>
                <div class="swiper-slide">Slide 3</div>
                <div class="swiper-slide">Slide 4</div>
                <div class="swiper-slide">Slide 5</div>
                <div class="swiper-slide">Slide 6</div>
                <div class="swiper-slide">Slide 7</div>
                <div class="swiper-slide">Slide 8</div>
                <div class="swiper-slide">Slide 9</div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5  highlight ">
            <h2 class="mb-5 pb-5 mt-5 pt-5 title">بیماری ها بر اساس اعضای بدن</h2>
            
            <p>ما برای راحتی شما عزیزان، در این قسمت تمام بیماری‌هایی که برای هر کس ممکنه به وجود بیاد رو بر اساس تک تک اعضای بدن دسته بندی کردیم</p>
            <p>شما می‌تونید بر اساس هر عضو، بیماری‌های اون قسمت رو بررسی کنید و راهکارهای درمانی‌شو مورد مطالعه قرار بدید</p>
            <p>پس همین حالا با کلیک روی هر قسمتی از بدن، بیماری های مربوط به عضو رو ببینید</p>
        </div>
        <div class="col-lg-7">
            <img src="{{ asset('images/website/img.webp') }}">
        </div>

    </div>
</div>
@endsection