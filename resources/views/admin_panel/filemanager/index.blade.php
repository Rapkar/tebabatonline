@extends('admin_panel.layouts.app', ['title' => 'File Manager'])

@section('content')
<h1>مدیریت فایل‌ها</h1>
<a href="{{ url()->previous() }}" class="btn btn-default">
    <i class="fa fa-arrow-left"></i> Back
</a>
<iframe src="/laravel-filemanager" style="width: 100%; height: calc(100vh - 100px); border: none; margin-top: 60px;"></iframe>
@endsection