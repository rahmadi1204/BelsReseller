@extends('layouts.app')

@section('head')

@endsection
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Change Password</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('password.change') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="oldPassword" class="col-sm-2 col-form-label">Password Lama</label>
                        <div class="col-sm-10">
                            <input name="oldPassword" type="password" class="form-control" id="oldPassword">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="newPassword" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                            <input name="newPassword" type="password" class="form-control" id="newPassword">
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="showPassword">
                                <label class="form-check-label" for="showPassword">Show Password</label>
                            </div>
                        </div>
                    </div> --}}
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="/" class="btn btn-outline-secondary">Back</a>
                <button type="submit" class="btn btn-outline-success">Update</button>
                </form>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
@endsection
