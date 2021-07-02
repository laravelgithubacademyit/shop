@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">ایجاد اسلایدر</h3>
                </div>
                <div class="box-body">
                    <form action="{{route('sliders.update', $slider)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="link">لینک</label>
                            <input type="text" class="form-control" name="link" id="link" value="{{$slider->link}}">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="image">تصویر</label>
                                    <input type="file" name="image" id="image" class="from-control">
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{str_replace('public', '/storage', $slider->image)}}" width="100" alt="">
                                </div>
                            </div>
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
