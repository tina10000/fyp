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
                                <h2 class="text-gray-300">
                                  Create Post
                                </h2>
                            </div>
                            </div>

                        @if ($errors->any())
                            <div class="w-5 m-auto">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li class="w-1/5 bg-red">
{{$error}}
                                        </li>
                                        @endforeach

                                </ul>
                            </div>
                        @endif




                        <div class="w-4/5 m-auto pt-20">
                            <form action="/blog" method="post" enctype="multipart/form-data" class="form-horizontal form-label-centre">
                                @csrf
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="subject" class="form-control col-md-7 col-xs-12"
                                               name="title" placeholder="title..."  type="text">
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea id="description" class="form-control col-md-7 col-xs-12"
                                              name="description" placeholder="description"  type="text">
                                        </textarea>
                                    </div>
                                </div>




                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Select file
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" id="image" name="image"
                                               class="col-md-6 col-sm-6 col-xs-12">
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
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
