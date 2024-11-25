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
                    <td><img src="{{ asset('images/edit.svg') }}"></td>
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
                                                     document.getElementById('logout-form').submit();" >خروج</a>
                
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-8">
            <table dir="rtl">
                <tr>
                <td>داشبورد</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection