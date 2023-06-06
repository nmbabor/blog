@extends('frontend.app')
@section('content')
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-thumb">
                         @if($data->feature_photo!=null)
                            <img class="img-responsive pull-left" src='{{asset("assets/images/post/big/$data->feature_photo")}}' alt="">
                        @else
                            <img class="img-responsive" src='{{asset("assets/images/default/photo.png")}}' alt="">
                        @endif
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href='{{URL::to("posts/$data->cat_link")}}'> {{$data->category_name}}</a></h6>

                            <h1 class="entry-title">{{$data->title}}</h1>


                        </header>
                        <div class="entry-content">
                            <?php echo $data->description ?>
                        </div>

                        <div class="social-share">
							<span class="social-share-title pull-left text-capitalize">By {{$data->name}} On {{date('jS M Y',strtotime($data->created_at))}}</span>
                            <div class="pull-right">
                                <div id="share"></div>
                            </div>
                        </div>
                    </div>
                </article>
                <div class="related-post-carousel"><!--related post carousel-->
                    <div class="related-heading">
                        <h4>You might also like</h4>
                    </div>
                    <div class="items">
                        @foreach($related as $rel)
                        <div class="single-item">
                            <a href='{{URL::to("post/$rel->id/$rel->link")}}'>
                                 @if($rel->feature_photo!=null)
                                    <img class="img-responsive" src='{{asset("assets/images/post/small/$rel->feature_photo")}}' alt="">
                                @else
                                    <img class="img-responsive" src='{{asset("assets/images/default/photo.png")}}' alt="">
                                @endif
                                <p>{{$rel->title}}</p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div><!--related post carousel-->
                <div class="bottom-comment">
                     <div class="fb-comments" data-href="{{Request::fullUrl()}}" data-numposts="5"  data-width="100%"></div>
                </div>
                <!-- end bottom comment-->
            </div>
            <div class="col-md-4" data-sticky_column>
                @include('frontend._partials.sidebar')
            </div>
        </div>
    </div>
</div>
<!-- end main content-->
@stop
@section('script')
<script>
    $("#share").jsSocials({
      url:"{{URL::to('')}}",
      shareIn: "popup",
      text: '{{$data->title}} | {{URL::to("post/$data->id/$data->link")}}',
      showLabel: false,
      showCount: false,
      shares: ["facebook","twitter", "linkedin" ]
    });
</script>
@stop
