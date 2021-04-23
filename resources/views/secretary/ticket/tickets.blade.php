@extends('admin.app')
@section('content')

    <div class="left_col" role="main">
        <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
    </div>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="container-lg">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tickets</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th class="th-sm">Event Title
                            </th>
                            <th class="th-sm">Amount of ticket available
                            </th>
                            <th class="th-sm">Available From
                            </th>
                            <th class="th-sm">Available To
                            </th>
                            <th class="th-sm">Member Price
                            </th>
                            <th class="th-sm">Non Member Price(Adults)
                            </th>
                            <th class="th-sm">Non Member Price(Kids)
                            </th>
                            <th class="th-sm">Action
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($tickets as  $ticket)
                            <tr>
                                <th scope="row">{{  $ticket->event->event_title}}</th>
                                <td>{{  $ticket->amount }}</td>
                                <td>{{  $ticket->available_from }}</td>
                                <td>{{  $ticket->available_to }}</td>
                                <td>{{  $ticket->member_price }}</td>
                                <td>{{  $ticket->nonmember_adult }}</td>
                                <td>{{  $ticket->nonmember_kid }}</td>

                                <td>


                                    <a href="{{ url('ticket/'.  $ticket->id.'/book' ) }}" class="btn btn-primary">Book</a>
                                    <a href="{{ url('ticket/'.  $ticket->id.'/bookings' ) }}" class="btn btn-info">View Bookings</a>

                                    @if(Auth::user()->user_type == 3)

                                    <a href="{{ url('ticket/'.  $ticket->id ) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ url('ticket/'.  $ticket->id.'/delete') }}" class="btn btn-danger">Delete</a>
                                        @endif
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- /page content -->
@endsection
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('#dtBasicExample').DataTable();--}}
{{--            $('.dataTables_length').addClass('bs-select');--}}
{{--        });--}}
{{--    </script>--}}


