@extends('website.layouts.app')

@section('content')

<div class="container-fluid  pt-5   diseases h-auto d-flex flex-column ">
    <div class="diseases-header">

        <h2>بیماری‌ها بر اساس اعضای بدن</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 pt-5">
                <a href="#" class="item">
                    <img src="{{ asset('images/website/post1.png') }}" alt="">
                    <h2>بیماری سر و اعضای مرتبط</h2>

                </a>
            </div>

            <div class="col-lg-3 pt-5">
                <a href="#" class="item">
                    <img src="{{ asset('images/website/post1.png') }}" alt="">

                    <h2>بیماری سر و اعضای مرتبط</h2>

                </a>

            </div>
            <div  class="col-lg-3 pt-5">
                <a ref="#"  class="item">
                    <img src="{{ asset('images/website/post1.png') }}" alt="">

                    <h2>بیماری سر و اعضای مرتبط</h2>
                </a>

            </div>
            <div class="col-lg-3 pt-5">
                <a href="#" class="item">
                    <img src="{{ asset('images/website/post1.png') }}" alt="">

                    <h2>بیماری سر و اعضای مرتبط</h2>
                </a>

            </div>
        </div>

    </div>
</div>

</div>
@endsection