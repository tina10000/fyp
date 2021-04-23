@extends('admin.app')
@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>

        <div class="panel panel-default">





        <div class="container-lg">



            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif



                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <div class="panel-heading">
                            <h1>{{$event->event_title}}</h1>
                        </div>

                        <thead>
                        <tr>
                            <th class="th-sm">ID
                            </th>
                            <th class="th-sm">Expenses
                            </th>
                            <th class="th-sm">Price
                            </th>
                            <th class="th-sm">Action
                            </th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php $total = 0; ?>

                        @foreach ($expenses as  $expense)
                            <tr>
                                <th scope="row">{{  $expense->id}}</th>
                                <th scope="row">{{  $expense->expense}}</th>
                                <th scope="row">{{  $expense->price }}</th>
                                <th>
                                    <a href="{{ url('/event/'.$event->id.'/expense/'.$expense->id.'/delete') }}" class="btn btn-danger">Delete</a>
                                </th>
                            </tr>
                                <?php $total += $expense->price; ?>
                        @endforeach

                        <tr>
                            <th scope="row"></th>
                            <th scope="row" bgcolor="#b0e0e6">Total Price</th>
                            <th scope="row"  bgcolor="#b0e0e6">{{ $total }}</th>

                            <th>

                            </th>


                        </tr>

                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                    <div>
                    </div>
                </div>
            </div>
        </div>

    <!-- /page content -->
@endsection


