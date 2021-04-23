@extends('admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Enroll for class{{ $class->title }}</h3>
            </div>
            <div class="panel-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
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

                <div class="row">
                    <div class="col-xs-12 form-group">
                        <div class="w-4/5 m-auto pt-20">
                            <form  method="post" enctype="multipart/form-data" class="form-horizontal form-label-centre">
                                @csrf



                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="{{ url('class') }}" class="btn btn-primary">Cancel</a>
                                        <button type="submit" class="btn btn-success">Enroll in</button>
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
