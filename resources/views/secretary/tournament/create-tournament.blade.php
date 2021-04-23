@extends('admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Tournament Registration Form</h2>

            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <div class="w-4/5 m-auto pt-20">
                            <form  method="post" enctype="multipart/form-data" class="form-horizontal form-label-centre">
                                @csrf
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Team Name
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="title" class="form-control col-md-7 col-xs-12"
                                               name="Tname" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Captain's Name
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="Cname" class="form-control col-md-7 col-xs-12"
                                               name="Cname" type="text"
                                               placeholder="">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <h6>Please provide each team member's information below:<h6>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Player #1*
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="amount" class="form-control col-md-7 col-xs-12"
                                               name="p1name" type="text" placeholder="">
                                    </div>
                                </div>


                                <div class="item form-group">

                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Player #2*
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="amount" class="form-control col-md-7 col-xs-12"
                                                       name="p2name" type="text" placeholder="">
                                            </div>
                                </div>


                                <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Contact Info
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="amount" class="form-control col-md-7 col-xs-12"
                                               name="phone" type="number">
                                    </div>
                                </div>


                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="{{ url('dashboard') }}" class="btn btn-primary">Cancel</a>
                                        <button type="submit" class="btn btn-success">Enroll In</button>
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
