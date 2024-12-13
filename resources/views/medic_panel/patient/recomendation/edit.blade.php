@extends('medic_panel.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>اصلاح توصیه </h1>
            <form action="{{ route('updateRecommendation',$Recommendation->id) }}" method="post" enctype="multipart/form-data" class="row">
                @csrf
                @if($Recommendation->type=="medicinerecomendation")
                توصیه مربوط به محصول :
                <select name="product" >
                    @foreach($products as $product)

                        <option value="{{ $product->id }}"
                   {{ ($product_id == $product->id) ? 'selected=true' : '' }} > {{ $product->name }}</option>

                        @endforeach
                </select>
                @endif
                <div class="form-group mb-4 col-lg-12">
                    <label for="body">محتوا:</label>
                    <textarea rows="5" cols="40" class="w-100" id="content" value="{{ $Recommendation->content}}" name="content">{{ $Recommendation->content}}</textarea>
                </div>
                <div class="form-group col-lg-12">
                    <button type="submit" class="btn btn-primary">اصلاح توصیه</button>

                </div>

            </form>
        </div>
    </div>
</div>
@if($Recommendation->type!="medicinerecomendation")
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>افزودن توضیح</h3>
            <form action="{{ route('storeDescribtion',$Recommendation->id) }}" method="post" enctype="multipart/form-data" class="row">
                @csrf
                <div class="form-group mb-4 col-lg-12">
                    <label for="body">محتوا:</label>
                    <textarea rows="5" cols="40" class="w-100" id="content" value="" name="content"></textarea>
                </div>
                <div class="form-group col-lg-12">
                    <button type="submit" class="btn btn-primary">افزودن</button>

                </div>

            </form>
        </div>
    </div>
</div>
<div class=" container describtion">
    <table class="table table-striped table-bordered table-rtl">
        <thead>
            <tr>
                <th>توضیح</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            <!-- Users list goes here -->

            @foreach($describtions as $item)

            <tr>
                <td> {{ substr($item->content,0,50)}} </td>
                <td>
                    <a href="{{ route('deleteDescribtion',$item->id) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="حذف"> حذف </a>
                </td>
            </tr>
            @endforeach

            <!-- More users list goes here -->
        </tbody>
    </table>
</div>
@endif
@endsection