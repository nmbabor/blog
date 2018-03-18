@extends('frontend.app')
@section('content')
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <h2 class="page-title">All Post</h2>
            @foreach($allPost as $post)
                <article class="post post-list">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="post-thumb">
                                <a href="blog.html">
                                     @if($post->feature_photo!=null)
                                        <img class="img-responsive pull-left" src='{{asset("images/post/medium/$post->feature_photo")}}' alt="">
                                    @else
                                        <img class="img-responsive" src='{{asset("images/default/photo.png")}}' alt="">
                                    @endif
                                </a>

                                <a href="blog.html" class="post-thumb-overlay text-center">
                                    <div class="text-uppercase text-center">View Post</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="post-content">
                                <header class="entry-header text-uppercase">
                                    <h6><a href="list-layout.html#"> {{$post->category_name}}</a></h6>

                                    <h4><a href="blog.html">{{$post->title}}</a></h4>
                                </header>
                                <div class="entry-content">
                                    <p>
                                    <?
                                    $string  = $post->meta_description;
                                    if (strlen($string) > 250)
                                    {
                                        $string = wordwrap($string, 250);
                                        $i = strpos($string, "\n");
                                        if ($i) {
                                            $string = substr($string, 0, $i);
                                        }
                                    }
                                    echo $string;
                                    ?>
                                    </p>
                                </div>
                                <div class="social-share">
                                    <span><i class="fa fa-calendar"></i> {{date('jS M Y',strtotime($post->created_at))}}  </span> 
                                <span> <a href=""> <i class="fa fa-user"></i> {{$post->name}} </a></span>

                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
                {{$allPost->render()}}
            </div>
            <div class="col-md-4" data-sticky_column>
                @include('frontend._partials.sidebar')
            </div>
        </div>
    </div>
</div>
@stop