@if(count($orderitems) > 0)
<div class="minicart  d-flex flex-column">
    <ul class=" ">


        @foreach($orderitems as $cart)

        @foreach($cart->products as $item )
        @if($item)
        <li class="d-flex justify-content-between">
            <a href="{{$item->slug}}">{{$item->name}}</a>
            <img class="mw-100 w-50" src="{{$item->image}}">
            <p class="count"><input class="count" attr-id="{{$item->id}}"  name="quanity" type="number" value="{{$item->pivot->quantity}}"></p>
            <form method="post" class="removefromcart" name="removefromcart"action="{{ route('removefromcart', ['cartid' =>$cart->id, 'productid' =>  $item->id ]) }}"  >

                @csrf
                <input type="hidden" name="product_id" value="{{$item->id}}">
                <input type="hidden" name="cart_id" value="{{$cart->id}}">
                <button type="submit">&#128465; </button>
            </form>
        </li>
        @else
        <li>محصولی وجود ندارد</li>
        @endif
        @endforeach

        @endforeach


    </ul>

    <div class="row d-flex align-items-center w-100  ">
        <div class="col-lg-6 d-flex">
            <a href="{{route('cart')}}" class="buy"> پرداخت</a>
        </div>
        <div class="col-lg-6 d-flex">{{$totalprice}}</div>
    </div>

</div>
@endif