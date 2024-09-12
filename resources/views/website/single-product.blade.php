@extends('website.layouts.app')
@section('content')
<div class="container">
 <h1>
 {{$product->name}}
 <img src="{{$product->image}}">
 </h1>
 {!! $product->content !!}

</div>

@endsection