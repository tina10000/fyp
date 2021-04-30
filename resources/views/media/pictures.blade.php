@extends('admin.app')
@section('content')
@section('css')

@stop
    <div class="left_col" role="main">
        <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
    </div>

    <!-- page content -->
    <div class="right_col" role="main">
        <h1></h1>
        <div class="row">

            <div class="container-fluid">
                <br />
                <h3 align="center">Media Repository</h3>
                <br />

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Select Image</h3>
                    </div>
                    <div class="panel-body">
                        <form id="dropzoneForm" class="dropzone" action="{{ url('/pictures/store') }}">
                            @csrf
                        </form>
                        <div align="center">
                            <button type="button" class="btn btn-info" id="submit-all">Upload</button>
                        </div>
                    </div>
                </div>
                <br />
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Uploaded Image</h3>
                    </div>
                    <div class="panel-body" id="uploaded_image">

                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- /page content -->
@endsection


@push('script')
    <script>

    Dropzone.options.dropzoneForm = {
        autoProcessQueue : false,
        acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg",

        init:function(){
            var submitButton = document.querySelector("#submit-all");
            myDropzone = this;

            submitButton.addEventListener('click', function(){
                myDropzone.processQueue();
            });

            this.on("complete", function(){
                if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
                {
                    var _this = this;
                    _this.removeAllFiles();
                }
                load_images();
            });

        }

    };

    load_images();

    function load_images()
    {
        $.ajax({
            url:"{{ url('/pictures/store') }}",
            success:function(data)
            {
                $('#uploaded_image').html(data);
            }
        })
    }

    $(document).on('click', '.remove_image', function(){
        var name = $(this).attr('id');
        $.ajax({
            data:{name : name},
            url:"{{ url('/pictures/destroy') }}",
            success:function(data){
                load_images();
            }
        })
    });

</script>

@endpush
