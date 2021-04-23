@extends('admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div>
            <h1>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h1>

            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="w-4/5 m-auto text-left">
                            <div class="py-15">

                            </div>
                        </div>

                        <div class="col-lg-7 col-xl-8">

                            <!-- Post title -->
                            <h3 class="font-weight-bold mb-3"><strong> {{$post->title}}</strong></h3>
                            <!-- Excerpt -->
                            <h2 class="dark-grey-text ">{{$post->description}}</h2>
                            <!-- Post data -->
                            <p>by <a class="font-weight-bold">{{$post->user->name}}</a>, Created on {{ date('jS M Y', strtotime($post->updated_at) ) }}</p>





                        </div>


                </div>

            </div>
        </div>
    </div>





    <!-- /page content -->
@endsection
