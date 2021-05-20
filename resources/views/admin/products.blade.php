@extends('layouts.app')
@section('head')
    @include('css.datatable')
@endsection
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Product</h3>

                <div class="card-tools">
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fas fa-times"></i></button> --}}
                    {{-- <a class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-default">+ Tambah
                        Kategori</a> --}}
                    <a href="/products/create" class="btn btn-outline-success btn-sm">+ Tambah Produk</a>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <th>No</th>
                        <th>Gambar</th>
                        {{-- <th>Kategori</th> --}}
                        <th>Nama Barang</th>
                        <th>Harga</th>

                        <th>Opsi</th>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($products as $product)
                            <tr class="data-row">
                                <td style="width: 25px">{{ $i++ }}</td>
                                <td><img height="75px"
                                        src="{{ asset('/') }}dist/img/products/{{ $product->product_image ?? 'no-image.jpg' }}"
                                        alt=""></td>
                                {{-- <td>{{ $product->product_category }}</td> --}}
                                <td>{{ $product->product_name }}</td>
                                <td>Rp. {{ number_format($product->product_price, 0, ',', '.') }}</td>
                                <td>
                                    <div class="row ml-1">
                                        <a href="/products/color/{{ $product->id_product }}"
                                            class="btn btn-outline-info btn-sm mr-1" id="edit-item" data-toggle="tooltip"
                                            data-placement="bottom" title="Detail Warna Produk"><i
                                                class="fa fa-search"></i></a>
                                        <a href="/products/edit/{{ $product->id_product }}"
                                            class="btn btn-outline-success btn-sm mr-1" id="edit-item" data-toggle="tooltip"
                                            data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                                        <div class="btn btn-outline-danger btn-sm mr-1" id="delete-item"
                                            data-delete-id="{{ $product->id_product }}"
                                            data-delete-name="{{ $product->product_name }}" data-toggle="tooltip"
                                            data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        {{-- Kategori Modal --}}
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Kategori</h4>

                    </div>
                    <div class="modal-body">
                        <form action="{{ route('category.create') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input name="category_code" type="text" class="form-control mb-1"
                                    placeholder="Kode Kategori">
                                <input name="category" type="text" class="form-control" placeholder="Nama Kategori">
                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        {{-- Delete User Modal --}}
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
                        <form action="{{ route('product.delete') }}" method="post">
                            @csrf
                            <h5 class="modal-title" id="deleteUser">Yakin Hapus Data <b id="modal-delete-name"></b> <i
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
    @include('script.delete-modal')
@endsection
