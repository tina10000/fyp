@extends('admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>


        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Book a Ticket for {{ $ticket->event->event_title ." - ".$ticket->type }}</h2>

            </div>
            <div class="panel-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
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

                <div class="row">
                    <div class="col-xs-12 form-group">
                        <div class="w-4/5 m-auto pt-20">
                            <form  method="post" enctype="multipart/form-data" class="form-horizontal form-label-centre">
                                @csrf





                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Number of tickets for Members
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="type"  class="form-control col-md-7 col-xs-12"
                                               name="no_tickets_members" type="number"
                                        >
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Number of tickets for Non Member(Adult)
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="type"  class="form-control col-md-7 col-xs-12"
                                               name="no_tickets_nonmembers" type="number"
                                        >
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Number of tickets for Non Member(Kid)
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="type"  class="form-control col-md-7 col-xs-12"
                                               name="no_tickets_kids" type="number"
                                        >
                                    </div>
                                </div>




                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="{{ url('tickets') }}" class="btn btn-primary">Cancel</a>
                                        <button type="submit" class="btn btn-success">Book</button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
    <!-- /page content -->
@endsection
