@extends('admin.app')
@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <h1>Welcome - Admin</h1>
        <div class="row">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <h2>Staff Directory <small>List</small></h2>
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th class="th-sm">#
                                </th>
                                <th class="th-sm">First Name
                                </th>
                                <th class="th-sm">Last Name
                                </th>
                                <th class="th-sm">Name
                                </th>
                                <th class="th-sm">Email
                                </th>
                                <th class="th-sm">Status
                                </th>
                                <th class="th-sm">Title
                                </th>
                                <th class="th-sm">Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as  $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>
                                    <a href="{{ url('employee/'. $user->id ) }}" style="color: #8f54d2">{{ $user->first_name }}</a>
                                </td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->status }}</td>
                                <td>{{ $user->type->type }}</td>

                                <td>
                                    <a href="{{ url('employee/delete/'. $user->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- /page content -->


@endsection
