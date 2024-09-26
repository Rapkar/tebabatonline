@if(count($orderitems) > 0)
<div class="minicart pt-5 d-flex flex-column">
    <ul class="mt-4 pt-4">
        @if(is_array($orderitems))
        @foreach($orderitems as $item)
        <li class="d-flex justify-content-between">
            <a href="{{$item->slug}}">{{$item->name}}</a>
            <img class="mw-100 w-50" src="{{$item->image}}">
            <p class="count"><input class="count" name="quanity" type="number" value="3"></p>
            <form method="post" class="removefromcart" name="removefromcart" action="{{ route('removefromcart',$item->id)}}">
                @csrf
                <input type="hidden" name="product_id" value="{{$item->id}}">
                <button type="submit">&#128465; </button>
            </form>
        </li>
        @endforeach
        @else
        <li>محصولی وجود ندارد</li>
        @endif
    </ul>
    @if(is_array($orderitems))
    <div class="row d-flex align-items-center w-100 mt-4 pt-2">
        <div class="col-lg-6 d-flex">
            <a href="#" class="buy"> پرداخت</a>
        </div>
        <div class="col-lg-6 d-flex">145000</div>
    </div>
    @endif
</div>
@endif