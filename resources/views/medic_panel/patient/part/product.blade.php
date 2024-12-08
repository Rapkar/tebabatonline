@foreach($selected_products as $item)
<tr>
    <td>{{$item->name}}</td>
    <td>{{$price=$item->price}} تومان</td>
    <td>{{$count=$item->pivot->count}} </td>
    <td>{{$subtotal = $item->price * $item->pivot->count}}تومان </td>
    <td>
        <a href="{{ route('removeproducttopatient', ['visit_id' => $item->pivot->visit_id, 'product_id' => $item->pivot->product_id]) }}">
            حذف
        </a>
    </td>

</tr>
@endforeach