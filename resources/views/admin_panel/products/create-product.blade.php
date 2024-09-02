@extends('admin_panel.layouts.app', ['title' =>$title])

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>افزودن محصول جدید</h1>
            <form action="{{ route('productstore') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label for="title">تیتر:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="body">محتوا:</label>
                    <textarea id="postcontent"  name="content"></textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="body">خلاصه:</label>
                    <textarea rows="6" id="expert" value="" name="expert" class=" form-control w-100"></textarea>
                </div>
                <div class="form-group col-lg-6 mb-4">
                    <label for="body">قیمت:</label>
                    <input type="number"  id="price"   name="price" class=" form-control w-100"></input>
                </div>
                <div class="form-group col-lg-6 mb-4">
                    <label for="body">تعداد:</label>
                    <input type="number"  id="quantity"   name="quantity" class=" form-control w-100"></input>
                </div>
                <div class="form-group col-lg-12 mb-4">
                    <label for="body">تخفیف:</label>
                    <input type="number"  id="discount" value="0"  name="discount" class=" form-control w-100">%</input>
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
                   
                        <input require  type="text" class="form-control" placeholder="آدرس پست من " name="slug" />
                   
                </div>
                <div class="form-group mb-4">
                    <label for="body">تصویر شاخص:</label>
                    <div class="dropzone" id="postimg">
                        <!-- <input type="file" name="image" /> -->
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="body">تصاویر محصول</label>
                    <div class="dropzone postimg">
                        <!-- <input type="file" name="image" /> -->
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