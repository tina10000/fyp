@extends('admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <h3>Edit profile</h3>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <p class="text-muted font-13 m-b-30">
                        </p>

                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" >
                            @csrf

                            <span class="section">{{ $user->first_name ." " .$user->last_name }}</span>
                            <!-- FName-->
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstName">First Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="firstName" class="form-control col-md-7 col-xs-12" value="{{ $user->first_name}}" name="first_name" placeholder="Jon" type="text">

                                </div>
                            </div>
                            @error('first_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        <!-- LName -->
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastName">Last Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="lastName" class="form-control col-md-7 col-xs-12" value="{{ $user->last_name}}"  name="last_name" placeholder="Doe"  type="text">
                                </div>
                            </div>
                            @error('last_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                        <!-- Email -->


                            <div class="item form-group">
                                <label for="email" class="control-label col-md-3">Email</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="email" type="email" name="email" value="{{ $user->email}}" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" >
                                </div>
                            </div>

                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        <!-- Username -->
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="username" class="form-control col-md-7 col-xs-12" data-validate-length-range="" data-validate-words="" value="{{ $user->name}}" name="name" placeholder=" " type="text">
                                </div>
                            </div>

                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror



                        <!-- DOB -->
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Date of Birth <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="dob" class="form-control col-md-7 col-xs-12" value="{{ $user->dob}}" name="dob" placeholder=" " type="date">
                                </div>
                            </div>

                            @error('dob')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror





                        <!-- Password -->

                            <div class="item form-group">
                                <label for="password" class="control-label col-md-3">Password</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" >
                                </div>
                            </div>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="item form-group">
                                <label for="password" class="control-label col-md-3">Profile Picture</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="file" type="file" name="user_profile"  data-validate-length="6,8"  >
                                    <hr>
                                    <img src="{{ asset('uploads/'.$user->user_profile) }}" width="50%" height="30%">

                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                   <a href="{{ url('dashboard') }}"  class="btn btn-primary">Cancel</a>
                                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>

                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /page content -->

@endsection
