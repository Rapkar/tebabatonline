@extends('website.layouts.app')

@section('content')
<div class="container pt-5 mt-5">
    <div class="row">
        <div class="col-lg-4">
            <table dir="rtl">
                <tbody>
                    <tr>
                        <td>
                            <h2>{{ Auth::user()->name }}</h2>
                            <p>{{ Auth::user()->phone }}</p>
                        </td>
                        <td><a href="{{route('editprofile',Auth::user()->id)}}"><img src="{{ asset('images/edit.svg') }}"></a></td>
                    </tr>
                    <tr>
                        <td><a href="">سفارش ها</a></td>
                    </tr>
                    <tr>
                        <td><a href="">علاقه مندی ها</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{route('forms')}}">فرم های ویزیت</a></td>
                    </tr>
                    <tr>
                        <td><a href="">لیست علاقه مندی ها</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">خروج</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-8">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">فرم های جدید</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">فرم های بررسی شده</button>
                </li>
            </ul>

            <div class="tab-content py-5" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <ul class="row vistiitems">

                        @foreach($result as $t=>$item)
                        <li class="col-lg-3">
                            <div>
                                <img src="{{ asset('images/calender.svg') }}">
                                <p>{{$item['data']->name}}<br>{{$item['date']}}=={{$item['completed']}}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <ul class="row vistiitems">

                        @foreach($result as $t=>$item)
                        <li class="col-lg-3  @if($item['completed'] == 1) completed @endif ">
                            <div>
                                <img src="{{ asset('images/calender.svg') }}">
                                <p>{{$item['data']->name}}<br>{{$item['date']}}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection