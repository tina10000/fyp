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

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th class="th-sm">Number of tickets
                            </th>
                            <th class="th-sm">Staff Name
                            </th>
                            <th class="th-sm">Event
                            </th>
                            <th class="th-sm">Total price
                            </th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($ticket->bookings as  $booking)
                            <tr>
                                <th scope="row">{{  $booking->id}}</th>
                                <th scope="row">{{  $booking->no_tickets}}</th>
                                <td>
                                    {{  $booking->user->name }}
                                </td>
                                <td>
                                    {{  $ticket->price }}
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


