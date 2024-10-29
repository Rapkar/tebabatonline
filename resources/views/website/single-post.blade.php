@extends('website.layouts.app')
@section('content')
<div class=" pt-5 mt-5 diseases">
    <div class="diseases-header">

        <h1>{{$post->name}}</h1>
    </div>
</div>
<div class="container">
    {!! $post->content !!}
    @auth
    <div class="comments">

        <h2>دیدگاهتان را بنویسید</h2>
        <p>نشانی ایمیل شما منتشر نخواهد شد. بخش‌های موردنیاز علامت‌گذاری شده‌اند *</p>

        <form method="post" action="{{route('storecomment') }}" class="d-flex flex-column">
            @csrf
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <label>
                دیدگاه <b>*</b>
                <textarea name="content"></textarea>
            </label>
            <button>فرستادن دیدگاه</button>
        </form>
        <ul>
            @foreach($comments as $comment)
            <li>
                {{$comment->user->name}} گفت:
                {{$comment->content}}
            </li>
            @endforeach
        </ul>
    </div>
    @endauth
</div>

@endsection