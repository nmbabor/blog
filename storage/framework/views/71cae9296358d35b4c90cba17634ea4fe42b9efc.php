<?php $__env->startSection('content'); ?>
            <div class="row">
                <div class="col-lg-12 no-padding">
                    <div class="panel panel-default page-panel">
                        <div class="panel-heading">
                            All Posts
                            <div class="panel-btn pull-right">
                            	<a href="<?php echo e(URL::to('posts-admin/create')); ?>" class="btn btn-primary btn-sm" > <i class="fa fa-plus"></i> Add New</a>
                            </div>
                        </div>
                        <div class="panel-body min-padding">
                        	<table class="table table-striped table-bordered">
                        		<thead>
                        			<tr>
                        				<th width="5%">SL</th>
                        				<th>Post Title</th>
                                        <th width="15%">Category</th>
                                        <th width="12%">Created By</th>
                        				<th width="10%">Date</th>
                        				<th width="7%">Action</th>
                        			</tr>
                        		</thead>
                        		<tbody>
                                    <? $i=0; ?>
                                    <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <? $i++; ?>
                        			<tr>
                        				<td><?php echo e($i); ?></td>
                                        <td><?php echo e($data->title); ?> 
                                        <?php if($data->is_pin==1): ?>
                                        <span class="badge">F</span>
                                        <?php elseif($data->is_pin==2): ?>
                                        <span class="badge">Pin</span>
                                        <?php endif; ?>
                                        <span class="badge"><?php echo e($data->hit); ?></span>

                                        </td>
                                        <td><?php echo e($data->category_name); ?><br><small>(<?php echo e($data->sub_category_name); ?>)</small></td>
                                        <td><?php echo e($data->user_name); ?></td>
                        				<td><?php echo e(date('d-m-Y',strtotime($data->created_at))); ?></td>
                        				<td style="text-align: center">
                                            <?php echo e(Form::open(array('route'=>['posts-admin.destroy',$data->id],'method'=>'DELETE','id'=>"deleteForm$data->id"))); ?>

                        					<a href='<?php echo e(URL::to("posts-admin/$data->id/edit")); ?>' class="btn btn-info btn-xs"> <i class="fa fa-pencil-square"></i></a>
                                            <button type="button" class="btn btn-danger btn-xs" onclick='return deleteConfirm("deleteForm<?php echo e($data->id); ?>")'><i class="fa fa-trash"></i></button>
                                        <?php echo Form::close(); ?>


                        				</td>
                        			</tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        		</tbody>
                        		
                        	</table>
                        </div>
                        <?php echo e($allData->render()); ?>

                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        


<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>