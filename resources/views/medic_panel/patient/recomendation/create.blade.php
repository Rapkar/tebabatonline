@extends('medic_panel.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>افزودن {{$title}} جدید</h1>
            
            <form action="{{ route('storeRecommendation') }}" method="post" enctype="multipart/form-data" class="row">
                @csrf
                @if($type=="medicinerecomendation")
                توصیه مربوط به محصول :
                <select name="product" >
                    @foreach($products as $product)
                        <option value="{{$product->id}}" >{{$product->name}}</option>
                    @endforeach
                </select>
                @endif
                <input type="hidden" name="type"value="{{$type}}">
                <div class="form-group mb-4 col-lg-12">
                    <label for="body">محتوا:</label>
                    <textarea rows="5" cols="40" class="w-100" id="content" value="{{ old('content') }}"  name="content">{{ old('content') }}</textarea>
                </div>
                <div class="form-group col-lg-12">
                    <button type="submit" class="btn btn-primary">ثبت {{$title}}</button>

                </div>

            </form>
        </div>
    </div>
</div>
@endsection