@extends('website.layouts.app')

@section('content')
<div class="container pt-5 mt-5">
    <div class="row">
    @include('user_panel.layouts.layout')
        <div class="col-lg-8">
            <table dir="rtl">
                <tr>
                <td>داشبورد</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection