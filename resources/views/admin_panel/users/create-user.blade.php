@extends('admin_panel.layouts.app')

@section('content')
<div class="container">
<form id="createUserForm" action="{{ route('store') }}" method="post" class="form-horizontal row">
    @csrf
  <div class="form-group  mb-4">
    <label for="name" class="col-sm-2 control-label">نام کاربر:</label>
    <div class="col-sm-10">
      <input type="text" id="name" name="name"  class="form-control" placeholder="نام کاربر" required>
    </div>
  </div>
  <div class="form-group  mb-4">
    <label for="email" class="col-sm-2 control-label">ایمیل:</label>
    <div class="col-sm-10">
      <input type="email" id="email" name="email"  class="form-control" placeholder="ایمیل" required>
    </div>
  </div>
  <div class="form-group  mb-4">
    <label for="password" class="col-sm-2 control-label">کلمه عبور:</label>
    <div class="col-sm-10">
      <input type="password" id="password"  name="password" class="form-control" placeholder="کلمه عبور" required>
    </div>
  </div>
  <div class="form-group  mb-4">
    <label for="access" class="col-sm-2 control-label">دسترسی:</label>
    <div class="col-sm-10">
      <select id="access" name="role" class="form-control">
        @foreach($roles as $role)
        <option value="{{$role->id}}">{{$role->persian_name}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group  mb-4">
    <label for="phone" class="col-sm-2 control-label">تلفن:</label>
    <div class="col-sm-10">
      <input type="tel" id="phone" name="phone" class="form-control" placeholder="تلفن">
    </div>
  </div>
  <div class="form-group  mb-4">
    <label for="address" class="col-sm-2 control-label">آدرس:</label>
    <div class="col-sm-10">
      <textarea id="address" name="address" class="form-control" placeholder="آدرس"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">ایجاد کاربر</button>
    </div>
  </div>
</form>
</div>

@endsection