<?php $__env->startSection('content'); ?>


<h3 class="box_title">Edit 
 <a href="<?php echo e(route('pages.index')); ?>" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All </a>
 </h3>
    <?php echo Form::open(array('route' => ['pages.update', $data->id],'method'=>'PUT','class'=>'form-horizontal','files'=>true)); ?>

        <div class="form-group ">
            
            <?php echo e(Form::label('link', 'Page link', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <div class="input-group">
                    <div class="input-group-addon"><?php echo e(URL::to('page')); ?>/</div>
                    <?php echo e(Form::text('link',$data->link,array('class'=>'form-control','placeholder'=>'Page link','required'))); ?>

                </div>
            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('name', 'Page Name', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('name',$data->name,array('class'=>'form-control','placeholder'=>'Page Name','required'))); ?>

            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('title', 'Page title', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::text('title',$data->title,array('class'=>'form-control','placeholder'=>'Page title','required'))); ?>

            </div>
        </div>
        <div class="form-group <?php echo e($errors->has('file') ? ' has-error' : ''); ?>">
            <?php echo e(Form::label('file', 'Pdf File', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
            <?php if($data->file!=null): ?>
                <div id="pdf">
                  <object type="application/pdf" data='<?php echo e(asset("public/files/page/$data->file")); ?>?#zoom=80&scrollbar=0&toolbar=0&navpanes=0' id="pdf_content">
                    <p>Not Found PDF File.</p>
                  </object>
                </div>
            <?php endif; ?>
                <?php echo e(Form::file('file',array('class'=>'form-control'))); ?>

                 <?php if($errors->has('file')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('file')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('description', 'Description', array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
                <?php echo e(Form::textArea('description',$data->description,array('class'=>'form-control tinymce','placeholder'=>'Write some thing about page','rows'=>'5'))); ?>

            </div>
        </div>
        
        <div class="form-group">
            <?php echo e(Form::label('status', 'Status', array('class' => 'col-md-3 control-label'))); ?>


            <div class="col-md-8">
                <?php echo e(Form::select('status', array('1' => 'Active', '2' => 'Inactive'),$data->status, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="form-group <?php echo e($errors->has('photo') ? 'has-error' : ''); ?>">
                <?php echo e(Form::label('photo', 'Image', array('class' => 'control-label col-md-3'))); ?>

                <div class="col-md-8">
                    <div id="formdiv">
                        <div class="img_control">
                          <? 
                          if(!empty($data->photo)){
                            foreach ($data->photo as $photo) { ?>
                            <div id="filediv">
                                <div id="abcd" class="abcd"><img id="previewimg" src="<?php echo e(asset('public/img/page/'.$photo['photo'])); ?>"><input type="hidden" id="exist_file" value="<? echo $photo['id']; ?>" /><img id="exist_img" src="<?php echo e(asset('public/img/x.png')); ?>" alt="X" title="Delete"></div>
                            </div>

                             <?} } ?>
                             <div id="filediv"><input name="photo[]" type="file" id="files"/></div>
                             <div id="loadDelete"><!-- Load Delete value --></div>
                        <input type="button" id="add_more" class="upload btn btn-warning" value="Add More Photo"/>
                        </div>
                    </div>
                    <?php if($errors->has('photo')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('photo')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
             </div>
            <?php echo e(Form::hidden('id',$data->id)); ?>

        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
      
	<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>