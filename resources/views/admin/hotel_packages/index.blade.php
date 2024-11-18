@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 justify-content-between d-flex">
                    <h1 class="m-0">{{ __('Hotel Package') }}</h1>
                    <a href="{{ route('admin.hotel_packages.create') }}" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i> </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Type</th>
                                        <th>Location</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($hotel_packages as $hotel_package)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $hotel_package->type }}</td>
                                        <td>{{ $hotel_package->location }}</td>
                                        <td>{{ $hotel_package->price }}</td>
                                        <td>
                                            <a href="{{ route('admin.hotel_packages.edit', [$hotel_package]) }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> </a>
                                            <form onclick="return confirm('are you sure ?');" class="d-inline-block" action="{{ route('admin.hotel_packages.destroy', [$hotel_package]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{ $hotel_packages->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
