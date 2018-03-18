
<?php $__env->startSection('content'); ?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <h2 class="page-title"><?php echo e($pageTitle); ?></h2>
            <?php $__currentLoopData = $allPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="post post-list">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="post-thumb">
                                <a href='<?php echo e(URL::to("post/$post->id/$post->link")); ?>'>
                                     <?php if($post->feature_photo!=null): ?>
                                        <img class="img-responsive pull-left" src='<?php echo e(asset("images/post/medium/$post->feature_photo")); ?>' alt="">
                                    <?php else: ?>
                                        <img class="img-responsive" src='<?php echo e(asset("images/default/photo.png")); ?>' alt="">
                                    <?php endif; ?>
                                </a>

                                <a href='<?php echo e(URL::to("post/$post->id/$post->link")); ?>' class="post-thumb-overlay text-center">
                                    <div class="text-uppercase text-center">View Post</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="post-content">
                                <header class="entry-header text-uppercase">
                                    <h6><a href='<?php echo e(URL::to("posts/$post->cat_link")); ?>'> <?php echo e($post->category_name); ?></a></h6>

                                    <h4><a href='<?php echo e(URL::to("post/$post->id/$post->link")); ?>'><?php echo e($post->title); ?></a></h4>
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
                                    <span><i class="fa fa-calendar"></i> <?php echo e(date('jS M Y',strtotime($post->created_at))); ?>  </span> 
                                <span> <a href=""> <i class="fa fa-user"></i> <?php echo e($post->name); ?> </a></span>

                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($allPost->render()); ?>

            </div>
            <div class="col-md-4" data-sticky_column>
                <?php echo $__env->make('frontend._partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>