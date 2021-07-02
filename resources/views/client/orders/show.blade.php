@extends('client.layout.master')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-6 mt-5">
            @if($order->payment_status == 'OK')
                <p class="bg-success p-4">پرداخت با موفقیت انجام شد</p>
            @else
                <p class="bg-danger p-4">پرداخت ناموفق بود</p>
            @endif
        </div>
    </div>
</div>

@endsection
