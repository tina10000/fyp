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
                    <h2>Poll</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    <table id="datatable-buttons" class="table table-striped table-bordered">

                        <thead>
                        <tr>
                            <th class="th-sm">#
                            </th>

                            <th class="th-sm">Poll Description
                            </th>
                            <th class="th-sm">Title</th>
                            <th class="th-sm">Options</th>
                            <th class="th-sm">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($polls as  $poll)
                            <tr>
                                <th scope="row">{{ $poll->id }}</th>
                                <td>{{ $poll->description }} </td>
                                <td>{{ $poll->title }}</td>
                                <td>
                                    <ul>
                                        @foreach($poll->options as $option)
                                        <li>{{$option->name}}</li>
                                        @endforeach
                                    </ul>
                                </td>

                                <td>
                                    <a href="{{ url('poll/'.  $poll->id.'/delete') }}" class="btn btn-danger">Delete</a>
                                </td>
                                @endforeach
                            </tr>

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
