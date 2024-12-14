@extends('website.layouts.app')

@section('content')
<div class="container mt-5 pt-5">

</div>
<div class="container">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">داروها</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">تشخیص طبیب</button>
        </li>
    </ul>
    <div class="tab-content py-5" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            <ul class="row list-unstyled ">
                @foreach($products as $product )
                <li class="col-lg-3">
                    <img class="w-100" src="{{$product->image}}">
                    {{$product->name}}
                    @foreach($product->recommendation as $item)
                    <ul>
                        <li>{{$item->content}}</li>
                    </ul>
                    @endforeach
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="tab-content py-5" id="myTabContent">
        <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="home-tab">

            <ul class="row list-unstyled ">
                @foreach($products as $product )
                <li class="col-lg-3">
                    <img class="w-100" src="{{$product->image}}">
                    {{$product->name}}
                    @foreach($product->recommendation as $item)
                    <ul>
                        <li>{{$item->content}}</li>
                    </ul>
                    @endforeach
                </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>
@endsection