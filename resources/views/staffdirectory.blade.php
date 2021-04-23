@extends('admin.app')
@section('content')
    <div class="left_col" role="main">
        <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
    </div>

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                        <h2>Staff Directory <small>List</small></h2>


                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                        </p>
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr bgcolor="#a9a9a9">
                                <th class="th-sm" >#
                                </th>
                                <th class="th-sm">First Name
                                </th>
                                <th class="th-sm">Last Name
                                </th>
                                <th class="th-sm">Email
                                </th>
                                <th class="th-sm">Title
                                </th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as  $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>
                                    {{ $user->first_name }}
                                    </td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->type->type }}</td>

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
    </div>

    <!-- /page content -->
    <script>
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endsection
