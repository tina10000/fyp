@extends('admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <h1>Edit Events</h1>

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

                            <span class="section">{{  $data->event_title}}</span>
                            <!-- Title-->
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Event Title
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="firstName" class="form-control col-md-7 col-xs-12" value="{{ $data->event_title}}" name="event_title" type="text">

                                </div>
                            </div>
                            @error('event_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        <!-- event_details -->
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event_details">Event Details
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="event_details" class="form-control col-md-7 col-xs-12" value="{{  $data->event_details}}"  name="event_details"  type="text">
                                </div>
                            </div>
                            @error('event_details')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        <!-- start -->
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="start">Start Date
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="event_details" class="form-control col-md-7 col-xs-12" value="{{  $data->start}}"  name="start"  type="date">
                                </div>
                            </div>
                            @error('start')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                        <!-- Email -->


                            <div class="item form-group">
                                <label for="email" class="control-label col-md-3">End Date</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="end" type="date" name="end" value="{{  $data->end}}"class="form-control col-md-7 col-xs-12" >
                                </div>
                            </div>

                            @error('end')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                                <a href="{{ url('events') }}" class="btn btn-primary">Cancel</a>
                                <button id="send" type="submit" class="btn btn-success">Update</button>
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
