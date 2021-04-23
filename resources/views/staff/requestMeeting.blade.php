@extends('admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
        <div class="x_content">

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

{{--    Meeting form   --}}
            <form method="post"  class="form-horizontal form-label-left" >
                @csrf

            <span class="section">Schedule a meeting</span>

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="noticeSubject">Meeting Agenda <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="subject" class="form-control col-md-7 col-xs-12" data-validate-minmax="10,20"
                           name="subject" placeholder="Meeting Agenda"  type="text">
                </div>
            </div>



            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meetingDate">Meeting Date <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="date" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                           data-validate-words="2" name="date" placeholder="Notice Date"  type="date">
                </div>
            </div>

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meetingTime">Meeting Time <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="time" id="time" name="time"  placeholder="Notice Time"
                           class="form-control col-md-7 col-xs-12">
                </div>
            </div>


            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meetingDesc">Meeting Description<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea rows="5" id="description" name="description"  placeholder="Meeting Description" class="form-control col-md-7 col-xs-12"></textarea>
                </div>
            </div>


            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button type="cancel" class="btn btn-primary">Cancel</button>
                    <button   type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
        </div>
    </div>

    <!-- /page content -->

@endsection
