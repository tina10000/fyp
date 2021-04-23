@extends('admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <h1>Welcome - Admin</h1>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Pending Staff <small>List</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <p class="text-muted font-13 m-b-30">

                        </p>


                        <table id="dtBasicExample" class="table" width="100%">
                            <thead>
                            <tr>
                                <th class="th-sm">#
                                </th>
                                <th class="th-sm">First Name
                                </th>
                                <th class="th-sm">Last Name
                                </th>
                                <th class="th-sm">User Name
                                </th>
                                <th class="th-sm">Email
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
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->type->type }}</td>

                                    <td>
                                        <a href="accept.php?id={{ $user->id }}" class="btn btn-primary my-2">Accept</a>
                                        <a href="reject.php?id={{ $user->id }}" class="btn btn-warning">Reject</a>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                        <script>
                            $(document).ready(function () {
                                $('#dtBasicExample').DataTable();
                                $('.dataTables_length').addClass('bs-select');
                            });
                        </script>


                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /page content -->
@endsection
