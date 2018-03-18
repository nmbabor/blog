@extends('frontend.app')
@section('content')
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="footer" class="top_slide">
                    <div class="footer-instagram-section">

                        <div id="footer-instagram" class="owl-carousel">
                        @foreach($pinPost as $pin)
                            <div class="item">
                                <div class="slide_content">
                                    <h5><a href='{{URL::to("post/$pin->id/$pin->link")}}'>
                                    {{$pin->title}}
                                     </a></h5>
                                    <div class="post_meta">
                                        <span><i class="fa fa-calendar"></i> {{date('jS M Y',strtotime($pin->created_at))}} </span> 
                                    </div>
                                </div>
                                <a href="index-grid.html">
                                @if($pin->feature_photo!=null)
                                    <img class="img-responsive top_post_img" src='{{asset("images/post/small/$pin->feature_photo")}}' alt="{{$pin->title}}">
                                @else
                                    <img class="img-responsive top_post_img" src='{{asset("images/post/default/default300x300.png")}}' alt="{{$pin->title}}">
                                @endif
                                </a>
                            </div>
                        @endforeach

                        </div>
                    </div>
                    </div>
                    <br>

                <article class="post">
                    <div class="post-thumb">
                        <a href='{{URL::to("post/$bigPost->id/$bigPost->link")}}'>
                         @if($bigPost->feature_photo!=null)
                            <img class="img-responsive" src='{{asset("images/post/big/$bigPost->feature_photo")}}' alt="">
                        @else
                            <img class="img-responsive" src='{{asset("images/default/photo.png")}}' alt="">
                        @endif
                        </a>

                        <div class="post_title"><a href='{{URL::to("post/$bigPost->id/$bigPost->link")}}'>{{$bigPost->title}} </a></div>
                        <a href='{{URL::to("post/$bigPost->id/$bigPost->link")}}' class="post-thumb-overlay text-center">
                            <div class="text-uppercase text-center">View Post</div>
                        </a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header">
                            <div class="post_meta">
                                <span><i class="fa fa-calendar"></i> {{date('jS M Y',strtotime($bigPost->created_at))}}  </span> 
                                <span><a href='{{URL::to("posts/$bigPost->cat_link")}}'> <i class="fa fa-folder"></i> {{$bigPost->category_name}}</a></span> 
                                <span> <a href=""><i class="fa fa-user"></i> {{$bigPost->name}} </a></span>
                            </div>
                        </header>
                        <div class="entry-content">
                            <p>{{$bigPost->meta_description}}</p>
                            <div class="btn-continue-reading text-center text-uppercase">
                                <a href='{{URL::to("post/$bigPost->id/$bigPost->link")}}' class="more-link">Continue Reading</a>
                            </div>
                        </div>
                    </div>
                </article>
            @foreach($recentPost->chunk(2) as $posts)
                <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-6">
                        <article class="post post-grid">
                            <div class="post-thumb">
                                <a href='{{URL::to("post/$post->id/$post->link")}}'>
                                @if($post->feature_photo!=null)
                                    <img class="img-responsive" src='{{asset("images/post/small/$post->feature_photo")}}' alt="">
                                @else
                                    <img class="img-responsive" src='{{asset("images/default/photo.png")}}' alt="">
                                @endif
                                </a>

                                
                                <p class="post_title"><a href='{{URL::to("post/$post->id/$post->link")}}'>{{$post->title}}</a></p>
                                <a href='{{URL::to("post/$post->id/$post->link")}}' class="post-thumb-overlay text-center">
                                    <div class="text-uppercase text-center">View Post</div>
                                </a>
                            </div>
                            <div class="post-content">
                                <header class="entry-header">
                                    <div class="post_meta">
                                            <span><i class="fa fa-calendar"></i> {{date('jS M Y',strtotime($post->created_at))}}  </span> 
                                            <span><a href='{{URL::to("posts/$post->cat_link")}}'> <i class="fa fa-folder"></i> {{$post->category_name}}</a></span> 
                                            <span> <a href=""><i class="fa fa-user"></i> {{$post->name}} </a></span>
                                        </div>
                                </header>
                                <div class="entry-content">
                                    <p>{{$post->short_description}}</p>
                                    <div class="btn-continue-reading text-center text-uppercase">
                                        <a href='{{URL::to("post/$post->id/$post->link")}}' class="more-link">Continue Reading</a>
                                    </div>

                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
                </div>
            @endforeach 
                <div class="col-md-12 text-center view_more">
                    <a href="{{URL::to('posts')}}" class="btn btn-custom"><i class="fa fa-repeat" aria-hidden="true"></i> View More</a>
                    <br>
                </div>
            </div>
            <div class="col-md-4" data-sticky_column>
                @include('frontend._partials.sidebar')
            </div>
        </div>
    </div>
</div>
<!-- end main content-->
<!--footer start-->
@stop