@extends('layouts.app_customer')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Hotel Booking') }}</h1>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Hotel Package ID</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($hotel_bookings as $booking)
                                @if($booking->name == Auth::user()->name)
                                <tr>
                                    <td>{{ $booking->name }}</td>
                                    <td>{{ $booking->email }}</td>
                                    <td>{{ $booking->hotel_package_id }}</td>
                                    <td>{{ $booking->date }}</td>
                                </tr>
                                @endif

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{ $hotel_bookings->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
