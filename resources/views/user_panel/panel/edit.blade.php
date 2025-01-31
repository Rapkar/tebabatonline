@extends('website.layouts.app')

@section('content')
{success}
<div class="container pt-5 mt-5">
    <div class="row">
    @include('user_panel.layouts.layout')
        <div class="col-lg-8">

            <div class="container">
                <h2>ویرایش پروفایل</h2>

                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('updateprofile') }}" enctype="multipart/form-data">
                    @csrf



                    <div class="mb-3">
                        <label for="phone" class="form-label">شماره تلفن:</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ Auth::user()->phone }}">

                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">نام:</label>
                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" id="city">

                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">تام خانوادگی:</label>
                        <input type="text" class="form-control" name="lastname" value=" {{ Auth::user()->usermetas->lastname }}" id="city">

                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">ایمیل:</label>
                        <input type="text" class="form-control" name="city" value="{{ Auth::user()->email }}" id="city">

                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">شغل:</label>
                        <input type="text" class="form-control" name="job" value="{{ Auth::user()->usermetas->job }}" id="city">

                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">سن:</label>
                        <input type="text" class="form-control" name="age" value="{{ Auth::user()->usermetas->age }}" id="city">

                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">قد:</label>
                        <input type="text" class="form-control" name="height" value="{{ Auth::user()->usermetas->height }}" id="city">

                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">جنسیت:</label>
                        <select name="gender" value="{{ Auth::user()->usermetas->gender }}" >
                        <option value="آقا" {{ (Auth::user()->usermetas && Auth::user()->usermetas->relationship == 'آقا') ? 'selected=true' : '' }} >آقا</option>
                        <option value="خانم" {{ (Auth::user()->usermetas && Auth::user()->usermetas->relationship == 'خانم') ? 'selected=true' : '' }}  >خانم</option>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">تاهل:</label>

                        <select name="relationship" class="text-center" value="{{ Auth::user()->usermetas->relationship }}">
                            <option value="متاهل" {{ (Auth::user()->usermetas && Auth::user()->usermetas->relationship == 'متاهل') ? 'selected=true' : '' }}>متاهل</option>
                            <option value="مجرد" {{ (Auth::user()->usermetas && Auth::user()->usermetas->relationship == 'مجرد') ? 'selected=true' : '' }}>مجرد</option>
                            <option value="متارکه" {{ (Auth::user()->usermetas && Auth::user()->usermetas->relationship == 'متارکه') ? 'selected=true' : '' }}>متارکه</option>
                        </select>
                    </div>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-6">
                    استان وشهرستان
                    <select name="states" class="text-center">

                        @foreach($states as $state)

                        <option value="{{$state->id}}" {{ (Auth::user()->usermetas && Auth::user()->usermetas->state == $state->id) ? 'selected=true' : '' }}>{{$state->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3  col-lg-6">
                    شهر
                    <select name="cities" class="text-center" value="{{ Auth::user()->usermetas->city }}">
                        <option>{{ Auth::user()->usermetas->city }}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">آدرس:</label>
                    <input type="text" class="form-control" name="address" value="{{ Auth::user()->usermetas->address }}" id="city">

                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">کدپستی:</label>
                    <input type="text" class="form-control" name="postalcode" value="{{ Auth::user()->usermetas->postalcode }}" id="city">

                </div>

            </div>



            <button type="submit" class="btn btn-primary">به روز رسانی پروفایل</button>
            </form>
        </div>


    </div>
</div>
</div>

@endsection