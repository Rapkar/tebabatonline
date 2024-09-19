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
   
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a href=" " class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="ویرایش"> ویرایش </a>
                    <a href=" " class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="حذف"> حذف </a>
                </td>
            </tr>
      
            <!-- More users list goes here -->
        </tbody>
    </table>

</div>

@endsection