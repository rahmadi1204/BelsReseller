@extends('layouts.app')

@section('head')

@endsection
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="row">
            <div class="col-12">
                @if (Auth::user()->role == 'reseller')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Bels Dashboard</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            {{-- <div class="row">

                                @foreach ($imageProduct as $item)
                                    <div class="col-md-4">
                                        <div class="position-relative">
                                            <a href="/product-order/{{ $item->id_product }}">
                                                <img src="{{ asset('/') }}dist/img/products/{{ $item->product_image ?? 'no-image.jpg' }}"
                                                    alt="Photo 1" class="img-fluid" style="border-radius: 0.5rem">
                                            </a>
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon bg-teal">
                                                    Newest Product
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            {{ $item->product_name }}
                                        </div>
                                    </div>
                                @endforeach

                            </div> --}}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                @else
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dashboard</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            Dashboard admin
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                @endif
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.card -->

    </section>
@endsection
