@foreach($recommendations as $item)
<tr>
    <td>{{$item->id}}</td>
    <td>{{$item->content}} </td>
    <td>
        <form method="post" action="{{route("invisitrmdrecom")}}">
            @csrf
            <input type="hidden" name="recommendation_id" value="{{$item->id }}">
            <input type="hidden" name="visit_id" value="{{$visit_id }}">
            <button type="submit">حذف</button>
        </form>
    </td>

</tr>
@endforeach