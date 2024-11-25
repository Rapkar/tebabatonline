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
                    <div class="d-flex justify-content-between">
                        فقط کالاهای موجود
                        <label class="switch">

                            <input type="checkbox">
                            <span class="sliderw round"></span>
                        </label>
                    </div>


                    <hr>
                    <h3>فیلتر بر اساس قیمت</h3>
                    <div class=" position-relative d-flex flex-column slidecontainer mt-4">
                      
                        <input type="range" min="1" max="100" value="10" class="slider" id="min-price">
                        <p>از 0 تومان</p>
                       
                        <input type="range" min="1" max="600" value="100" class="slider" id="max-price">
                        <p>تا 600/000 تومان</p>
                    </div>
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