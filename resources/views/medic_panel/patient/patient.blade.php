@extends('medic_panel.layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped table-bordered table-rtl">
        <thead>
            <tr>
                <th>شماره</th>
                <th>نام</th>
                <th>خانوادگی</th>
                <th>استان</th>
                <th>شماره تماس</th>
                <th>تاریخ و.یزیت</th>
                <th>پرداختی</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            <!-- Users list goes here -->
             
            @foreach($result as $item)
           
            <tr>
                <td>   {{$item['data']->name}} </td>
                <td>   {{$item['data']->states}} </td>
                <td>  {{$item['data']->cities}} </td>
                <td>  {{$item['data']->phone}} </td>
                <td></td>
                <td>
                    <a href=" " class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="ویرایش"> ویرایش </a>
                    <a href=" " class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="حذف"> حذف </a>
                </td>
            </tr>
            @endforeach

            <!-- More users list goes here -->
        </tbody>
    </table>

</div>

@endsection