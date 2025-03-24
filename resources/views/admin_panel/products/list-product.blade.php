@extends('admin_panel.layouts.app')

@section('content')
<div class="container">
<form class="filter" method="post" action="{{route('products.filter')}}">
    @csrf
    <fieldset class="row mb-5"> <legend>فیلتر جستجو</legend>
      <div class="form-group col-lg-2">
        <label for="exampleInputEmail1"> {{__('admin.by data')}}</label>
        <input type="date" class="form-control" id="date" name="date" aria-describedby="date" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted"> بر اساس تاریخ ثبت جستجو کنید.</small>
      </div>
      <div class="form-group col-lg-4">
        <label for="exampleInputEmail1"> {{__('admin.by name')}}</label>
        <input type="text" class="form-control" id="name" aria-describedby="name" name="name" placeholder="نام محصول را وارد کنید.">
        <small id="emailHelp" class="form-text text-muted">براساس نام محصول جستجو کنید.</small>
      </div>
      <div class="form-group col-lg-3">
        <label for="exampleInputEmail1"> {{__('admin.by status')}}</label>
        <select name="status" class="custom-select form-control   mb-3">
          <option disabled>انتخاب وضعیت انتشار</option>
          <option value="2">همه</option>
          <option value="1">انتشار</option>
          <option value="0">عدم انتشار</option>
        </select>
        <small id="emailHelp" class="form-text text-muted">بر اساس وضعیت انتشار یا عدم انتشار جستجو کنید.</small>
      </div>
      <div class="form-group col-lg-3">
        <label for="exampleInputEmail1"> {{__('admin.show result')}}</label>
        <button type="submit" class="form-control btn btn-primary">{{__('admin.search')}}</button>
        <small id="emailHelp" class="form-text text-muted">با کلیک روی این گزینه فیلتر مورد نظر اعمل میشود</small>
      </div>
     
    </fieldset>

  </form>
  <table class="table table-striped table-bordered table-rtl">
    <thead>
      <tr>
        <th>نام محصول</th>
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
          <a   href="{{ route('products', $product->slug) }}" target="_new" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="نمایش محصول"> نمایش </a>
        </td>
      </tr>
      @endforeach
      <!-- More users list goes here -->
    </tbody>
  </table>
  @include('admin_panel.layouts.pagination')
</div>

@endsection