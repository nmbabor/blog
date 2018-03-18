<?php $__env->startSection('content'); ?>
<div class="tab_content">

<h3 class="box_title">Add New 
 <a href="<?php echo e(route('pages.index')); ?>" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All </a></h3>
	<?php echo Form::open(array('route' => 'pages.store','class'=>'form-horizontal','files'=>true)); ?>

        <div class="form-group  <?php echo e($errors->has('link') ? 'has-error' : ''); ?>">
            
            <?php echo e(Form::label('link', 'Page link', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <div class="input-group">
                    <div class="input-group-addon"><?php echo e(URL::to('page')); ?>/</div>
                    <?php echo e(Form::text('link','',array('class'=>'form-control','placeholder'=>'Page link','required'))); ?>

                </div>
                <?php if($errors->has('link')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('link')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('name', 'Page Name', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('name','',array('class'=>'form-control','placeholder'=>'Page Name','required'))); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('title', 'Page Title', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::textArea('title','',array('class'=>'form-control','placeholder'=>'Page Title','required','rows'=>'2'))); ?>

            </div>
        </div>
        <div class="form-group <?php echo e($errors->has('file') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('file', 'Pdf file', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::file('file',array('class'=>'form-control'))); ?>

                 <?php if($errors->has('file')): ?>
                        <span class="help-block" style="display:block">
                            <strong><?php echo e($errors->first('file')); ?></strong>
                        </span>
                    <?php endif; ?>
                    <br>
                    <b>OR</b>
            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('description', 'Description', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::textArea('description','',array('class'=>'form-control tinymce ','placeholder'=>'Write some thing about page','rows'=>'5'))); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('status', 'Status', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::select('status', array('1' => 'Active', '2' => 'Inactive'),'1', ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="form-group <?php echo e($errors->has('photo') ? 'has-error' : ''); ?>">
            <?php echo e(Form::label('photo', 'Image', array('class' => 'control-label col-md-3'))); ?>

            <div class="col-md-8">
            <small>Max image size 2MB</small>
                <div id="formdiv">
                    <div class="img_control">
                      <div id="filediv">
                      <?php echo e(Form::file('photo[]', array('multiple'=>true,'id'=>'files'))); ?>

                      </div>
                        <div class="add_btn">
                            <input type="button" id="add_more" class="upload btn btn-warning" value="Add More Photo"/>
                        </div>
                    </div>
                </div>
                <?php if($errors->has('photo')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('photo')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
         </div>
        
        <div class="from-group col-md-6 multiple_upload">
        <!-- Load multiple photo -->
        </div>

	    <div class="form-group">
	        <div class="col-md-9 col-md-offset-3">
	            <button type="submit" class="btn btn-primary">Submit</button>
	        </div>
	    </div>
      </div>
	<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>