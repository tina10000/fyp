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
                            <span class="create-post">Create post</span>
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



                                                        <input type="file" name="image" multiple="multiple" onchange="" id="postF" onchange="displayUpload(this)" class="d-none" accept="image/*,video/*">
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
                                                <button class="post-btn" type="submit" data-ripple="">Post</button>
                                            </form>
                                        </div>






                                        {{-- for each--}}

                                        <div class="loadMore">
                                            @foreach ($feeds->reverse() as $item)
                                                <section class="my-3">
                                                    <div class="central-meta item">
                                                        <div class="user-post">
                                                            <div class="friend-info">
                                                                <figure>

                                                                    <figure>

                                                                        @if (Auth::user()->user_profile == '')
                                                                            <img src="{{asset('images/fb.jpg')}}" alt="">
                                                                        @else
                                                                            <img src="{{ asset('uploads/'.$item->user->user_profile) }}" alt="" width="40" height="40">
                                                                        @endif
                                                                    </figure>
                                                                </figure>
                                                                <div class="friend-name">
                                                                    <div class="more">
                                                                        @if (Auth::user()->id == $item->user_id)
                                                                            <div class="more-post-optns"><i class="fa fa-bars"></i>
                                                                                <ul>

                                                                                    <li><a href="{{ url('editpost/'.$item->id) }}"><i class="fa fa-pencil-square-o"></i>Edit Post</a></li>
                                                                                    <li><a href="{{ url('deletePost',$item->id) }}"><i class="fa fa-trash-o"></i>Delete Post</a></li>
                                                                                </ul>
                                                                            </div>

                                                                        @endif
                                                                    </div>

                                                                    {{-- Auth::user()->name --}}
                                                                    <ins><a href="" title="">{{ (\App\Models\User::where('id', $item->user_id)->first()->name )}}</a></ins>
                                                                    <span>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                                                </div>

                                                                <div class="post-meta">
                                                                    <div class="description">
                                                                        <p>{{ $item->post}}</p>
                                                                        <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
                                                                            <img class="card-img-top img-fluid" src="{{asset('storage' . $item->image_path)}}" alt="">
                                                                            <a>
                                                                                <div class="mask rgba-white-slight"></div>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="we-video-info">
                                                                    <ul>
                                                                        <li>
                                                                            <form action="" method="POST">
                                                                                @method('PUT')
                                                                                @csrf
                                                                                <input type="submit" style="background-color:#f0f0f0;border:none;font-size: 0; "><div class="likes heart" title="Like/Dislike">❤ <span>{{ $item->like }}</span> </div>
                                                                            </form>
                                                                        </li>

                                                                        <li>
                                                                    <span class="comment" title="Comments">
                                                                        <i class="fa fa-commenting"></i>
                                                                        <ins>2</ins>
                                                                    </span>
                                                                        </li>

                                                                        <li>

                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>


                                                            {{--           <<coments></coments>--}}

                                                        </div>
                                                    </div>




                                                    @endforeach
                                                </section>
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
