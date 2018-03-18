
<?php $__env->startSection('content'); ?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="footer" class="top_slide">
                    <div class="footer-instagram-section">

                        <div id="footer-instagram" class="owl-carousel">
                        <?php $__currentLoopData = $pinPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item">
                                <div class="slide_content">
                                    <h5><a href='<?php echo e(URL::to("post/$pin->id/$pin->link")); ?>'>
                                    <?php echo e($pin->title); ?>

                                     </a></h5>
                                    <div class="post_meta">
                                        <span><i class="fa fa-calendar"></i> <?php echo e(date('jS M Y',strtotime($pin->created_at))); ?> </span> 
                                    </div>
                                </div>
                                <a href="index-grid.html">
                                <?php if($pin->feature_photo!=null): ?>
                                    <img class="img-responsive top_post_img" src='<?php echo e(asset("images/post/small/$pin->feature_photo")); ?>' alt="<?php echo e($pin->title); ?>">
                                <?php else: ?>
                                    <img class="img-responsive top_post_img" src='<?php echo e(asset("images/post/default/default300x300.png")); ?>' alt="<?php echo e($pin->title); ?>">
                                <?php endif; ?>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                    </div>
                    <br>

                <article class="post">
                    <div class="post-thumb">
                        <a href='<?php echo e(URL::to("post/$bigPost->id/$bigPost->link")); ?>'>
                         <?php if($bigPost->feature_photo!=null): ?>
                            <img class="img-responsive" src='<?php echo e(asset("images/post/big/$bigPost->feature_photo")); ?>' alt="">
                        <?php else: ?>
                            <img class="img-responsive" src='<?php echo e(asset("images/default/photo.png")); ?>' alt="">
                        <?php endif; ?>
                        </a>

                        <div class="post_title"><a href='<?php echo e(URL::to("post/$bigPost->id/$bigPost->link")); ?>'><?php echo e($bigPost->title); ?> </a></div>
                        <a href='<?php echo e(URL::to("post/$bigPost->id/$bigPost->link")); ?>' class="post-thumb-overlay text-center">
                            <div class="text-uppercase text-center">View Post</div>
                        </a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header">
                            <div class="post_meta">
                                <span><i class="fa fa-calendar"></i> <?php echo e(date('jS M Y',strtotime($bigPost->created_at))); ?>  </span> 
                                <span><a href='<?php echo e(URL::to("posts/$bigPost->cat_link")); ?>'> <i class="fa fa-folder"></i> <?php echo e($bigPost->category_name); ?></a></span> 
                                <span> <a href=""><i class="fa fa-user"></i> <?php echo e($bigPost->name); ?> </a></span>
                            </div>
                        </header>
                        <div class="entry-content">
                            <p><?php echo e($bigPost->meta_description); ?></p>
                            <div class="btn-continue-reading text-center text-uppercase">
                                <a href='<?php echo e(URL::to("post/$bigPost->id/$bigPost->link")); ?>' class="more-link">Continue Reading</a>
                            </div>
                        </div>
                    </div>
                </article>
            <?php $__currentLoopData = $recentPost->chunk(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6">
                        <article class="post post-grid">
                            <div class="post-thumb">
                                <a href='<?php echo e(URL::to("post/$post->id/$post->link")); ?>'>
                                <?php if($post->feature_photo!=null): ?>
                                    <img class="img-responsive" src='<?php echo e(asset("images/post/small/$post->feature_photo")); ?>' alt="">
                                <?php else: ?>
                                    <img class="img-responsive" src='<?php echo e(asset("images/default/photo.png")); ?>' alt="">
                                <?php endif; ?>
                                </a>

                                
                                <p class="post_title"><a href='<?php echo e(URL::to("post/$post->id/$post->link")); ?>'><?php echo e($post->title); ?></a></p>
                                <a href='<?php echo e(URL::to("post/$post->id/$post->link")); ?>' class="post-thumb-overlay text-center">
                                    <div class="text-uppercase text-center">View Post</div>
                                </a>
                            </div>
                            <div class="post-content">
                                <header class="entry-header">
                                    <div class="post_meta">
                                            <span><i class="fa fa-calendar"></i> <?php echo e(date('jS M Y',strtotime($post->created_at))); ?>  </span> 
                                            <span><a href='<?php echo e(URL::to("posts/$post->cat_link")); ?>'> <i class="fa fa-folder"></i> <?php echo e($post->category_name); ?></a></span> 
                                            <span> <a href=""><i class="fa fa-user"></i> <?php echo e($post->name); ?> </a></span>
                                        </div>
                                </header>
                                <div class="entry-content">
                                    <p><?php echo e($post->short_description); ?></p>
                                    <div class="btn-continue-reading text-center text-uppercase">
                                        <a href='<?php echo e(URL::to("post/$post->id/$post->link")); ?>' class="more-link">Continue Reading</a>
                                    </div>

                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                <div class="col-md-12 text-center view_more">
                    <a href="<?php echo e(URL::to('posts')); ?>" class="btn btn-custom"><i class="fa fa-repeat" aria-hidden="true"></i> View More</a>
                    <br>
                </div>
            </div>
            <div class="col-md-4" data-sticky_column>
                <?php echo $__env->make('frontend._partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
</div>
<!-- end main content-->
<!--footer start-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>