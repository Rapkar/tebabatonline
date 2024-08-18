@extends('admin_panel.layouts.app')

@section('content')
<div class="container">
<form id="createUserForm" action="{{route('store')}}" method="post" class="form-horizontal row">
    @csrf
  <div class="form-group  mb-4">
    <label for="name" class="col-sm-2 control-label">نام دسته بندی:</label>
    <div class="col-sm-10">
      <input type="text" id="name" name="name"  class="form-control" placeholder="نام دسته بندی:" required>
    </div>
  </div>
  <div class="form-group  mb-4">
    <label for="content" class="col-sm-2 control-label">توضیحات:</label>
    <div class="col-sm-10">
      <input type="text" id="content" name="content"  class="form-control" placeholder="توضیحات" required>
    </div>
  </div>
  <div class="form-group  mb-4">
    <label for="access" class="col-sm-2 control-label">فرزند:</label>
    <div class="col-sm-10">
      <select id="access" name="role" class="form-control">
      <option value="0">نیست</option>
        @foreach($categories as $category)
        <option value="{{$role->id}}">{{$category->name}}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">ایجاد دسته بندی</button>
    </div>
  </div>
</form>
</div>

@endsection