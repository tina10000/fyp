@extends('admin.app')

@section('content')
    <!-- page content -->

    <div class="right_col" role="main">
        <div>
            <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
            <div class="right_col" role="main">
                <div class="row">


                    <div class="col-lg-8">

                        <div class="central-meta postbox">
                            <span class="create-post">Update post</span>
                            <div class="new-postbox">
                                <div class="w-4/5 m-auto text-center">

                                    <div class="new-postbox">
                                        <figure>
                                            @if (Auth::user()->user_profile == '')
                                                <img src="{{ asset('images\fb.jpg') }}" alt="user_image" width="40" height="40">
                                            @else
                                                <img src="{{ asset('uploads/'.Auth::user()->user_profile) }}" alt="" width="40" height="40">
                                            @endif


                                        </figure>
                                        <div class="newpst-input">
                                            <form method="post" action="" enctype="multipart/form-data">
                                                @csrf

                                                <textarea id="post" rows="2" placeholder="Share some what you are thinking?" name="post"></textarea>
                                                <br><br><br><br>
                                                <div class="attachments">
                                                    <ul>

                                                        <li>
                                                            <label class="fileContainer">
                                                                <i class="fa fa-image"></i>
                                                                <input type="file" id="image" name="image" >
                                                            </label>
                                                        </li>


                                                    </ul>
                                                </div>
                                                <button class="post-btn" type="submit" data-ripple="">Post</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /page content -->
@endsection
