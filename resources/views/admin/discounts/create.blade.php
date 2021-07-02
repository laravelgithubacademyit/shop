@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">ایجاد تخفیف</h3>
                </div>
                <div class="box-body">
                    <form action="{{route('products.discounts.store', $product)}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="value">مقدار</label>
                            <input type="number" max="100" min="1" class="form-control" name="value" id="value">
                        </div>

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
