<?php $__env->startSection('content'); ?>

<div class="tab_content">

  <h3 class="box_title">Pages
 <a href="<?php echo e(route('pages.create')); ?>" class="btn btn-default pull-right"> <i class="ion ion-plus"></i> Add new </a></h3>
        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Page Name</th>
                    <th>Page Link </th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <? $i=1; ?>
            <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($i++); ?></td>
                    <td><a href="<?php echo e(route('pages.show',$data->id)); ?>"><?php echo e($data->name); ?></a></td>
                    <td><a href="<?php echo e(URL::to('page/'.$data->link)); ?>" target="_blank"><?php echo e(URL::to('page/'.$data->link)); ?></a></td>

                    <td><i class="<?php echo e(($data->status==1)? 'fa fa-check-circle text-success' : 'fa fa-times-circle'); ?>"></i></td>
                    <td><?php echo e($data->created_at); ?></td>
                    <td>
        <?php echo Form::open(array('route' => ['pages.destroy',$data->id],'method'=>'DELETE')); ?>

            <button type="submit" class="btn btn-xs btn-danger" onclick="return deleteConfirm()"><i class="fa fa-trash"></i></button>
        <?php echo Form::close(); ?>

                    </td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="pull-right">
        <?php echo e($allData->render()); ?> 
        </div>
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>