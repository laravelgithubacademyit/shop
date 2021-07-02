@extends('client.layout.master')


@section('content')

    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                <li><a href="#">حساب کاربری</a></li>
                <li><a href="wishlist.html">لیست علاقه مندی من</a></li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-12">
                    <h1 class="title">لیست علاقه مندی ها</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td class="text-center">تصویر</td>
                                <td class="text-left">نام محصول</td>
                                <td class="text-left">دسته بندی</td>
                                <td class="text-right">قیمت واحد</td>
                                <td class="text-right">عملیات</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td class="text-center"><a href="{{route('client.products.show', $product)}}"><img width="100" src="{{str_replace('public', '/storage', $product->image)}}" alt="{{$product->name}}" title="{{$product->name}}" /></a></td>
                                        <td class="text-left"><a href="{{route('client.products.show', $product)}}">{{$product->name}}</a></td>
                                        <td class="text-left">{{$product->category->title}}</td>
                                        <td class="text-right"><div class="price">{{$product->cost}}</div></td>
                                        <td class="text-right">
                                            <button class="btn btn-primary" title="" data-toggle="tooltip" onClick="addToCart({{$product->id}});" type="button" data-original-title="افزودن به سبد"><i class="fa fa-shopping-cart"></i></button>
                                            <form action="{{route('client.likes.destroy', $product)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Middle Part End -->
            </div>
        </div>
    </div>

@endsection
