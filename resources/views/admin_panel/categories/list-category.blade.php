@extends('admin_panel.layouts.app')

@section('content')
<div class="container">
@csrf
<select id="access" name="role" class="form-control">

                    @foreach($roles as $role)

                    <option value="{{$role->id}}">{{$role->persian_name}}</option>
                    @endforeach
                </select>
    <table class="table table-striped table-bordered table-rtl">
        <thead>
            <tr>
                <th>نام کاربر</th>
                <th>ایمیل</th>
                <th>دسترسی</th>
                <th>شماره تماس</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            <!-- Users list goes here -->
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ @$user->roles()->find($user->id)->persian_name }}</td>
                <td>{{ $user->phone }}</td>
                <td>
                    <a href="{{ route('edit', $user->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="ویرایش"> ویرایش </a>
                    <a href="{{ route('delete', $user->id) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="حذف"> حذف </a>
                </td>
            </tr>
            @endforeach
            <!-- More users list goes here -->
        </tbody>
    </table>
</div>

@endsection