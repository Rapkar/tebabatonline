@extends('admin_panel.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>افزودن پست جدید</h1>
            <form action="{{ route('store') }}" method="post">
                @csrf
                <div class="form-group mb-4">
                    <label for="title">تیتر:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group mb-4" >
                    <label for="body">محتوا:</label>
                    <textarea  id="postcontent" name="content"></textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="body">تصویر شاخص:</label>
                    <div class="dropzone" id="myDropzone">

                    </div>
                </div>
                <div class="form-group mb-4" >
                    <label for="body">وضعیت:</label>
                    <select name="status">
                        <option value="0" >عدم انتشار</option>
                        <option value="1" >انتشار</option>
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