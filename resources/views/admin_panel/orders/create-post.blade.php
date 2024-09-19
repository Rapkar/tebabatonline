@extends('admin_panel.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>افزودن پست جدید</h1>
            <form action="{{ route('poststore') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label for="title">تیتر:</label>
                    <input required type="text" value="{{ old('name') }}" name="name"  class="form-control" >
                </div>
                <div class="form-group mb-4">
                    <label for="body">محتوا:</label>
                    <textarea id="postcontent" value="{{ old('content') }}" required name="content">{{ old('content') }}</textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="body">خلاصه:</label>
                    <textarea rows="6" id="expert" required value="{{ old('expert') }}" name="expert" class=" form-control w-100">{{ old('expert') }}</textarea>
                </div>
                <div class="form-group mb-4 col-lg-6">
                <label for="body">دسته بندی:</label>
                <select multiple   id="category" name="category[]">
                    @foreach($categories as $category )
                    <option value="{{$category->id}}" {{ in_array($category->id, old('category', [])) ? 'selected' : '' }}>{{$category->name}}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group mb-4 col-lg-6">
                    <label for="body">آدرس لینک:</label> 
                    website.com/<b>post1</b><br>
                   
                        <input required  type="text"  value="{{ old('slug') }}" class="form-control" placeholder="آدرس پست من " name="slug" />
                   
                </div>
                <div class="form-group mb-4">
                    <label for="body">تصویر شاخص:</label>
                    <div class="dropzone" id="postimg">
                        <input type="hidden" id="image" name="image">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="body">وضعیت:</label>
                    <select id="status"  name="status">
                        <option value="0">عدم انتشار</option>
                        <option value="1">انتشار</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">ثبت پست</button>

                </div>

            </form>
        </div>
    </div>
</div>

@endsection