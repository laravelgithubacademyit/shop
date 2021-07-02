@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">
                        مشخصات
                    </h1>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>گروه مشخصات</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
                                <tr>
                                    <td>{{$property->id}}</td>
                                    <td>{{$property->title}}</td>
                                    <td>{{$property->propertyGroup->title}}</td>
                                    <td>
                                        <a href="{{route('properties.edit', $property)}}" class="btn btn-sm btn-primary">ویرایش</a>
                                    </td>
                                    <td>
                                        <form action="{{route('properties.destroy', $property)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-sm btn-danger" value="حذف">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>گروه مشخصات</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="/admin/assets/vendor_components/datatable/datatables.min.js"></script>

    <!-- Superieur Admin for Data Table -->
    <script src="/admin/js/pages/data-table.js"></script>


@endsection
