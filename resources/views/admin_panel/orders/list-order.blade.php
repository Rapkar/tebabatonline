@extends('admin_panel.layouts.app')

@section('content')
<div class="container">
  <form class="filter" method="post" action="{{route('posts.filter')}}">
    @csrf
    <fieldset class="row mb-5">
      <legend>فیلتر جستجو</legend>
      <div class="form-group col-lg-2">
        <label for="exampleInputEmail1"> {{__('admin.by data')}}</label>
        <input type="date" class="form-control" id="date" name="date" aria-describedby="date" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted"> بر اساس تاریخ ثبت جستجو کنید.</small>
      </div>
      <div class="form-group col-lg-4">
        <label for="exampleInputEmail1"> {{__('admin.by name')}}</label>
        <input type="text" class="form-control" id="name" aria-describedby="name" name="name" placeholder="نام پست را وارد کنید.">
        <small id="emailHelp" class="form-text text-muted">براساس شماره فاکتور جستجو کنید.</small>
      </div>
      <div class="form-group col-lg-3">
        <label for="exampleInputEmail1"> {{__('admin.by status')}}</label>
        <select name="status" class="custom-select form-control   mb-3">
          <option disabled>انتخاب وضعیت انتشار</option>
          <option value="pending">درحال پردازش</option>
          <option value="completed">تکمیل شده</option>
          <option value="canceled">لغو شده (غیرفعال)</option>
        </select>
        <small id="emailHelp" class="form-text text-muted">بر اساس وضعیت سفارش جستجو کنید.</small>
      </div>
      <div class="form-group col-lg-3">
        <label for="exampleInputEmail1"> {{__('admin.show result')}}</label>
        <button type="submit" class="form-control btn btn-primary">{{__('admin.search')}}</button>
        <small id="emailHelp" class="form-text text-muted">با کلیک روی این گزینه فیلتر مورد نظر اعمل میشود</small>
      </div>

    </fieldset>

  </form>
  <hr>
  <table class="table table-striped table-bordered table-rtl">
    <thead>
      <tr>
        <th>شماره سفارش</th>
        <th>تاریخ سفارش</th>
        <th>نام خریدار </th>
        <th>وضعیت سفارش<br><small>(تکمیل شده | درحال پردازش | لغو شده)</small></th>
        <th>مبلغ(تومان)</th>
        <th>عملیات</th>
      </tr>
    </thead>
    <tbody>
      <!-- Users list goes here -->

      @foreach($orders as $order)
      <tr>
        <td>{{ $order->id }}</td>
        <td>@Jdate($order->created_at)</td>
        <td>{{ $order->user->name }}</td>
        <td>
          <span class="status {{ $order->status == "completed" ? 'green':"" }}   {{ $order->status == "pending" ? 'red':"" }}   {{ $order->status == "canceled" ? 'gray':"" }} "> </span>
        </td>
        <td>{{ number_format($order->total_amount) }}</td>
        <td>
          <a href="{{ route('order.review', $order->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="ویرایش"> بررسی </a>
          <a href="{{ route('delete', $order->id) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="حذف"> حذف </a>
        </td>
      </tr>

      @endforeach

      <!-- More users list goes here -->
    </tbody>
  </table>
  @include('admin_panel.layouts.pagination')
</div>

@endsection