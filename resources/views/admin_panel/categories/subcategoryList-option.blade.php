
@foreach($subcategories as $subcategory)
<?php $i = 1; ?>
<div  order="{{$category->order}}" class="nested-sortable nested{{$i}}">
    <p>{{ $category->name }}</p>

    @if(count($subcategory->subcategory))
    <?php $i++ ?>
    @include('admin_panel.categories.subcategoryList-option',['subcategories' => $subcategory->subcategory])
    @else
</div>

@endif

@endforeach
</div>