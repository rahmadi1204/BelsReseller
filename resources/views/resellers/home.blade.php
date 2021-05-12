@extends('layouts.app')

@section('head')

@endsection
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="row">
            <div class="col-12">
                <div class="card card-teal">
                    <div class="card-header">
                        <h3 class="card-title">Bels Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="row">
                            @foreach ($imageProduct as $item)
                                <div class="col-sm-3">
                                    <div class="position-relative">
                                        <img src="{{ asset('/') }}dist/img/products/{{ $item->product_image }}"
                                            alt="Photo 1" class="img-fluid">
                                        <div class="ribbon-wrapper">
                                            <div class="ribbon bg-teal">
                                                Newest Product
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.card -->

    </section>
@endsection
