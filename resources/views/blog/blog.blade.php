@extends('admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div>
            <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>
            <div class="right_col" role="main">
                <div class="row">

                        {{-- message error--}}
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{session()->get('message') }}
                        </div>
                    @endif
                    <div class="col-lg-8">

                    <div class="central-meta postbox">
                        <span class="create-post">Create post</span>
                        <div class="new-postbox">
                    <div class="w-4/5 m-auto text-center">
                        <div class="py-15 border-b border-gray-200">
                            <h1 class="text-6xl">
                                Blog Posts
                            </h1>
                        </div>
                        {{--user check--}}
                        <div class="w-4/5 m-auto text-left">
                        @if(Auth::check())
                            <div class="pt-15 w-4/5 m-auto">
                                <a href="/blog/create"
                                   class="btn btn-danger btn-sm">Create Post</a>
                            </div>
                        @endif
                        </div>

                    @foreach($posts as $post)
                        <!-- Section: Blog v.3 -->
                            <section class="my-3">
                                    <!-- Grid row -->
                                    <div class="row">
                                        <!-- Grid column -->
                                        <div class="col-lg-3 col-xl-6">
                                            <!-- Featured image -->
                                            <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
                                                <img class="card-img-top img-fluid" src="{{asset('images/' . $post->image_path)}}" alt="Sample image">
                                                <a>
                                                    <div class="mask rgba-white-slight"></div>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Grid column -->
                                        <div class="col-lg-8 col-xl-10">
                                            <!-- Post title -->
                                            <h3 class="font-weight-bold mb-3"><strong> {{$post->title}}</strong></h3>
                                            <!-- Post description -->
                                            <h2 class="dark-grey-text ">{{$post->description}}</h2>
                                            <!-- Post user name -->
                                            <p>by <a class="font-weight-bold">{{$post->user->name}}</a>, Created on {{ date('jS M Y', strtotime($post->updated_at) ) }}</p>
                                            <!-- Read more button -->
                                            <a
                                                href="/blog/{{ $post->slug }}"
                                                class="btn btn-success btn-sm">Read more</a>
                                        </div>

                                        @if (isset(Auth::user()->id) && Auth::user()->id ==
                                              $post->user_id)
                                            <a href="/blog/{{ $post->slug }}/edit" class="badge badge-primary">Edit</a>
<br><br><br>
        <form
            action="/blog/{{$post->slug}}"
            method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-warning btn-sm">Delete</button>
        </form>

                                @endif
                                    </div>
                                <!-- Grid column -->
                            </section>
                            <!-- Section: Blog v.3 -->
                        @endforeach
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
