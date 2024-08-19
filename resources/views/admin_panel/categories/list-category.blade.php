@extends('admin_panel.layouts.app')

@section('content')
<div class="container">
  
<!-- main container -->
<div id="catlist">
  @foreach($categories as $category)
    <div id="{{$category->id}}" class="sortable">
      <h2>{{ $category->name }}</h2>
      @foreach($category->subcategory as $subcategory)
        <div class="subcategory" >
          <p>{{ $subcategory->name }}</p>
        </div>
      @endforeach
    </div>
  @endforeach
</div>
@endsection
</div>


