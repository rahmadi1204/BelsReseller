@extends('layouts.app')
@section('head')
    @include('css.form-control')
    @include('css.datatable')
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-header">
                <div class="card-title">
                    <a href="/products" class="btn btn-outline-secondary btn-sm">Kembali</a>
                </div>
                <div class="card-tools">
                    <a class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-default">+
                        Tambah Warna</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none">{{ $products->product_name }}</h3>
                        <div class="col-12">
                            <img src="{{ asset('/') }}dist/img/products/{{ $products->product_image ?? 'no-image.jpg' }}"
                                class="product-image mt-3" alt="Product Image" style="border-radius: 1rem">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{ $products->product_name }} </h3>
                        <table id="example2" class="table">
                            <thead>
                                <th>Gambar</th>
                                <th>Warna</th>
                                <th>Jumlah</th>
                                <th>Opsi</th>
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
                                        <td>{{ $item->stok ?? '' }}
                                        </td>
                                        <td>
                                            <div class="btn btn-outline-info btn-sm mr-1" id="update-item"
                                                data-update-id="{{ $item->product_id }}"
                                                data-update-code="{{ $item->color_code }}"
                                                data-update-name="{{ $item->color }}"
                                                data-update-stok="{{ $item->stok }}"
                                                data-update-image="{{ $item->color_image }}" data-toggle="tooltip"
                                                data-placement="bottom" title="Edit"><i class="fa fa-edit"></i>
                                            </div>
                                            <div class="btn btn-outline-danger btn-sm mr-1" id="delete-item"
                                                data-delete-id="{{ $item->color_code }}"
                                                data-delete-name="{{ $item->color }}" data-toggle="tooltip"
                                                data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer bg-white">

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Create Modal --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Warna</h4>

                </div>
                <div class="modal-body">
                    <form action="{{ route('color.create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-borderless">
                            <thead>
                                <th colspan="2" class="text-center">Gambar</th>

                                <th>Warna</th>
                                <th>Jumlah</th>
                            </thead>
                            <tbody>
                                <tr class="rowColor">
                                    <td>
                                        <img id="viewImage" height="100px"
                                            src="{{ asset('/') }}dist/img/products/no-image.jpg" alt="">
                                    </td>
                                    <td>
                                        <input id="uploadImage" name="color_image" type="file" class="form-control">
                                    </td>
                                    <td>
                                        <input type="hidden" name="product_id" value="{{ $products->id_product ?? '' }}">
                                        <input type="hidden" name="product_code"
                                            value="{{ $products->product_code ?? '' }}">
                                        <input type="text" name="color" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="stok" class="form-control">
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-info" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-outline-danger">Yes</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
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
                    <form action="{{ route('color.delete') }}" method="post">
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
    {{-- Update Modal --}}
    <div class="modal fade" id="update-modal" aria-labelledby="update-modal-label" aria-hidden="true">

        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Warna</h4>
                    <div class="tools">

                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('color.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-borderless">
                            <thead>
                                <th colspan="2" class="text-center">Gambar</th>

                                <th>Warna</th>
                                <th>Jumlah</th>
                            </thead>
                            <tbody>
                                <tr class="rowColor">
                                    <td>
                                        <img id="modal-update-image" height="100px"
                                            src="{{ asset('/') }}dist/img/products/no-image.jpg" alt="">
                                    </td>
                                    <td>
                                        <input id="uploadImage" name="color_image" type="file" class="form-control">
                                    </td>
                                    <td>
                                        <input type="hidden" name="product_code" value="{{ $products->product_code }}">
                                        <input id="modal-update-id" type="hidden" name="product_id">
                                        <input id="modal-update-code" type="hidden" name="color_code">
                                        <input id="modal-update-name" type="text" name="color" class="form-control">
                                    </td>
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
@endsection
@section('script')
    @include('js.form-control')
    @include('js.datatable')
    @include('script.datatable')
    @include('script.form-control')
    @include('script.image-upload')
    @include('script.delete-modal')
    @include('script.update-modal')
@endsection
