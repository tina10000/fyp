@extends('admin.app')
@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
        <div class="row">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">
                    <h2>View Class Enrollments <small>List</small></h2>

                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th class="th-sm">#
                            </th>
                            <th class="th-sm">Class ID
                            </th>
                            <th class="th-sm">User Name
                            </th>
                            <th class="th-sm">Time
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($class as $classes)
                            <tr>
                                <th scope="row">{{  $classes->id}}</th>

                                <td>{{  $classes->class_id }}</td>
                                <td>{{  $classes->user->name }}</td>
                                <td>{{  $classes->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    <div>
                        <a href="{{ url('class/' ) }}" class="btn btn-success btn-sm float-left" >Join Class</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /page content -->


@endsection
