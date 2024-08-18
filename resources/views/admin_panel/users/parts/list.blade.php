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