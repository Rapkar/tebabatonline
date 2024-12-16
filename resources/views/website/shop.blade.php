@extends('website.layouts.app')

@section('content')

<div class="container-fluid    products h-auto d-flex flex-column ">

    <div class="row">
        <div class="col-lg-2 pt-5">
            <div class="pt-4">
                <div class="sidebar">
                    <form method="post" id="productfilter" action="{{route('getproductbyprice')}}">
                        @csrf
                        <h2>
                            فیلتر ها
                        </h2>
                        <div class="d-flex justify-content-between">
                            فقط کالاهای موجود
                            <label class="switch">

                                <input type="checkbox" name="existproduct" id="existproduct">
                                <span class="sliderw round"></span>
                            </label>
                        </div>
                        <hr>
                        <h3>فیلتر بر اساس قیمت</h3>
                        <div class=" position-relative d-flex flex-column slidecontainer mt-4">
                            <input type="range" min="0" max="590000" value="0" step="50000"  class="slider" name="min-price" id="min-price">
                            <p class="min-price">از ۱۰ هزار تومان</p>
                            <input type="range" min="50000" max="600000" value="50000" step="50000" class="slider" name="max-price" id="max-price">
                            <p class="max-price">تا ۶۰۰ هزار تومان</p>
                            <button type="submit" class="btn btn-dark">جستجو</button>
                        </div>
                    </form>
                    <hr>
                    <h4>اخرین دیدگاه ها</h4>
                    @foreach($comments as $comment)
                    <h5><b>{{$comment->user->name}}:</b><br>{{$comment->content}}</h5>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="shop-header mt-5 pt-4 ">
                <ul>
                    <li class="ms-4"><img src="{{ asset('images/website/sort.svg') }}"></li>
                    <li><a href="#">مرتب سازی بر اساس</a></li>
                    <li><a href="#">گرانترین</a></li>
                    <li><a href="#">ارزان ترین</a></li>
                    <li><a href="#">محبوبیت</a></li>
                    <li><a href="#">امتیاز</a></li>
                    <li><a href="#">جدیدترین</a></li>
                </ul>
            </div>
            <div class=" productslider col-lg-10 mb-5    ">
                <div class="row">
                    @foreach($products as $product)
                    @if($product->status==1)
                    <div class="col-lg-3 mb-4">
                        <a href="{{route('products', $product->slug)}}">
                            <div class="card pb-4">
                                <div class="head">
                                    <img src="{{ asset($product->image) }}" alt="posttitle">
                                </div>
                                <h2>{{$product->name}}</h2>
                                <p>{{$product->expert}}</p>

                                <h5 class="d-flex" href="#">{{$product->price}} تومان</h5>
                                <form method="post" name="addtocart" class="addtocart" action="{{ route('addtocart',$product->id)}}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <button type="submit">افزودن به سبد خرید</button>
                                </form>
                            </div>
                        </a>
                    </div>
                    @endif
                    @endforeach
                </div>

            </div>
        </div>
    </div>


</div>

</div>
@endsection