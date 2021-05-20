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
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                                <th>Option</th>

                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                    $finalPrice = 0;
                                @endphp
                                @foreach ($baskets as $basket)
                                    <tr class="data-row">
                                        <td style="width: 25px">{{ $i++ }}</td>
                                        <td>
                                            <a data-toggle="modal" id="show-item" data-show-id="{{ $basket->id_basket }}"
                                                data-show-image="{{ $basket->color_image }}">
                                                <img height="75px"
                                                    src="{{ asset('/') }}dist/img/products/{{ $basket->color_image ?? 'no-image.jpg' }}"
                                                    alt="Photo 1" style="border-radius: 0.5rem">
                                            </a>
                                        </td>
                                        {{-- <td>{{ $basket->basket_category }}</td> --}}
                                        <td>{{ $basket->color }}</td>
                                        <td>{{ $basket->product_color }}</td>
                                        <td>Rp. {{ number_format($basket->product_price, 0, ',', '.') }}
                                        <td>
                                            @php
                                                $total = $basket->product_color * $basket->product_price;
                                            @endphp
                                            Rp. {{ number_format($total, 0, ',', '.') }}
                                        </td>
                                        <td class="text-center">
                                            <div class="btn btn-outline-info btn-sm mr-1" id="update-item"
                                                data-update-id="{{ $basket->product_code }}"
                                                data-update-code="{{ $basket->color_code }}"
                                                data-update-name="{{ $basket->color }}"
                                                data-update-stok="{{ $basket->product_color }}"
                                                data-update-image="{{ $basket->color_image }}" data-toggle="tooltip"
                                                data-placement="bottom" title="Edit"><i class="fa fa-edit"></i>
                                            </div>
                                            <div class="btn btn-outline-danger btn-sm mr-1" id="delete-item"
                                                data-delete-id="{{ $basket->color_code }}"
                                                data-delete-name="{{ $basket->color }}" data-toggle="tooltip"
                                                data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i>
                                            </div>
                                        </td>
                                        @php
                                            $finalPrice += $total;
                                        @endphp
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="text-center">Jumlah</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Rp. {{ number_format($finalPrice, 0, ',', '.') }}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="btn btn-outline-info">Checkout</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-default" aria-labelledby="show-modal-label" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{-- <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> --}}
                    <div class="modal-body">
                        <img id="modal-show-image" class="img-fluid" src="{{ asset('/') }}dist/img/baskets/no-image.jpg"
                            alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="update-modal" aria-labelledby="update-modal-label" aria-hidden="true">

            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Jumlah</h4>
                        <div class="tools">

                        </div>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('basket.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-borderless">
                                <thead>
                                    {{-- <th colspan="2" class="text-center">Gambar</th> --}}

                                    {{-- <th>Warna</th> --}}
                                    <th>Jumlah</th>
                                </thead>
                                <tbody>
                                    <tr class="rowColor">
                                        <input id="modal-update-code" type="hidden" name="color_code">
                                        <td>
                                            <input id="modal-update-stok" type="text" name="stok" class="form-control">
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-danger">Yes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Delete Modal --}}
        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal-label"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="card-title">
                            <i class="fa fa-exclamation-triangle text-danger"></i>
                        </div>
                        <div class="tools">
                            <i class="fa fa-exclamation text-danger"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('basket.delete') }}" method="post">
                            @csrf
                            <h5 class="modal-title" id="deleteUser">Yakin Hapus Warna <b id="modal-delete-name"></b> <i
                                    class="fa fa-exclamation text-danger"></i>
                                <input id="modal-delete-id" name="id" type="hidden" class="form-control" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-danger">Yes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    @include('js.datatable')
    @include('script.datatable')
    @include('script.preview')
    @include('script.update-modal')
    @include('script.delete-modal')
@endsection
