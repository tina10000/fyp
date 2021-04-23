@extends('admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                    <h2>Add Expenses</h2>
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

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <div class="w-4/5 m-auto pt-20">
                                <form  method="post" enctype="multipart/form-data" class="form-horizontal form-label-centre">
                                    @csrf
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Event
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="title" class="form-control col-md-7 col-xs-12"
                                                   name="title" type="text" value="{{$event->event_title}}"
                                                   placeholder="" readonly>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="poll">Add Expenses
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="input_fields_wrap">
                                                <button class="add_field_button btn-sm btn-warning">Add More Fields</button>
                                                <div class="wrap-input2 ">
                                                    <input class='input2' type="text" name="expenses[]" id="option" placeholder="expenses">
                                                    <input class='input2' type="text" name="prices[]" id="option" placeholder="prices">
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <a href="{{ url('dashboard') }}" class="btn btn-primary">Cancel</a>
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /page content -->




@endsection
@push('script')

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
                                                <input type="text" name="expenses[]" placeholder="expenses" id="option"\
                                                    ><input class=\'input2\' type="text" name="prices[]" id="option" placeholder="prices">\
                                                    <a href="#" class="remove_field"><i class="fa fa-trash" aria-hidden="true"></i></a>\
                                               </div>'); //add input box
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });
    </script>
@endpush
