@extends('admin_panel.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>افزودن پست جدید</h1>
            <form action="{{ route('updatepost',$post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label for="title">تیتر:</label>
                    <input type="text" value="  {{ $post->name }}" name="name" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="body">محتوا:</label>
                    <textarea id="postcontent" name="content">{{ $post->content }}</textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="body">خلاصه:</label>
                    <textarea rows="6" id="expert" name="expert" class="w-100">{{ $post->expert }}</textarea>
                </div>
                <div class="form-group mb-4 col-lg-6">
                    <label for="body">دسته بندی:</label>
                    <select multiple id="category" name="category[]">
                        @foreach($categories as $category )
                        <option value="{{$category->id}}" {{ in_array($category->id, $ids) ? 'selected' : '' }}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4 col-lg-6">
                    <label for="body">آدرس لینک:</label>
                    website.com/<b>post1</b><br>

                    <input require type="text" class="form-control" value="{{$post->slug}}" placeholder="آدرس پست من " name="slug" />

                </div>
                <div class="form-group mb-4">
                    <label for="body">تصویر شاخص:</label>
                    <div class="dz-preview dz-file-preview">
                        <div class="dz-image">
                            <img data-dz-thumbnail src="{{ url($post->image) }}" />
                        </div>
                    </div>
                    <div  class="dropzone" id="postimg">
                        <input type="hidden" value="{{$post->image}}" id="image" name="image">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="body">وضعیت:</label>
                    <select id="status" name="status">
                        <option {{ $post->status == 0 ? 'selected' : '' }} value="0">عدم انتشار</option>
                        <option {{ $post->status == 1 ? 'selected' : '' }} value="1">انتشار</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">اصلاح پست</button>

                </div>

            </form>
        </div>
    </div>
</div>

@endsection