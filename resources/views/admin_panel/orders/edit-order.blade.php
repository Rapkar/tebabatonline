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

            <form method="post" action="{{ route("order.progress",$order->id) }}">
                @csrf
                <div class="row">
                    <div class="form-group mb-4 col-lg-6 col-6">
                        <label for="status">روش پرداخت:</label>
                        <input  class="form-control" required aria-label="وضعیت سفارش" type="text" readonly value="{{ __("admin.$order->payment_method")}}">
                     
                        <small class="form-text text-muted">وضعیت فعلی سفارش خود را انتخاب کنید.</small>
                    </div>
                    <div class="form-group mb-4 col-lg-6 col-6">
                        <label for="status">وضعیت سفارش:</label>
                        <select id="status" name="status" class="form-control" required aria-label="وضعیت سفارش">
                            <option value="" disabled selected>لطفا وضعیت سفارش را انتخاب کنید</option>
                            <option value="pending" @if($order->status == "pending") selected="true" @endif>درحال پردازش</option>
                            <option value="completed" @if($order->status == "completed") selected="true" @endif>تکمیل شده</option>
                            <option value="canceled" @if($order->status == "canceled") selected="true" @endif>لغو شده (غیرفعال)</option>
                        </select>
                        <small class="form-text text-muted">وضعیت فعلی سفارش خود را انتخاب کنید.</small>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">بررسی سفارش</button>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection