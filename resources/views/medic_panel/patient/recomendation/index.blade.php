@extends('medic_panel.layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped table-bordered table-rtl">
        <thead>
            <tr>
                <th>شماره</th>
                <th>توصیه</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            <!-- Users list goes here -->

            @foreach($result as $item)
           
            <tr>
                <td>{{ $item->id  }}</td>
                <td>   {{ substr($item->content,0,50)}} </td>
                <td>
                    <a href="{{route('editRecommendation',$item->id)}}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="ویرایش"> بررسی </a>
                    <a href="{{ route('deleteRecommendation',$item->id) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="حذف"> حذف </a>
                </td>
            </tr>
            @endforeach

            <!-- More users list goes here -->
        </tbody>
    </table>

</div>

@endsection