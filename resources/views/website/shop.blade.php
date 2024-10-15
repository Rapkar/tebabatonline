@extends('website.layouts.app')

@section('content')

<div class="container-fluid    products h-auto d-flex flex-column ">


    <div class=" productslider mt-5 w-100 container mb-5    ">
        <div class="row  pt-5  mt-5" >
        @foreach($products as $product)
        @if($product->status==1)
        <div class="col-lg-4 mb-4">
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
@endsection