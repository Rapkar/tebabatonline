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
                    <input required type="text" name="name" value="{{ $product->name }}" class="form-control" >
                </div>
                <div class="form-group mb-4">
                    <label for="body">محتوا:</label>
                    <textarea required id="postcontent"  name="content">{{ $product->content }}</textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="body">خلاصه:</label>
                    <textarea required rows="6" id="expert" value="" name="expert" class=" form-control w-100">{{ $product->expert }}</textarea>
                </div>
                <div class="form-group col-lg-6 mb-4">
                    <label for="body">قیمت:</label>
                    <input type="number"  id="price"   name="price" value="{{ $product->price }}" class=" form-control w-100"></input>
                </div>
                <div class="form-group col-lg-6 mb-4">
                    <label for="body">تعداد:</label>
                    <input required type="number"  id="quantity" value="{{ $product->quantity }}"   name="quantity" class=" form-control w-100"></input>
                </div>
                <div class="form-group col-lg-12 mb-4">
                    <label for="body">تخفیف:</label>
                    <input type="number"  id="discount" value="0"  value="{{ $product->discount }}"  name="discount" class=" form-control w-100">%</input>
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
                   
                        <input require  type="text" class="form-control" value="{{ old('slug') }}" placeholder="آدرس پست من " name="slug" />
                   
                </div>
                <div class="form-group mb-4">
                    <label for="body">تصویر شاخص:</label>
                    <div class="dz-preview dz-file-preview">
                        <div class="dz-image">
                            <img data-dz-thumbnail src="{{ url($product->image ?? '') }}" />
                        </div>
                    </div>
                    <div  class="dropzone" id="postimg">
                        <input type="hidden" value="{{@$product->image}}" id="image" name="image">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="body">تصاویر محصول</label>
                    <div class="dz-preview dz-file-preview">
                        <div class="dz-image">
                            <img data-dz-thumbnail src="{{ url($product->image ?? '') }}" />
                        </div>
                    </div>
                    <div class="dropzone postimg">
                        <input type="hidden" id="gallery"  value="{{@$product->gallery}}" name="gallery[]" />
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="body">وضعیت:</label>
                    <select id="status" name="status">
                        <option {{ $product->status == 0 ? 'selected' : '' }} value="0">عدم انتشار</option>
                        <option {{ $product->status == 1 ? 'selected' : '' }} value="1">انتشار</option>
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