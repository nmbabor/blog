<?php $__env->startSection('content'); ?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="page-title"><?php echo e($page->title); ?></h2>
                <div class="col-md-12">
                    <? echo $page->description; ?>
                </div>
            </div>
            
            <div class="col-md-4" data-sticky_column>
                <?php echo $__env->make('frontend._partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>