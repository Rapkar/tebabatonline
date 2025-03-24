@extends('admin_panel.layouts.app', ['title' =>$title])

@section('content')

<div class="container">

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">تنظیمات اصلی</button>
            <button class="nav-link " id="nav-ticket-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">تیکت</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">ورود</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">ربات</button>
        </div>
    </nav>
    <form action="{{ route('options.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
         
                <label for="titleInput" class="form-label">{{__("admin.Enter Title")}}</label>
                <input type="text" name="title" value="{{@$options['title']}}" class="form-control" id="title" placeholder="{{__('admin.Enter Title')}}">
                <h2 class="text-center mb-3">{{__("admin.Upload Your Logo")}}</h2>
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
        <div class="tab-ticket fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-ticket-tab">

            <!-- Security Question Toggle -->
            <div class="mb-3 col-lg-12">
                <div class="form-check form-switch inline-block">
                    <input class="form-check-input" type="checkbox" name="showSecurityQuestion"
                        @checked(old('showSecurityQuestion', @$options['showSecurityQuestion']))>
                    <label class="form-check-label" for="showSecurityQuestion"> {{__("admin.Enable security question on the login form")}}</label>
                </div>
                <!-- Maintenance Mode Toggle -->
                <div class="mb-3">
                    <div class="form-check form-switch inline-block">
                        <input class="form-check-input" type="checkbox" id="showMaintenanceMode" name="showMaintenanceMode"
                            @checked(old('showMaintenanceMode', @$options['showMaintenanceMode']))>
                        <label class="form-check-label" for="showMaintenanceMode"> {{__("admin.Disable Website or Maintenance Mode")}}</label>
                    </div>
                </div>
            </div>


        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

            <textarea dir="ltr" name="robot" class="form-control  mb-3" id="exampleFormControlTextarea1" rows="5">{{$robotcontent}}</textarea>

        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

            <textarea dir="ltr" name="robot" class="form-control  mb-3" id="exampleFormControlTextarea1" rows="5">{{$robotcontent}}</textarea>

        </div>
    </div>

    <button type="submit" class="btn btn-primary">ثبت تنظیمات</button>

    </form>



</div>




@endsection