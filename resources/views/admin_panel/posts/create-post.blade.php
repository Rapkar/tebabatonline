@extends('admin_panel.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>افزودن پست جدید</h1>
            <form action="{{ route('newpost') }}" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label for="title">تیتر:</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group mb-4" >
                    <label for="body">محتوا:</label>
                    <textarea  id="postcontent" name="body"></textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="body">تصویر شاخص:</label>
                    <div class="dropzone" id="myDropzone">

                    </div>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary">انتشار پست</button>

                </div>

            </form>
        </div>
    </div>
</div>

@endsection