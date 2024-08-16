@extends('admin_panel.layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped table-bordered table-rtl">
        <thead>
            <tr>
                <th>نام کاربر</th>
                <th>ایمیل</th>
                <th>دسترسی</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            <!-- Users list goes here -->
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email}}</td>
                <td>{{@$user->roles()->find($user->id)->persian_name }}</td>
                <td>
                    <button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="ویرایش"><i class="bi bi-pencil"></i></button>
                    <a href="{{ route('delete', $user->id) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="حذف"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            @endforeach
            <!-- More users list goes here -->
        </tbody>
    </table>
</div>

@endsection