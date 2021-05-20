@extends('layouts.app')
@section('head')
    @include('css.form-control')
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Produk</h3>
                        <div class="card-tools">
                            <a href="/products" class="btn btn-outline-secondary btn-sm">Kembali</a>
                            <a class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modal-default">+
                                Tambah
                                Kategori</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Kategori Produk</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-clipboard-list"></i></span>
                                    </div>
                                    <select name="product_category" class="form-control">
                                        <option value="">~~ Pilih Kategori ~~</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->category_code }}">
                                                {{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.input group -->
                                @error('category')
                                    <div class="text-danger text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- /.form group -->


                            {{-- <div class="form-group mt-4">
                                <label>Kode Produk</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-barcode"></i></span>
                                    </div>
                                    <input name="product_code" type="text" class="form-control">
                                </div>
                                <!-- /.input group -->
                                @error('product_name')
                                    <div class="text-danger text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- /.form group --> --}}

                            <div class="form-group mt-4">
                                <label>Nama Produk</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-box"></i></span>
                                    </div>
                                    <input name="product_name" type="text" class="form-control">
                                </div>
                                <!-- /.input group -->
                                @error('product_name')
                                    <div class="text-danger text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- /.form group -->


                            <div class="form-group">
                                <label>Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input name="product_price" type="text" class="form-control" id="product_price">
                                </div>
                                <!-- /.input group -->
                                @error('product_price')
                                    <div class="text-danger text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- /.form group -->

                            <div class="form-group">
                                <label>JPG, JPEG, PNG, Maks 2Mb</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-camera"></i></span>
                                    </div>
                                    <input id="uploadImage" name="product_image" type="file" class="form-control">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <div class="col-md-6 d-flex">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Gambar</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group px-5 pt-1 pb-0">
                            <img id="viewImage" class="img-fluid" src="{{ asset('dist/img/no-image.jpg') }}" alt="">
                        </div>


                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>

                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>



        <div class="row">
            <div class="card mx-2 col">
                <div class="card-footer bg-white">
                    <button type="submit" class="btn btn-outline-success btn-block">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
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
    </section>

@endsection
@section('script')
    @include('js.form-control')
    @include('script.currency')
    @include('script.image-upload')
@endsection
