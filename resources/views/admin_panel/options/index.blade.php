@extends('admin_panel.layouts.app', ['title' =>$title])

@section('content')

<div class="container">
    <form action="{{ route('options.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5">

            <!-- Title Input Section -->
            <div class="mb-4">
                <label for="titleInput" class="form-label">{{__("admin.Enter Title")}}</label>
                <input type="text" name="title" value="{{@$options['title']}}" class="form-control" id="title" placeholder="{{__('admin.Enter Title')}}">
            </div>
            <h2 class="text-center mb-3">{{__("admin.Upload Your Logo")}}</h>
                <!-- Logo Upload Section -->
                <div class="d-flex flex-column justify-content-center mt-4">
                    <div class="dz-preview dz-file-preview">
                        <div class="dz-image mb-4">
                            <img class="logoimg" data-dz-thumbnail src="{{@$options['logoimg'] }}" />
                        </div>
                    </div>
                    <div class="dropzone d-flex felx-column align-items-center" id="logoimgbox">
                        <input type="hidden" id="logoimg" value="{{@$options['logoimg'] }}" name="logoimg">
                    </div>
                </div>
        </div>

        <hr>

        <!-- Security Question Toggle -->
        <div class="mb-3">
            <div class="form-check form-switch inline-block">
                <input class="form-check-input" type="checkbox" name="showSecurityQuestion"
                    @checked(old('showSecurityQuestion', @$options['showSecurityQuestion']))>
                <label class="form-check-label" for="showSecurityQuestion"> {{__("admin.Enable security question on the login form")}}</label>
            </div>
        </div>

        <!-- Maintenance Mode Toggle -->
        <div class="mb-3">
            <div class="form-check form-switch inline-block">
                <input class="form-check-input" type="checkbox" id="showMaintenanceMode" name="showMaintenanceMode"
                    @checked(old('showMaintenanceMode', @$options['showMaintenanceMode']))>
                <label class="form-check-label" for="showMaintenanceMode"> {{__("admin.Disable Website or Maintenance Mode")}}</label>
            </div>
        </div>


        <hr>
        <div class="form-group mb-3">
            <label for="exampleFormControlTextarea1">{{__("admin.Data of robots.txt File")}}</label>

        </div>
        <button type="submit" class="btn btn-primary">ثبت تنظیمات</button>
</div>

</form>
<form  class="container mt-5" action="{{ route('update.robot') }}" method="post">
@csrf    
<textarea dir="ltr" name="robot" class="form-control  mb-3" id="exampleFormControlTextarea1" rows="5">{{$robotcontent}}</textarea>
    <button type="submit" class="btn btn-primary">ثبت ربات</button>
</form>
</div>

@endsection