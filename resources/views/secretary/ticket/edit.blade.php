@extends('admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>


        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Update Ticket</h2>

            </div>
            <div class="panel-body">
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

                <div class="row">
                    <div class="col-xs-12 form-group">
                        <div class="w-4/5 m-auto pt-20">
                            <form  method="post" enctype="multipart/form-data" class="form-horizontal form-label-centre">
                                @csrf

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Event">Event
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="event" name="event_id"  class="form-control">
                                            <option value="">Select Event</option>
                                            @foreach($events as $event)
                                                <option value="{{ $event->id }}" {{$event->id == $ticket->event_id ? "selected":''}}>{{ $event->event_title }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Amount of ticket available
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="amount" class="form-control col-md-7 col-xs-12"
                                               name="amount" value="{{ $ticket->amount }}" type="number">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Available From
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="amount" class="form-control col-md-7 col-xs-12"
                                               name="available_from"
                                               value="{{ $ticket->available_from }}"
                                               type="date">
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Available To
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="amount" class="form-control col-md-7 col-xs-12"
                                               name="available_to"
                                               value="{{ $ticket->available_to}}"
                                               type="date">
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Member Price
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="price" class="form-control col-md-7 col-xs-12"
                                               value="{{ $ticket->member_price}}"
                                               name="member_price" type="number">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Non Member(Adult)
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="price" class="form-control col-md-7 col-xs-12"
                                               value="{{ $ticket->nonmember_adult}}"
                                               name="nonmember_adult" type="number">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Non Member(Kid)
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="price" class="form-control col-md-7 col-xs-12"
                                               value="{{ $ticket->nonmember_kid}}"
                                               name="nonmember_kid" type="number">
                                    </div>
                                </div>


                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="{{ url('tickets') }}" class="btn btn-primary">Cancel</a>
                                        <button type="submit" class="btn btn-success">Update</button>
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
