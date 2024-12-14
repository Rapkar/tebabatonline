@extends('website.layouts.app')

@section('content')
<div class="container pt-5 mt-5">
    <div class="row">
        @include('user_panel.layouts.layout')
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
                        @if($item['completed']==0 )
                        <li class="col-lg-3 mb-3 ">
                            <div>
                                <img src="{{ asset('images/calender.svg') }}">

                                <p>{{$item['data']->name}}<br>{{$item['date']}} </p>
                            </div>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <ul class="row vistiitems">

                        @foreach($result as $t=>$item)
                        @if(($item['completed']) )
                        <li class="col-lg-3 mb-3  {{ ($item['completed']) ? 'completed':''  }} ">
                            <a href="{{route('visitdetails',$item['id'])}}">
                                <img src="{{ asset('images/calender.svg') }}">
                                <p>{{$item['data']->name}}<br>{{$item['date']}}</p>
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection