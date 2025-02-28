@extends('admin_panel.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <table class="table table-striped table-bordered table-rtl">
                <thead>
                    <th>شماره محصول</th>
                    <th>نام محصول</th>
                    <th>تعداد</th>
                    <th>قیمت</th>
                </thead>
                <tbody>

                    @foreach ($orders as $product )
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                    </tr>
                    @endforeach

                </tbody>

            </table>

        </div>
    </div>
</div>

@endsection