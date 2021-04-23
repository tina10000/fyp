@extends('admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>

        <div class="container">
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
        <div id='calendartina'></div>
        </div>
    </div>
    @if(Auth::user()->user_type == 3)
    <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Event Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('event/store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Event Title</label>
                            <label>
                                <input type="text" class="form-control" name="event_title" placeholder="Event Title" id="event_title">
                            </label>
                        </div>
                        @error('event_title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <div class="form-group">
                            <label>Event Details</label>
                            <label>
                                <input type="text" class="form-control" name="event_details" placeholder="Event Details" id="event_details">
                            </label>
                        </div>
                        @error('event_details')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <div class="form-group">
                            <label>Start Date</label>
                            <label>
                                <input type="date" class="form-control" name="start" placeholder="Start Date" id="start">
                            </label>
                        </div>
                        @error('start')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <div class="form-group">
                            <label>End Date</label>
                            <label>
                                <input type="date" class="form-control" name="end" placeholder="End Date" id="end">
                            </label>
                        </div>
                        @error('end')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <div class="form-group">
                            <label>Background Color</label>
                            <label>
                                <input type="color" class="form-control" name="color"  >
                            </label>
                        </div>
                        @error('color')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="model" >Close</button>
    <button type="submit" class="btn btn-success">Save changes</button>
                    </div>

                </form>

                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    @endif


    <!-- /page content -->
@endsection
@push('script')

    <script>
        jQuery(document).ready(function ($) {
            var calendar = $('#calendartina').fullCalendar({
                aspectRatio: 2,
                eventColor: '#7b6980',
                height: 650,
                width: 750,
                editable: false,
                selectable: true,
                showNonCurrentDates: true,
                yearColumn: 3,
                defaultView: 'month',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'year,month,basicWeek,basicDay'
                },
                dayClick:function (date,event,view) {
                    $('#eventModal').modal('show');
                    var today = moment(date).format('YYYY-MM-DD');

                    $("#start").val(today)

                    $("#end").val(today)

                },

                events: function (start, end, timezone, callback) {
                    $.ajax({
                        type: "GET",
                        url: "{!! url('events-json') !!}",
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        success: function (doc) {
                            var events = [];
                            var obj = doc;
                            $(obj).each(function () {
                                events.push({
                                    title: $(this).attr('title'),
                                    start: $(this).attr('start'),
                                    color: $(this).attr('color')
                                });
                            });
                            if (callback) callback(doc);
                        }
                    });
                }

            })

        });
    </script>

    @endpush
