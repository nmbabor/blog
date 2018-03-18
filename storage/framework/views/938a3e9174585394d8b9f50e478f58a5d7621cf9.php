<?
    $popular=App\Model\Post::where(['status'=>1])->orderBy('hit','DESC')->simplePaginate(4);
    $category=App\Model\Post::leftJoin('categories','posts.fk_category_id','categories.id')->where('posts.status',1)->select(DB::raw('COUNT(*) as count'),'category_name','categories.link')->groupBy('fk_category_id')->get();
    $info=App\Model\PrimaryInfo::first();
?>
<div class="primary-sidebar">
    <aside class="widget news-letter" style="padding:10px;">
       <div class="fb-page" data-href="<?php echo e($info->fb_link); ?>" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"></div>

    </aside>
     <aside class="widget border pos-padding">
        <h3 class="widget-title text-uppercase text-center">Categories</h3>
        <ul>
        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href='<?php echo e(URL::to("posts/$cat->link")); ?>'><?php echo e($cat->category_name); ?></a>
                <span class="post-count pull-right"> (<?php echo e($cat->count); ?>)</span>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </aside>
    <aside class="widget">
        <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>
    <?php $__currentLoopData = $popular; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="popular-post">
            <a href='<?php echo e(URL::to("post/$pop->id/$pop->link")); ?>' class="popular-img">
            <?php if($pop->feature_photo!=null): ?>
                <img class="img-responsive" src='<?php echo e(asset("images/post/small/$pop->feature_photo")); ?>' alt="<?php echo e($pop->title); ?>">
            <?php else: ?>
                <img class="img-responsive" src='<?php echo e(asset("images/post/default/default300x300.png")); ?>' alt="<?php echo e($pop->title); ?>">
            <?php endif; ?>
            </a>

            <div class="p-content">
                <a href='<?php echo e(URL::to("post/$pop->id/$pop->link")); ?>' class="text-uppercase"><?php echo e($pop->title); ?></a>
                <span class="p-date"> <?php echo e(date('jS M Y',strtotime($pop->created_at))); ?></span>

            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </aside>
    <!-- <aside class="widget pos-padding">
        <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>

        <div class="thumb-latest-posts">


            <div class="media">
                <div class="media-left">
                    <a href="index-grid.html#" class="popular-img"><img src="<?php echo e(asset('public/img/images/r-p.jpg')); ?>" alt="">

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
                    <a href="index-grid.html#" class="popular-img"><img src="<?php echo e(asset('public/img/images/r-p.jpg')); ?>" alt="">

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
                    <a href="index-grid.html#" class="popular-img"><img src="<?php echo e(asset('public/img/images/r-p.jpg')); ?>" alt="">

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
                    <a href="index-grid.html#" class="popular-img"><img src="<?php echo e(asset('public/img/images/r-p.jpg')); ?>" alt="">

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
                    <img src="<?php echo e(asset('public/img/images/p1.jpg')); ?>" alt="">

                    <a href="index-grid.html#" class="overlay-text text-center">
                        <h5 class="text-uppercase">Home is peaceful</h5>

                        <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="feature-content">
                    <img src="<?php echo e(asset('public/img/images/p2.jpg')); ?>" alt="">

                    <a href="index-grid.html#" class="overlay-text text-center">
                        <h5 class="text-uppercase">Home is peaceful</h5>

                        <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="feature-content">
                    <img src="<?php echo e(asset('public/img/images/p3.jpg')); ?>" alt="">

                    <a href="index-grid.html#" class="overlay-text text-center">
                        <h5 class="text-uppercase">Home is peaceful</h5>

                        <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>
                    </a>
                </div>
            </div>
        </div>
    </aside> -->
  
</div>
            