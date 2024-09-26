@extends('website.layouts.app')
@section('content')
<div class="container singleproduct mt-5 mb-4">
    <h1 class="text-left">
        {{$product->name}}
    </h1>
    <div class="row">
        <div class="col-lg-6"> <img class="w-100 productimg" src="{{$product->image}}"></div>
        <div class="col-lg-6 services">
            <div class="row">
                <div class="col-lg-6 ">
                    <img src="{{asset('images/website/alarm.png') }}" alt="alarm">
                    <h2>ارسال سریع</h2>
                    <h3>با پست پیشتاز</h3>
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('images/website/succsess.png') }}" alt="certificate">

                    <h2>تضمین کیفیت</h2>
                    <h3>و تضمین اصالت</h3>
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('images/website/time.png') }}" alt="time">

                    <h2>اثر بخشی فوق العاده</h2>
                    <h3>تاثیر درمانی سریع</h3>
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('images/website/like.png') }}" alt="like">

                    <h2>رضایت مشتریان</h2>
                    <h3>افتخار ماست</h3>
                </div>
                <div class="col-lg-12 csbg">
                    <p class="text-center" >قیمت <span>{{$product->price}}</span>تومان</p>
                    <form method="post" name="addtocart" class="addtocart" action="{{ route('addtocart',$product->id)}}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <button type="submit">افزودن به سبد خرید</button>
                    </form>
                </div>
            </div>

        </div>

    </div>


    {!! $product->content !!}

</div>

@endsection