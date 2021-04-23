@extends('admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <h1>Edit Meeting</h1>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

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
                            <!-- FName-->
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstName">Subject<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="firstName" class="form-control col-md-7 col-xs-12" value="{{ $meeting->subject }}" name="subject"type="text">

                                </div>
                            </div>
                            @error('subject')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">description</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="description" class="form-control col-md-7 col-xs-12" value="{{ $meeting->description }}"  name="description"type="text">
                                </div>
                            </div>

                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror



                            <div class="item form-group">
                                <label for="email" class="control-label col-md-3">date</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="date" type="date" name="date" value="{{ $meeting->date }}" class="form-control col-md-7 col-xs-12" >
                                </div>
                            </div>

                            @error('date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">time <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="time" class="form-control col-md-7 col-xs-12"  value="{{ \Carbon\Carbon::parse($meeting->time)->format('H:i') }}" name="time" type="time">
                                </div>
                            </div>

                            @error('time')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                            <!-- Start&End -->
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="start">Start time <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="time" class="form-control col-md-7 col-xs-12"  value="{{ $meeting->start_time }}" name="start_time" type="time">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="end">End time <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="time" class="form-control col-md-7 col-xs-12"  value="{{ $meeting->end_time }}" name="end_time" type="time">
                                    </div>
                                </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">

                                    <a href="{{ url('viewMeeting') }}" class="btn btn-primary">Cancel</a>
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
