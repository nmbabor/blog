<?
    $popular=App\Model\Post::where(['status'=>1])->orderBy('hit','DESC')->simplePaginate(4);
    $category=App\Model\Post::leftJoin('categories','posts.fk_category_id','categories.id')->where('posts.status',1)->select(DB::raw('COUNT(*) as count'),'category_name','categories.link')->groupBy('fk_category_id')->get();
    $info=App\Model\PrimaryInfo::first();
?>
<div class="primary-sidebar">
    <aside class="widget news-letter" style="padding:10px;">
       <div class="fb-page" data-href="{{$info->fb_link}}" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"></div>

    </aside>
     <aside class="widget border pos-padding">
        <h3 class="widget-title text-uppercase text-center">Categories</h3>
        <ul>
        @foreach($category as $cat)
            <li>
                <a href='{{URL::to("posts/$cat->link")}}'>{{$cat->category_name}}</a>
                <span class="post-count pull-right"> ({{$cat->count}})</span>
            </li>
        @endforeach
        </ul>
    </aside>
    <aside class="widget">
        <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>
    @foreach($popular as $pop)
        <div class="popular-post">
            <a href='{{URL::to("post/$pop->id/$pop->link")}}' class="popular-img">
            @if($pop->feature_photo!=null)
                <img class="img-responsive" src='{{asset("images/post/small/$pop->feature_photo")}}' alt="{{$pop->title}}">
            @else
                <img class="img-responsive" src='{{asset("images/post/default/default300x300.png")}}' alt="{{$pop->title}}">
            @endif
            </a>

            <div class="p-content">
                <a href='{{URL::to("post/$pop->id/$pop->link")}}' class="text-uppercase">{{$pop->title}}</a>
                <span class="p-date"> {{date('jS M Y',strtotime($pop->created_at))}}</span>

            </div>
        </div>
    @endforeach
    </aside>
    <!-- <aside class="widget pos-padding">
        <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>

        <div class="thumb-latest-posts">


            <div class="media">
                <div class="media-left">
                    <a href="index-grid.html#" class="popular-img"><img src="{{asset('public/img/images/r-p.jpg')}}" alt="">

                        <div class="p-overlay"></div>
                    </a>
                </div>
                <div class="p-content">
                    <a href="index-grid.html#" class="text-uppercase">Home is peaceful Place</a>
                    <span class="p-date">February 15, 2016</span>
                </div>
            </div>
        </div>
        <div class="thumb-latest-posts">


            <div class="media">
                <div class="media-left">
                    <a href="index-grid.html#" class="popular-img"><img src="{{asset('public/img/images/r-p.jpg')}}" alt="">

                        <div class="p-overlay"></div>
                    </a>
                </div>
                <div class="p-content">
                    <a href="index-grid.html#" class="text-uppercase">Home is peaceful Place</a>
                    <span class="p-date">February 15, 2016</span>
                </div>
            </div>
        </div>
        <div class="thumb-latest-posts">


            <div class="media">
                <div class="media-left">
                    <a href="index-grid.html#" class="popular-img"><img src="{{asset('public/img/images/r-p.jpg')}}" alt="">

                        <div class="p-overlay"></div>
                    </a>
                </div>
                <div class="p-content">
                    <a href="index-grid.html#" class="text-uppercase">Home is peaceful Place</a>
                    <span class="p-date">February 15, 2016</span>
                </div>
            </div>
        </div>
        <div class="thumb-latest-posts">


            <div class="media">
                <div class="media-left">
                    <a href="index-grid.html#" class="popular-img"><img src="{{asset('public/img/images/r-p.jpg')}}" alt="">

                        <div class="p-overlay"></div>
                    </a>
                </div>
                <div class="p-content">
                    <a href="index-grid.html#" class="text-uppercase">Home is peaceful Place</a>
                    <span class="p-date">February 15, 2016</span>
                </div>
            </div>
        </div>
    </aside> -->
    
    <!-- <aside class="widget">
        <h3 class="widget-title text-uppercase text-center">Featured Posts</h3>

        <div id="widget-feature" class="owl-carousel">
            <div class="item">
                <div class="feature-content">
                    <img src="{{asset('public/img/images/p1.jpg')}}" alt="">

                    <a href="index-grid.html#" class="overlay-text text-center">
                        <h5 class="text-uppercase">Home is peaceful</h5>

                        <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="feature-content">
                    <img src="{{asset('public/img/images/p2.jpg')}}" alt="">

                    <a href="index-grid.html#" class="overlay-text text-center">
                        <h5 class="text-uppercase">Home is peaceful</h5>

                        <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="feature-content">
                    <img src="{{asset('public/img/images/p3.jpg')}}" alt="">

                    <a href="index-grid.html#" class="overlay-text text-center">
                        <h5 class="text-uppercase">Home is peaceful</h5>

                        <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>
                    </a>
                </div>
            </div>
        </div>
    </aside> -->
  
</div>
            