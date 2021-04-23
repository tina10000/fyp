@extends('admin.app')

@section('content')
    <!-- page content -->
    <div class="left_col" role="main">
        <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
    </div>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="container-lg">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Meeting Schedules</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    <table id="datatable-buttons" class="table table-striped table-bordered">

                            <thead>
                            <tr>
                                <th class="th-sm">#
                                </th>
                                <th class="th-sm">Meeting Subject
                                </th>
                                <th class="th-sm">Description
                                </th>
                                <th class="th-sm">Meeting Date
                                </th>
                                <th class="th-sm">Meeting Time
                                </th>
                                <th class="th-sm">Staff Name
                                </th>
                                <th class="th-sm">Meeting Status
                                </th>
                                <th class="th-sm">Start/End - Minutes
                                </th>
                                @if(Auth::user()->user_type == 3)
                                <th class="th-sm">Action
                                </th>
                                @endif




                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($meeting as  $meeting)
                                <tr>
                                    <th scope="row">{{ $meeting->id }}</th>
                                    <td>{{ $meeting->subject }} </td>
                                    <td>{{ $meeting->description }}</td>
                                    <td>{{ $meeting->date }}</td>
                                    <td>{{ $meeting->time }}</td>
                                    <td>{{ $meeting->user->name}}</td>
                                    <td>{{ $meeting->meeting_status}}</td>
                                    <td>
                                        @if($meeting->end_time && $meeting->start_time)
                                        {{ $meeting->start_time }}/ {{ $meeting->end_time }} -
                                        {{ \Carbon\Carbon::parse( $meeting->end_time)->diffInMinutes(\Carbon\Carbon::parse( $meeting->start_time),true) }}</td>
                                        @endif
                                    @if(Auth::user()->user_type == 3)
                                    <td>
                                        <a href="{{ url('meeting/'. $meeting->id) }}" class="btn btn-danger">Edit</a>

                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
                </div>




                    <!-- /page content -->

@endsection
