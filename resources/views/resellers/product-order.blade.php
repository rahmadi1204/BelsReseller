@extends('layouts.app')

@section('head')
    @include('css.form-control')
    @include('css.datatable')
@endsection
@section('content')
    <section class="content">

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-header">
                    <div class="card-title">
                        <a href="/shopping" class="btn btn-outline-secondary btn-sm card-tools">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h3 class="d-inline-block d-sm-none">{{ $product->product_name }}</h3>
                            <div class="col-12">
                                <img src="{{ asset('/') }}dist/img/products/{{ $product->product_image ?? 'no-image.jpg' }}"
                                    class="product-image mt-3" alt="Product Image" style="border-radius: 1rem">
                            </div>
                            <div class="col mt-4 ">
                                <div class="float-sm-left text-lg bg-info p-3" style="border-radius: 0.75rem">
                                    {{-- Rating
                                    <i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star text-yellow"></i>
                                    5.0 / 5 --}}
                                    Sudah Terjual Lebih Dari 2000 pcs
                                </div>
                                <div class="float-sm-right text-lg bg-teal p-3" style="border-radius: 0.75rem">
                                    Rp. {{ $product->product_price }}
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-6">
                            <h3 class="my-3">{{ $product->product_name }} </h3>

                            <p>Spesifikasi singkat produk
                            </p>
                            <table id="example2" class="table">
                                <thead>
                                    <th>Gambar</th>
                                    <th>Warna</th>
                                    <th>Ready</th>
                                    <th>Masukkan Keranjang</th>
                                </thead>
                                <tbody>
                                    @foreach ($color as $item)
                                        <tr class="rowColor">
                                            <td><img height="75px"
                                                    src="{{ asset('/') }}dist/img/products/{{ $item->color_image ?? 'no-image.jpg' }}"
                                                    alt=""></td>
                                            <td>
                                                {{ $item->color ?? '' }}
                                            </td>
                                            <td>
                                                @if ($item->stok >= 50)
                                                    > 50 pcs
                                            @elseif ($item->stok < 50) {{ $item->stok }} Pcs @else Stok Habis
                                                    @endif
                                        </td>
                                        <td>
                                            <div class="btn btn-outline-info btn-sm mr-1" id="update-item"
                                                data-update-id="{{ $item->product_id }}"
                                                data-update-code="{{ $item->color_code }}"
                                                data-update-name="{{ $item->color }}"
                                                data-update-stok="{{ $item->stok }}"
                                                data-update-image="{{ $item->color_image }}" data-toggle="tooltip"
                                                data-placement="bottom" title="Masukkan Keranjang"><i
                                                    class="fa fa-plus"></i>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="float-right mt-2">
                            <a href="/baskets" class="btn btn-outline-info">Order</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                    href="#product-desc" role="tab" aria-controls="product-desc"
                                    aria-selected="true">Description</a>
                                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab"
                                    href="#product-rating" role="tab" aria-controls="product-rating"
                                    aria-selected="false">Rating</a>
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                                aria-labelledby="product-desc-tab"> Deskripsi Produk </div>

                            <div class="tab-pane fade" id="product-rating" role="tabpanel"
                                aria-labelledby="product-rating-tab">
                                <i class="fa fa-star text-yellow"></i>
                            </div>
                        </div>
                    </div> --}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="modal fade" id="update-modal" aria-labelledby="update-modal-label" aria-hidden="true">

            <div class="modal-dialog modal-" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="{{ route('basket.create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input name="product_color" type="number" class="form-control mb-2"
                                placeholder="Masukkan Jumlah">
                            <input id="modal-update-code" name="product_code" type="hidden">
                            <input id="modal-update-reseller" name="reseller_name" type="hidden"
                                value="{{ Auth::user()->name }}">
                            <button type="button" class="btn btn-outline-info" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-outline-danger">Order</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    @include('js.form-control')
    @include('js.datatable')
    @include('script.datatable')
    @include('script.form-control')
    @include('script.delete-modal')
    @include('script.update-modal')
@endsection
