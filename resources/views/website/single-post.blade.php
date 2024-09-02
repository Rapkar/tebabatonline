@extends('website.layouts.app')
@section('content')
<div class="container">
 <h1>
 {{$post->name}}
 <img src="{{$post->image}}">
 </h1>
 {!! $post->content !!}

</div>

@endsection