@extends('admin_panel.layouts.app')

@section('content')
<div class="container">
  <table class="table table-striped table-bordered table-rtl">
    <thead>
      <tr>
        <th>نام پست</th>
        <th>وضعیت</th>
        <th>تعداد بازدید</th>
        <th>عملیات</th>
      </tr>
    </thead>
    <tbody>
      <!-- Users list goes here -->

      @foreach($posts as $post)
      <tr>
        <td>{{ $post->name }}</td>
        <td>{{ $post->status }}</td>
        <td>{{ $post->count }}</td>
        <td>
          <a href="{{ route('edit', $post->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="ویرایش"> ویرایش </a>
          <a href="{{ route('delete', $post->id) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="حذف"> حذف </a>
        </td>
      </tr>
      @endforeach
      <!-- More users list goes here -->
    </tbody>
  </table>
</div>

@endsection