@foreach($recommendations as $item)
<tr>
    <td>{{$item->content}} </td>
    <td>{{$item->pivot->comment}} </td>
    <td></td>
      <td><a class="btn btn-dark"  href="#">نمایش</a></td>
      <td></td>
    <td>
        <form method="post" action="{{route('invisitrmdrecom')}}">
            @csrf
            <input type="hidden" name="recommendation_id" value="{{$item->id }}">
            <input type="hidden" name="visit_id" value="{{$visit_id }}">
            <button class="btn btn-danger" type="submit">حذف</button>
        </form>
    </td>

</tr>
@endforeach