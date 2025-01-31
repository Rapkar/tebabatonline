@extends('admin_panel.layouts.app', ['title' =>$title])

@section('content')

<div class="container">
    <form method="post" action="{{route('events.store')}}">
        @csrf
        <div class="row">
        <label class="col-lg-12" >
        <textarea class="w-100"  name="message"></textarea>
        </label>
     
            <label class="col-lg-4" >
            <input   type="radio" name="to" value="all">{{__("admin.Send To All")}}
            </label>
            <label class="col-lg-4" >
            <input   type="radio" name="to" value="user_id">{{__("admin.Send To Specify user")}}
            </label>
            <label class="col-lg-4" >
            <input class="col-lg-12"  type="text" name="user_id" placeholder="12"> 
             </label>
            </div>
        <input type="submit" value="ارسال">

    </form>
</div>

@endsection