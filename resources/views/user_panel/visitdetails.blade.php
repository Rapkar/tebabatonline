@extends('website.layouts.app')

@section('content')
<div class="container-fluid visitdetailsbanner">
    <img class="w-100" src="{{asset('images/banner.webp')}}">
</div>
<div class="container ">

</div>
<div class="container visitdetails pt-4">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">داروها</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">تشخیص طبیب</button>
        </li>
    </ul>
    <div class="tab-content py-4" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <ul class="row list-unstyled products col-lg-8  ">
                    @foreach($products as $product )
                    <li class="col-lg-4 px-4 py-4 d-flex justify-content-center text-center ">
                        <div class="card ">
                            <img class="mw-100 w-100" src="{{$product->image}}">
                            <div class="d-flex justify-content-around   mt-4">
                                <p class="count ml-0 ms-0"><input class="count" attr-visit="{{$Visit_id}}" attr-sec="mediccart" attr-id="{{$product->id}}" name="quanity" type="number" value="{{$product->pivot->count}}"></p>
                                <form class="" name="removefromcart" action="{{route('removeproducttopatient',[$Visit_id,$product->id])}}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <input type="hidden" name="cart_id" value="">
                                    <button type="submit">&#128465; </button>
                                </form>
                            </div>
                            <a class="mt-3" href="{{$product->slug}}">
                                <h2> {{$product->name}}</h2>
                            </a>
                            <button type="button" class="btn btn-primary mt-4 " data-bs-toggle="modal" data-bs-target="#detail{{$product->id}}">
                                نمایش جزییات
                            </button>

                            <div class="modal fade" id="detail{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                        </div>
                                        <div class="modal-body">
                                            @foreach($product->visitrecommendation as $item)
                                            <ul>
                                                <li>{{$item->content}}</li>
                                            </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </li>
                    @endforeach
                </ul>
                <div class="col-lg-4 cart-detail">

                    <table dir="rtl" class="pt-5">
                        <tr>
                            <td>قیمت کل</td>
                            <td>{{$totalprice}}</td>
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

                    <form action="{{route('payment')}}" name="">
                        @csrf
                        <button type="submit">تایید و تکمیل سفارش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content py-4" id="myTabContent">
        <div class="tab-pane fade   " id="profile" role="tabpanel" aria-labelledby="home-tab">
            <div class="problemview px-5 py-5">
                <h2 class="greentitle m-auto">تشخیص طبیب شما</h2>
                <ul class="row list-unstyled mt-5">
                    @foreach($selected_problems as $item )
                    <li class="col-lg-12">
                        <table>
                            <thead>
                                <tr>
                                    <th> توصیه ها</th>
                                    <th>توصیه های اختصاصی</th>
                                    <th> توضیحات بیشتر</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$item->content}}</td>
                                    <td>{{$item->pivot->comment}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary   " data-bs-toggle="modal" data-bs-target="#problemviewdetail{{$item->id}}">
                                            نمایش جزییات
                                        </button>
                                        <div class="modal fade" id="problemviewdetail{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                    </div>
                                                    <div class="modal-body">
                                                        @foreach($item->visitdescribtions as $describtion )
                                                        <p>{{ $describtion->content}}</p><br>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="problemview px-5 py-5 mt-5">
                <h2 class="greentitle m-auto">توصیه های طبیب شما</h2>
                <ul class="row list-unstyled   mt-5 ">
                    @foreach($selected_recommendations as $item )
                    <li class="col-lg-12">
                        <table>
                            <thead>
                                <tr>
                                    <th> توصیه ها</th>
                                    <th>توصیه های اختصاصی</th>
                                    <th> توضیحات بیشتر</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$item->content}}</td>
                                    <td>{{$item->pivot->comment}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary   " data-bs-toggle="modal" data-bs-target="#recomendationdetail{{$item->id}}">
                                            نمایش جزییات
                                        </button>
                                        <div class="modal fade" id="recomendationdetail{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                    </div>
                                                    <div class="modal-body">
                                                        @foreach($item->visitdescribtions as $describtion )
                                                        <p>{{ $describtion->content}}</p><br>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</div>
@endsection