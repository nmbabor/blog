<?php $__env->startSection('content'); ?> 
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-thumb">
                         <?php if($data->feature_photo!=null): ?>
                            <img class="img-responsive pull-left" src='<?php echo e(asset("images/post/medium/$data->feature_photo")); ?>' alt="">
                        <?php else: ?>
                            <img class="img-responsive" src='<?php echo e(asset("images/default/photo.png")); ?>' alt="">
                        <?php endif; ?>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href='<?php echo e(URL::to("posts/$data->cat_link")); ?>'> <?php echo e($data->category_name); ?></a></h6>

                            <h1 class="entry-title"><?php echo e($data->title); ?></h1>


                        </header>
                        <div class="entry-content">
                            <?php echo $data->description ?>
                        </div>

                        <div class="social-share">
							<span class="social-share-title pull-left text-capitalize">By <?php echo e($data->name); ?> On <?php echo e(date('jS M Y',strtotime($data->created_at))); ?></span>
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
                        <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-item">
                            <a href='<?php echo e(URL::to("post/$rel->id/$rel->link")); ?>'>
                                 <?php if($rel->feature_photo!=null): ?>
                                    <img class="img-responsive pull-left" src='<?php echo e(asset("images/post/medium/$rel->feature_photo")); ?>' alt="">
                                <?php else: ?>
                                    <img class="img-responsive" src='<?php echo e(asset("images/default/photo.png")); ?>' alt="">
                                <?php endif; ?>
                                <p><?php echo e($rel->title); ?></p>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div><!--related post carousel-->
                <div class="bottom-comment">
                     <div class="fb-comments" data-href="<?php echo e(Request::fullUrl()); ?>" data-numposts="5"  data-width="100%"></div>
                </div>
                <!-- end bottom comment-->
            </div>
            <div class="col-md-4" data-sticky_column>
                <?php echo $__env->make('frontend._partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
</div>
<!-- end main content-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $("#share").jsSocials({
      url:"<?php echo e(URL::to('')); ?>",
      shareIn: "popup",
      text: '<?php echo e($data->title); ?> | <?php echo e(URL::to("post/$data->id/$data->link")); ?>',
      showLabel: false,
      showCount: false,
      shares: ["facebook","twitter", "googleplus", "linkedin" ]
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>