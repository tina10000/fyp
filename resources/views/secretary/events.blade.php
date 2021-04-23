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
                        <h2>Events</h2>

                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                        </p>
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th class="th-sm">#
                                </th>
                                <th class="th-sm">Event Title
                                </th>
                                <th class="th-sm">Event Description
                                </th>
                                <th class="th-sm">Start Date
                                </th>
                                <th class="th-sm">End Date
                                </th>
                                <th class="th-sm">Action
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as  $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>
                                        {{ $user->event_title }}
                                    </td>
                                    <td>{{ $user->event_details }}</td>
                                    <td>{{ $user->start }}</td>
                                    <td>{{ $user->end }}</td>
                                    <td>
                                        @if(Auth::user()->user_type == 4)
                                        <a href="{{ url('event/'.  $user->id.'/expense' ) }}" class="btn btn-primary">Add Expenses</a>
                                        <a href="{{ url('event/'.  $user->id.'/expenses' ) }}" class="btn btn-info">View Expenses</a>
                                        @endif

                                            @if(Auth::user()->user_type == 3)
                                    <a href="{{ url('event/'. $user->id ) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ url('event/delete/'. $user->id) }}" class="btn btn-danger">Delete</a>
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


