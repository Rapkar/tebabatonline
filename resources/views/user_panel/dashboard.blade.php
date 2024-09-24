@extends('user_panel.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <table dir="rtl">
                <tbody>
                <tr>
                    <td>
                        <h2>{{ Auth::user()->name }}</h2>
                        <p>{{ Auth::user()->phone }}</p>
                    </td>
                    <td>Edit</td>
                </tr>
                <tr>
                    <td><a href="">سفارش ها</a></td>
                </tr>
                <tr>
                    <td><a href="">علاقه مندی ها</a></td>
                </tr>
                <tr>
                    <td><a href="">فرم های ویزیت</a></td>
                </tr>
                <tr>
                    <td><a href="">لیست علاقه مندی ها</a></td>
                </tr>
                <tr>
                    <td><a href="">خروج</a></td>
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