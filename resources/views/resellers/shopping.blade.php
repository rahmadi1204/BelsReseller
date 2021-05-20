@extends('layouts.app')

@section('head')
    @include('css.datatable')
@endsection
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <th>No</th>
                                <th>Gambar</th>
                                {{-- <th>Kategori</th> --}}
                                <th>Nama Barang</th>
                                <th>Option</th>

                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($products as $product)
                                    <tr class="data-row">
                                        <td style="width: 25px">{{ $i++ }}</td>
                                        <td>
                                            <a data-toggle="modal" id="update-item"
                                                data-update-id="{{ $product->id_product }}"
                                                data-update-image="{{ $product->product_image }}">
                                                <img height="75px"
                                                    src="{{ asset('/') }}dist/img/products/{{ $product->product_image ?? 'no-image.jpg' }}"
                                                    alt="Photo 1" style="border-radius: 0.5rem">
                                            </a>
                                        </td>
                                        {{-- <td>{{ $product->product_category }}</td> --}}
                                        <td>{{ $product->product_name }}</td>
                                        <td class="text-center">
                                            <a href="/product-order/{{ $product->id_product }}"
                                                class="btn btn-sm btn-outline-success"><i class="fa fa-seacrh">
                                                    Detail Produk</i>

                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-default" aria-labelledby="update-modal-label" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{-- <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> --}}
                    <div class="modal-body">
                        <img id="modal-update-image" class="img-fluid"
                            src="{{ asset('/') }}dist/img/products/no-image.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('script')
    @include('js.datatable')
    @include('script.datatable')
    @include('script.preview')
@endsection
