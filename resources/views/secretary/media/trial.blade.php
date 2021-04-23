@extends('admin.app')

@section('content')
    <!-- page content -->

    <div class="right_col" role="main">
        <div>
            <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
            <div class="right_col" role="main">

                <div class="col-lg-8">
                    <div class="container-fluid">
                        <form action="" id="manage_post">
                            <div class="d-flex w-100 align-items-center">
                                <div class="rounded-circle mr-1" style="width: 40px;height: 40px;top:-5px;left: -40px">
                                    <img src="{{ asset('uploads/'.Auth::user()->user_profile) }}" class="image-fluid image-thumbnail rounded-circle" alt="" style="max-width: calc(100%);height: calc(100%);">
                                </div>
                                <div class="ml-4 text-left" style="width:calc(80%)">
                                    <div><small>{{Auth::user()->first_name." ".Auth::user()->last_name}}</small></div>

                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="content" id="content" cols="30" rows="2" class="form-control" placeholder="What's on your mind,{{Auth::user()->first_name." ".Auth::user()->last_name}}" style="resize:none;border: none"></textarea>
                            </div>
                            <div class="c-row" id="">
                                <div id="file-display" class="column">


                                    <div class="imgF">
                                        <span class="rem badge badge-primary" onclick="" style="cursor: pointer;"><i class="fa fa-times"></i></span>
                                        <input type="hidden" name="img[]" value="">
                                        <input type="hidden" name="imgName[]" value="">

                                        <img class="imgDropped" src="">

                                        <video src=""></video>

                                    </div>


                                </div>
                            </div>
                            <input type="file" name="file[]" multiple="multiple" onchange="" id="postF" onchange="displayUpload(this)" class="d-none" accept="image/*,video/*">
                            <div class="card solid">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small>Add to Your Post</small>
                                        <span>
						<label for="postF" style="cursor: pointer;"><a class="rounded-circle"><i class="fa fa-photo-video text-success"></i></a></label>
					</span>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer display py-1 px-1">
                        <div class="d-block w-100">
                            <button class="btn btn-block btn-primary btn-sm" form="manage_post">POST</button>
                        </div>
                    </div>
                    <div class="imgF" style="display: none " id="img-clone">
                        <span class="rem badge badge-primary" onclick="" style="cursor: pointer;"><i class="fa fa-times"></i></span>
                    </div>
            </div>
        </div>
    </div>
    </div>

    <!-- /page content -->
@endsection
            <script>
                if('<?php echo isset($_GET['upload']) ?>' == 1){
                    $('#postF').trigger('click')
                }
                if('<?php echo isset($_GET['id']) ?>' == 1){
                    $('[name="content"]').trigger('keyup')
                }
                $('[name="file[]"]').change(function(){
                    displayUpload(this)
                })

                function displayUpload(input){
                    if (input.files) {
                        Object.keys(input.files).map(function(k){
                            var reader = new FileReader();
                            var t = input.files[k].type;
                            var _types = ['video/mp4','image/x-png','image/png','image/gif','image/jpeg','image/jpg'];
                            if(_types.indexOf(t) == -1)
                                return false;
                            reader.onload = function (e) {
                                // $('#cimg').attr('src', e.target.result);

                                var bin = e.target.result;
                                var fname = input.files[k].name;
                                var imgF = document.getElementById('img-clone');
                                imgF = imgF.cloneNode(true);
                                imgF.removeAttribute('id')
                                imgF.removeAttribute('style')
                                if(t == "video/mp4"){
                                    var img = document.createElement("video");
                                }else{
                                    var img = document.createElement("img");
                                }
                                var fileinput = document.createElement("input");
                                var fileinputName = document.createElement("input");
                                fileinput.setAttribute('type','hidden')
                                fileinputName.setAttribute('type','hidden')
                                fileinput.setAttribute('name','img[]')
                                fileinputName.setAttribute('name','imgName[]')
                                fileinput.value = bin
                                fileinputName.value = fname
                                img.classList.add("imgDropped")
                                img.src = bin;
                                imgF.appendChild(fileinput);
                                imgF.appendChild(fileinputName);
                                imgF.appendChild(img);
                                document.querySelector('#file-display').appendChild(imgF)
                            }
                            reader.readAsDataURL(input.files[k]);
                        })
                        rem_func()
                    }
                }

                function rem_func(_this){
                    _this.closest('.imgF').remove()
                    if($('#drop .imgF').length <= 0){
                        $('#drop').append('<span id="dname" class="text-center">Drop Files Here <br> or <br> <label for="chooseFile"><strong>Choose File</strong></label></span>')
                    }
                }

                $('#content').on('change keyup keydown paste cut', function () {
                    if(this.scrollHeight <= 250)
                        $(this).height(0).height(this.scrollHeight);
                })
                $('.type-item').click(function(){
                    $('[name="type")]'.val($(this).attr('date-type'))
                    $('#type-selected').html($(this).html())
                })
                $('#manage_post').submit(function(e){
                    e.preventDefault()
                    start_load()
                    $.ajax({
                        url:"ajax.php?action=save_post",
                        data: new FormData($(this)[0]),
                        cache: false,
                        contentType: false,
                        processData: false,
                        method: 'POST',
                        type: 'POST',
                        success:function(resp){
                            if(resp == 1){
                                location.reload()
                            }
                        }
                    })
                })
            </script>
