@extends('website.layouts.app')
@section('content')
<div class="container  cart mt-5 mb-4">

    <div class="row pt-5">
        <div class=" col-lg-8 hasborder pb-4">
            <h2 class="d-flex justify-content-start px-3 py-3">آدرس و زمان ارسال</h2>
            @foreach($orderitems as $product)
            <div class="col-lg-12 d-flex align-items-center  px-4 py-4">
                <img class="cart-img" src="{{$product->image}}">
                <div class="d-flex flex-column align-items-start">
                    <h2 class="text-left pb-3">
                        {{$product->name}}
                    </h2>
                    <p>{{$product->expert}}</p><br>
                   
                </div>

            </div>
            <div class="col-lg-12 d-flex align-items-center">
            <p class="count"><input class="count" name="quanity" type="number" value="1"></p>
            <form method="post" class="removefromcart" name="removefromcart" action="{{ route('removefromcart',$product->id)}}">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <button type="submit">&#128465; </button>
            </form>  
            <p class="mb-0" >{{$product->price}}</p><br>

            </div>
           
            @endforeach
        </div>
        <div class="col-lg-4 cart-detail">

            <table dir="rtl" class="pt-5">
            <tr>
                    <td>قیمت کل</td>
                    <td>130/000 تومان</td>
                </tr>
                <tr>
                    <td>مالیات</td>
                    <td>130/000 تومان</td>
                </tr>

                <tr>
                    <td>جمع سبد خرید</td>
                    <td>130/000 تومان</td>
                </tr>
            </table>

            <form name="">
                            @csrf
                            <button type="submit">تایید و تکمیل سفارش</button>
                        </form>
        </div>
    </div>


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

                </div>

            </div>

        </div>
    </div>
</div>
 

</div>
 
<div class="container singleproductrelated">
    <h2 class="greentitle py-5">داروهای پیشنهادی</h2>
</div>
@endsection