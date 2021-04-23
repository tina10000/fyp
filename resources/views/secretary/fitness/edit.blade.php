@extends('admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Update Fitness Class</h2>

            </div>

            <div class="panel-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <div class="w-4/5 m-auto pt-20">
                                <form  method="post" enctype="multipart/form-data" class="form-horizontal form-label-centre">
                                    @csrf
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Title
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="title" class="form-control col-md-7 col-xs-12"
                                                   name="title" type="text" value="{{ $class->title }}"
                                                   placeholder="yoga, zumba classes...">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Venue
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="venue" class="form-control col-md-7 col-xs-12"
                                                   name="venue" type="text"  value="{{ $class->venue }}"
                                                   placeholder="UTM room..">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Date
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="amount" class="form-control col-md-7 col-xs-12"  value="{{ $class->date }}"
                                                   name="date" type="date">
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Time
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="amount" class="form-control col-md-7 col-xs-12" value="{{ $class->time }}"
                                                   name="time" type="time">
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Price
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="price" class="form-control col-md-7 col-xs-12" value="{{ $class->price }}"
                                                   name="price" type="number">
                                        </div>
                                    </div>


                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <a href="{{ url('dashboard') }}" class="btn btn-primary">Cancel</a>
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
        <!-- /page content -->
@endsection
