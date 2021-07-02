@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">ایجاد کد تخفیف</h3>
                </div>
                <div class="box-body">
                    <form action="{{route('offers.store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="code">کد</label>
                            <input type="text" class="form-control" name="code" id="code">
                        </div>


                        <div class="form-group">
                            <label for="starts_at">تاریخ آغاز</label>
                            <input type="date" class="form-control" name="starts_at" id="starts_at">
                        </div>

                        <div class="form-group">
                            <label for="expires_at">تاریخ پایان</label>
                            <input type="date" class="form-control" name="expires_at" id="expires_at">
                        </div>

                        @include('admin.layout.errors')

                        <div class="form-group">
                            <input type="submit" name="submin" id="submit" value="ثبت" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
