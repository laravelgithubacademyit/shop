@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">ویژگی های محصول  {{$product->name}}</h3>
                </div>

                @php
                    $propertyGroups = $product->category->propertyGroups
                @endphp

                <div class="box-body">
                    <form action="{{route('products.properties.store', $product)}}" method="post" enctype="multipart/form-data">
                        @csrf

                        @foreach($propertyGroups as $group)
                            <h3>{{$group->title}}</h3>
                            <div class="row">
                                @foreach($group->properties as $property)
                                    <div class="form-group col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <label for="name">{{$property->title}}</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="properties[{{$property->id}}][value]" value="{{$property->getValueForProduct($product)}}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach


                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" value="ثبت" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
            @include('admin.layout.errors')
        </div>
    </div>

@endsection
