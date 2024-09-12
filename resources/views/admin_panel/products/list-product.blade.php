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

      @foreach($products as $product)
      <tr>
        <td>{{ $product->name }}</td>
        <td>
          <span class="status {{ $product->status == 1 ? 'green' : 'red' }} "> </span>
        </td>
        <td>{{ $product->count }}</td>
        <td>
          <a href="{{ route('editproduct', $product->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="ویرایش"> ویرایش </a>
          <a href="{{ route('deleteproduct', $product->id) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="حذف"> حذف </a>
          <a   href="{{ route('products', $product->slug) }}" target="_new" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="نمایش پست"> نمایش </a>
        </td>
      </tr>
      @endforeach
      <!-- More users list goes here -->
    </tbody>
  </table>
  @include('admin_panel.layouts.pagination')
</div>

@endsection