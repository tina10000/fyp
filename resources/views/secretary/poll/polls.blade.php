@extends('admin.app')

@section('content')
    <!-- page content -->
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
                    <h2>Poll</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">



                        @foreach($polls as $poll)
                            <form method="post">
                            @csrf

                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    {{ $poll->title }}
                                </h3>
                                <p>
                                    {{ $poll->description }}
                                </p>
                            </div>
                            <div class="panel-body two-col">
                                @foreach($poll->options as $option)
                                <div class="col-md-6">
                                    <div class="well well-sm">
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" value="{{ $option->id }}" name="{{$poll->id}}" {{ $option->id == $poll->poll_option_id ? "checked":'' }}>
                                                {{$option->name}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="panel-footer">
                                @if(!isset($answers[$poll->id]))
                                <button type="submit" class="btn btn-success btn-sm">
                                    <span class="glyphicon glyphicon-ok"></span>Vote</button>
                                @endif

                            </div>
                        </div>
                            </form>
                        @endforeach





                </div>
            </div>
        </div>
    </div>




    <!-- /page content -->

@endsection
