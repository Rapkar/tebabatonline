@extends('website.layouts.app')

@section('content')

<div class="container-fluid    products h-auto d-flex flex-column ">

    <div class="row">
        <div class="col-lg-2 pt-5">
            <div class="pt-4">
                <div class="sidebar    ">
                    <h2>
                        فیلتر ها
                    </h2>
                    <label>
                    فقط کالاهای موجود
                    <input type="checkbox">
                    </label>
                    <hr>
                    <h3>فیلتر بر اساس قیمت</h3>
                    <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                    <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                    <hr>
                    <h4>اخرین دیدگاه ها</h4>
                    <h5><b>احمد حاکمی </b>در درمان تیک و پرش عضلات در طب اسلامی سنتی</h5>
                    <h5><b>زهرا </b> در درمان تیک و پرش عضلات در طب اسلامی سنتی</h5>
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