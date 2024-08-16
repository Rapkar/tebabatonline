@extends('admin_panel.layouts.app')

@section('content')
<div class="container">
<table class="table table-striped table-bordered table-rtl">
  <thead>
    <tr>
      <th>نام پست</th>
      <th>وضعیت</th>
      <th>تعداد بازدید</th>
      <th>عملیات</th>
    </tr>
  </thead>
  <tbody>
    <!-- Users list goes here -->
    <tr>
      <td>علی محمدي</td>
      <td>alimonavi@gmail.com</td>
      <td>ادمین</td>
      <td>
        <button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="ویرایش"><i class="bi bi-pencil"></i></button>
        <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="حذف"><i class="bi bi-trash"></i></button>
      </td>
    </tr>
    <!-- More users list goes here -->
  </tbody>
</table>
</div>

@endsection