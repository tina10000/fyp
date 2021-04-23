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
                    <h2>Classes</h2>
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th class="th-sm">Title
                            </th>
                            <th class="th-sm">Venue
                            </th>
                            <th class="th-sm">Date
                            </th>
                            <th class="th-sm">Time
                            </th>
                            <th class="th-sm">Price
                            </th>
                            <th class="th-sm">Action
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($class as  $class)
                            <tr>
                                <th scope="row">{{  $class->title}}</th>
                                <td>
                                    {{ $class->venue }}
                                </td>
                                <td>{{ $class->date }}</td>
                                <td>{{ $class->time }}</td>
                                <td>{{ $class->price }}</td>

                                <td>


                                    <a href="{{ url('class/'.  $class->id.'/join' ) }}" class="btn btn-primary">Join Class</a>
                                    <a href="{{ url('class/'.  $class->id.'/view' ) }}" class="btn btn-info">View Classes</a>

                                    @if(Auth::user()->user_type == 3)

                                        <a href="{{ url('class/'.  $class->id ) }}" class="btn btn-success">Edit</a>
                                        <a href="{{ url('class/'.  $class->id.'/delete') }}" class="btn btn-danger">Delete</a>
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


