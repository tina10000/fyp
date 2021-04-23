@extends('admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>

            <div class="container-lg">
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

                <div class="row">

                    <div class="col-xs-12 form-group">
                        <h2>Create Poll</h2>
                        <div class="w-4/5 m-auto pt-20">
                            <form  method="post" enctype="multipart/form-data" class="form-horizontal form-label-centre">
                                @csrf

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Poll Title
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="title" class="form-control col-md-7 col-xs-12"
                                               name="title" type="text"
                                               placeholder="">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Poll Description
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="desc" class="form-control col-md-7 col-xs-12"
                                               name="description" type="text"
                                               placeholder="UTM room..">
                                    </div>
                                </div>




                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="poll">Poll Options
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="input_fields_wrap">
                                        <button class="add_field_button btn-sm btn-warning">Add More Fields</button>
                                        <div class="wrap-input2 ">
                                            <input class='input2' type="text" name="options[]" id="option" placeholder="poll option">
                                        </div>

                                    </div>
                                </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="{{ url('dashboard') }}" class="btn btn-primary">Cancel</a>
                                        <button type="submit" class="btn btn-success">Add Poll</button>
                                    </div>
                                </div>


                            <div class="container-contact2-form-btn">
                                <div class="wrap-contact2-form-btn">
                                    <div class="contact2-form-bg btn"></div>



                        </div>
                    </div>
                            </form>
                </div>
            </div>
    </div>
                </div>
            </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/creation-main.js"></script>

    <script>
        $(document).ready(function() {
            var max_fields      = 6; //maximum input boxes allowed
            var wrapper   	= $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="wrap-input2">\n\
                                                <input type="text" name="options[]" placeholder="poll option" id="option"\
                                                    ><a href="#" class="remove_field"><i class="fa fa-trash" aria-hidden="true"></i></a>\
                                               </div>'); //add input box
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });
    </script>

    <!-- /page content -->
@endsection
