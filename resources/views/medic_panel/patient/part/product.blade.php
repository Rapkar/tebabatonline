@foreach($selected_products as $item)
<tr>
    <td>{{$item->name}}</td>
    <td>{{$price=$item->price}} تومان</td>
    <td>{{$count=$item->pivot->count}} </td>
    <td>
        @if(count($item->recommendation)>0 )
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#descibe{{$item->id}}">
            نمایش
        </button>
        @endif

    </td>
    <td>{{$subtotal = $item->price * $item->pivot->count}}تومان </td>
    <td>
        <a class="btn btn-danger" href="{{ route('removeproducttopatient', ['visit_id' => $item->pivot->visit_id, 'product_id' => $item->pivot->product_id]) }}">
            حذف
        </a>
    </td>

</tr>
@endforeach