@extends('admin_panel.layouts.app')

@section('content')
<div class="container">
  <table class="table table-striped table-bordered table-rtl">
    <thead>
      <tr>
        <th>شماره سفارش</th>
        <th>تاریخ سفارش</th>
        <th>نام خریدار </th>
        <th>وضعیت سفارش</th>
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
          <span class="status {{ $order->status == 1 ? 'green' : 'red' }} "> </span>
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