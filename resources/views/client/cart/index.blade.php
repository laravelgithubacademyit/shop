@extends('client.layout.master')


@section('content')

    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                <li><a href="cart.html">سبد خرید</a></li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-12">
                    <h1 class="title">سبد خرید</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td class="text-center">تصویر</td>
                                <td class="text-left">نام محصول</td>
                                <td class="text-left">مدل</td>
                                <td class="text-left">تعداد</td>
                                <td class="text-right">قیمت واحد</td>
                                <td class="text-right">کل</td>
                            </tr>
                            </thead>
                            <tbody id="cart-table-body">
                            @foreach($items as $item)
                                @php
                                    $product = $item['product'];
                                    $productQty = $item['quantity'];
                                @endphp
                                <tr class="cart-row-{{$product->id}}">
                                    <td class="text-center">
                                        <a href="product.html">
                                            <img width="100" src="{{str_replace('public', '/storage', $product->image)}}" alt="تبلت ایسر" title="تبلت ایسر" class="img-thumbnail" />
                                        </a>
                                    </td>
                                    <td class="text-left"><a href="product.html">{{$product->name}}</a><br />
                                        <small>امتیازات خرید: 1000</small></td>
                                    <td class="text-left">{{$product->brand->name}}</td>
                                    <td class="text-left">
                                        <div class="input-group btn-block quantity">
                                            <input type="text" name="quantity" value="1" size="1" id="input-quantity-{{$product->id}}" class="form-control" />
                                            <span class="input-group-btn">
                                        <button type="submit" data-toggle="tooltip" title="بروزرسانی" onclick="updateCart({{$product->id}})" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                                        <button type="button" data-toggle="tooltip" title="حذف" class="btn btn-danger" onClick="removeFromCart({{$product->id}})"><i class="fa fa-times-circle"></i></button>
                                        </span>
                                        </div>
                                    </td>
                                    <td class="text-right">{{$product->cost_with_discount}} تومان</td>
                                    <td class="text-right"><span id="total-amount-{{$product->id}}">{{$product->cost_with_discount * $productQty}}</span> تومان</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-8">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="text-right"><strong>جمع کل:</strong></td>
                                    <td class="text-right"><span class="total-amount">{{\App\Models\Cart::totalAmount()}}</span> تومان</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>قابل پرداخت :</strong></td>
                                    <td class="text-right"><span class="total-amount">{{\App\Models\Cart::totalAmount()}}</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="buttons">
                        <div class="pull-left"><a href="index.html" class="btn btn-default">ادامه خرید</a></div>
                        <div class="pull-right"><a href="checkout.html" class="btn btn-primary">تسویه حساب</a></div>
                    </div>
                </div>
                <!--Middle Part End -->
            </div>
        </div>
    </div>

@endsection
