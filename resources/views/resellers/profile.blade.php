@extends('layouts.app')

@section('head')
    @include('css.form-control')
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('/') }}dist/img/resellers/{{ $profile->image ?? 'unnamed.png' }}"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $profile->name }}</h3>

                            <p class="text-muted text-center">{{ $profile->role }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b><i class="fab fa-instagram text-danger"></i> Instagram</b> <a
                                        class="float-right text-red">{{ $profile->instagram }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b><i class="fab fa-whatsapp text-success"></i> Whatsapp</b> <a
                                        class="float-right text-teal">{{ $profile->phone }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b><i class="fa fa-shopping-cart text-cyan"></i> Total Penjualan</b> <a
                                        class="float-right text-cyan">200</a>
                                </li>
                            </ul>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity"
                                        data-toggle="tab">Activity</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg"
                                                alt="user image">
                                            <span class="username">
                                                <a href="#">Jonathan Burke Jr.</a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                            </span>
                                            <span class="description">Shared publicly - 7:30 PM today</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>

                                        <p>
                                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i>
                                                Share</a>
                                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i>
                                                Like</a>
                                            <span class="float-right">
                                                <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments (5)
                                                </a>
                                            </span>
                                        </p>

                                        <input class="form-control form-control-sm" type="text"
                                            placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post clearfix">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg"
                                                alt="User Image">
                                            <span class="username">
                                                <a href="#">Sarah Ross</a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                            </span>
                                            <span class="description">Sent you a message - 3 days ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>

                                        <form class="form-horizontal">
                                            <div class="input-group input-group-sm mb-0">
                                                <input class="form-control form-control-sm" placeholder="Response">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-danger">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg"
                                                alt="User Image">
                                            <span class="username">
                                                <a href="#">Adam Jones</a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                            </span>
                                            <span class="description">Posted 5 photos - 5 days ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid mb-3" src="../../dist/img/photo2.png"
                                                            alt="Photo">
                                                        <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg"
                                                            alt="Photo">
                                                        <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <p>
                                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i>
                                                Share</a>
                                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i>
                                                Like</a>
                                            <span class="float-right">
                                                <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments (5)
                                                </a>
                                            </span>
                                        </p>

                                        <input class="form-control form-control-sm" type="text"
                                            placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->
                                </div>


                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal" action="{{ route('profile.update') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input name="id" type="hidden" class="form-control" id="inputId"
                                                    value="{{ $username->id }}">
                                                <input name="username" type="text" class="form-control" id="inputUsername"
                                                    value="{{ $username->username }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input name="name" type="text" class="form-control" id="inputName"
                                                    value="{{ $profile->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputInstagram" class="col-sm-2 col-form-label">Instagram</label>
                                            <div class="col-sm-10">
                                                <input name="instagram" type="text" class="form-control" id="inputInstagram"
                                                    value="{{ $profile->instagram }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input name="email" type="email" class="form-control" id="inputEmail"
                                                    value="{{ $profile->email }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputGender" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <select name="gender" id="inputGender" class="form-control">
                                                    <option value="L">Laki - Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputBirthday" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-10">
                                                <input name="birthday" type="text" class="form-control" id="inputBirthday"
                                                    value="{{ $profile->birthday }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputAddress" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea name="address" class="form-control" id="inputAddress"
                                                    value="{{ $profile->address }}">{{ $profile->address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPhone" class="col-sm-2 col-form-label">No Telepon</label>
                                            <div class="col-sm-10">
                                                <input name="phone" type="text" class="form-control" id="inputPhone"
                                                    value="{{ $profile->phone }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputAddress" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <input id="uploadImage" name="image" type="file" class="form-control">
                                            </div>
                                        </div>

                                        {{-- <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> I agree to the <a href="#">terms and
                                                            conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
@section('script')
    @include('script.form-control')
    @include('script.image-upload')
    @include('script.image-upload')
@endsection


<!-- /.content -->
