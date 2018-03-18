<?php $__env->startSection('content'); ?>
<h3 class="box_title">Page Details
  <a href="<?php echo e(route('pages.index')); ?>" class="btn btn-default pull-right viewAll"> <i class="ion ion-navicon-round"></i>&nbsp; View All</a> 
  <a href="<?php echo e(route('pages.edit',$data->id)); ?>" class="btn btn-default pull-right"> <i class="fa fa-pencil-square-o"></i> Edit</a> 
 </h3>
    <section class="col-md-12">
        <div class="hotel-view-main padding-top padding-bottom">
            <div class="p">
                <div class="journey-block">
                <?php if(isset($data['photo'][0])): ?>
                    <div class="timeline-custom-col">
                        <div class="image-hotel-view-block">
                            <div class="slider-for group1">
                            <?php $__currentLoopData = $data['photo']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item"><img src="<?php echo e(asset('public/img/page/'.$photo->photo)); ?>" alt="<?php echo e($data->name); ?>"></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="col-md-12">
                        <div class="service_head">
                            <h2><?php echo e($data->name); ?></h2>
                            <div class="service_info">
                                <h5><b>Title: </b> <?php echo e($data->title); ?></h5>
                            </div>
                            <?php if($data->file!=null): ?>
                                <div id="pdf">
                                  <object type="application/pdf" data='<?php echo e(asset("public/files/page/$data->file")); ?>?#zoom=110&scrollbar=0&toolbar=0&navpanes=0' id="pdf_content">
                                    <p>Not Found PDF File.</p>
                                  </object>
                                </div>
                            <?php endif; ?>
                            <div><b><u>Description:</u></b><br><? echo $data->description ?></div>
                        </div>
                    </div><!-- End col-md-11 -->

                    
    </section>
<!-- STYLE CSS-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>