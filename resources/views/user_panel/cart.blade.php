@extends('website.layouts.app')
@section('content')
<div class="container  cart mt-5 mb-4">
    @foreach($orderitems as $product)
    <div class="row">
        <div class="col-lg-8 d-flex align-items-center hasborder px-4 py-4">
            <img class="cart-img" src="{{$product->image}}">
            <div class="d-flex flex-column align-items-start">
                <h2 class="text-left pb-5">
                    {{$product->name}}
                </h2>
                <p>{{$product->expert}}</p>
            </div>

        </div>
        <div class="col-lg-4">

            <table dir="rtl">
                <tr>
                    <td>جمع سبد خرید</td>
                    <td>130/000 تومان</td>
                </tr>
                <tr>
                    <td>

                        <form name="">
                            @csrf
                            <button type="submit">تایید و تکمیل سفارش</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    @endforeach
</div>
<div class="container">
    <div class="singleproduct">
        <div class="row mb-5">
            <div class="col-lg-12 services">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="{{asset('images/website/alarm.png') }}" alt="alarm">
                        <h2>ارسال سریع</h2>
                        <h3>با پست پیشتاز</h3>
                    </div>
                    <div class="col-lg-3">
                        <img src="{{asset('images/website/succsess.png') }}" alt="certificate">

                        <h2>تضمین کیفیت</h2>
                        <h3>و تضمین اصالت</h3>
                    </div>
                    <div class="col-lg-3">
                        <img src="{{asset('images/website/time.png') }}" alt="time">

                        <h2>اثر بخشی فوق العاده</h2>
                        <h3>تاثیر درمانی سریع</h3>
                    </div>
                    <div class="col-lg-3">
                        <img src="{{asset('images/website/like.png') }}" alt="like">

                        <h2>رضایت مشتریان</h2>
                        <h3>افتخار ماست</h3>
                    </div>
                    <div class="col-lg-12 csbg">
                        <p class="text-center">قیمت <span>{{$product->price}}</span>تومان</p>
                        <form method="post" name="addtocart" class="addtocart" action="{{ route('addtocart',$product->id)}}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <button type="submit">افزودن به سبد خرید</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="container">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">توضیحات</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">شرایط ارسال کالا</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active px-5 py-4" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> {!! $product->content !!}</div>
        <div class="tab-pane fade px-5 py-4" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> به محض نهایی کردن سفارش و پرداخت مبلغ اون، سفارش شما تحویل پست میشه و معمولا در عرض 2 الی 5 روز به دستتون میرسه بعد از اینکه تحویل پست دادیم میتونید کد رهگیری مرسوله رو از قسمت پیگیری سفارشات ارسالی مشاهده بفرمایید. </div>
    </div>

</div>

</div>
<div class="spacer"></div>
<div class="container singleproductrelated">
    <h2 class="greentitle py-5">داروهای پیشنهادی</h2>
</div>
@endsection