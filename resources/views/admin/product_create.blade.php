@extends('layouts.app')
@section('head')
    @include('css.form-control')
    @include('js.form-control')
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Produk</h3>
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
                                            <option value="{{ $category->category_name }}">
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


                            <div class="form-group mt-4">
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
                            <!-- /.form group -->

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
                                <label>Stok Produk</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-boxes"></i></span>
                                    </div>
                                    <input name="product_stok" type="text" class="form-control">
                                </div>
                                <!-- /.input group -->
                                @error('address')
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

                <div class="card card-teal">
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
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-success btn-block">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    @include('script.form-control')
    @include('script.image-upload')
@endsection
