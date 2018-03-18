<?php $__env->startSection('content'); ?>
            <div class="row">
                <div class="col-lg-12 no-padding">
                    <div class="panel panel-info page-panel">
                        <div class="panel-heading">
                           Edit this post
                            <div class="panel-btn pull-right">
                                <a href="<?php echo e(URL::to('posts-admin')); ?>" class="btn btn-success btn-sm"> <i class="fa fa-asterisk"></i> All Posts</a>
                            </div>
                        </div>
                            <?php echo Form::open(['route'=>['posts-admin.update',$data->id],'method'=>'PUT','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal','files'=>'true']); ?>

                        <div class="panel-body min-padding">
                            <div class="col-md-9">
                                <div class="form-group  <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                                    <?php echo e(Form::label('title','Title:',['class'=>'col-md-12'])); ?>

                                    <div class="col-md-12">
                                        <?php echo e(Form::text('title',$data->title,['class'=>'form-control','placeholder'=>'Write Title','required'])); ?>

                                        <?php if($errors->has('title')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('title')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group <?php echo e($errors->has('link') ? 'has-error' : ''); ?>">
                                    <?php echo e(Form::label('link','Post Link:',['class'=>'col-md-12'])); ?>

                                    <div class="col-md-12">
                                        <?php echo e(Form::text('link',$data->link,['class'=>'form-control','placeholder'=>'Ex: best-tutorial-for-web-development','required'])); ?>

                                        <?php if($errors->has('link')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('link')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group <?php echo e($errors->has('meta_description') ? 'has-error' : ''); ?>">
                                    <?php echo e(Form::label('meta_description','Short Description:',['class'=>'col-md-12'])); ?>

                                    <div class="col-md-12">
                                        <?php echo e(Form::textArea('meta_description',$data->meta_description,['class'=>'form-control','placeholder'=>'Write short description about this post. ','rows'=>3])); ?>

                                        <?php if($errors->has('meta_description')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('meta_description')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                   
                                </div>
                                <div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
                                    <?php echo e(Form::label('description','Description:',['class'=>'col-md-12'])); ?>

                                    <div class="col-md-12">
                                        <?php echo e(Form::textArea('description',$data->description,['class'=>'form-control tinymce','placeholder'=>'Write description here... ','rows'=>5,'required'])); ?>

                                        <div class="help-block with-errors"></div>
                                        <?php if($errors->has('description')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('description')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-md-3 well min-padding">
                                <div class="form-group <?php echo e($errors->has('fk_category_id') ? 'has-error' : ''); ?>">
                                    <?php echo e(Form::label('fk_category_id','Category:',['class'=>'col-md-12'])); ?>

                                    <div class="col-md-12">
                                        <?php echo e(Form::select('fk_category_id',$categories,$data->fk_category_id,['class'=>'form-control','required','placeholder'=>'Select Category','onchange'=>'loadSubCat(this.value)','id'=>'category'])); ?>

                                    </div>
                                </div>
                                <div class="form-group <?php echo e($errors->has('fk_sub_category_id') ? 'has-error' : ''); ?>">
                                    <?php echo e(Form::label('fk_sub_category_id','Sub Category:',['class'=>'col-md-12'])); ?>

                                    <div class="col-md-12" id="subCategoryLoad">
                                       <?php echo e(Form::select('fk_sub_category_id',$subCategory,$data->fk_sub_category_id,['class'=>'form-control','required','placeholder'=>'Select Sub Category','id'=>'subCategory'])); ?>

                                        
                                    </div>
                                </div>
                                <div class="form-group <?php echo e($errors->has('is_pin') ? 'has-error' : ''); ?>">
                                    <?php echo e(Form::label('is_pin','Type:',['class'=>'col-md-12'])); ?>

                                    <div class="col-md-12">
                                        <?php echo e(Form::select('is_pin',['1'=>'Top Featured','2'=>'Pin Post','0'=>'Normal'],$data->is_pin,['class'=>'form-control','required'])); ?>

                                    </div>
                                </div>
                                <div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
                                    <?php echo e(Form::label('status','Status:',['class'=>'col-md-12'])); ?>

                                    <div class="col-md-12">
                                        <?php echo e(Form::select('status',['1'=>'Publish','0'=>'Draft'],$data->status,['class'=>'form-control','required'])); ?>

                                    </div>
                                </div>
                                <div class="form-group <?php echo e($errors->has('feature_photo') ? 'has-error' : ''); ?>">
                                    <?php echo e(Form::label('feature_photo', 'Feature Photo:', array('class' => 'col-md-12'))); ?>

                                    <div class="col-md-12">
                                        <label class="post_upload" for="file">
                                        <?php if($data->feature_photo!=null): ?>
                                        <img id="image_load" src='<?php echo e(asset("images/post/medium/$data->feature_photo")); ?>' class="img-responsive">
                                        <?php else: ?>
                                        <img id="image_load" src="<?php echo e(asset('images/default/photo.png')); ?>">
                                        <?php endif; ?>
                                        </label>
                                        <?php echo e(Form::file('feature_photo',array('id'=>'file','style'=>'display:none','onchange'=>"photoLoad(this,'image_load')"))); ?>

                                         <?php if($errors->has('feature_photo')): ?>
                                                <span class="help-block" style="display:block">
                                                    <strong><?php echo e($errors->first('feature_photo')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group <?php echo e($errors->has('tags') ? 'has-error' : ''); ?>">
                                    <?php echo e(Form::label('tags','Tags:',['class'=>'col-md-12'])); ?>

                                    <div class="col-md-12">
                                        <input name="tags" id="tagboxField" value="<?php echo e($data->tags); ?>" type="hidden">
                                        <ul id="tagbox">
                                        </ul>
                                        <span> Separate by comma(,)</span>
                                        <?php if($errors->has('tags')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('tags')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                   
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                       <button  type="submit" class="btn btn-success"><i class="fa fa-save"></i> &nbsp;Submit</button>
                                    </div>
                                   
                                </div>
                                
                            </div>
                            
                        </div>
                        <!-- /.panel-body -->
                        <?php echo e(Form::close()); ?>

                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo e(asset('public/backend/plugin/tagbox/js/tag-it.min.js')); ?>"></script>
<script type="text/javascript">
    function loadSubCat(id){
        $('#subCategoryLoad').load('<?php echo e(URL::To("load-sub-cat")); ?>/'+id);
    }
   
    $(document).ready(function() {
            $('#tagbox').tagit({
                allowSpaces: true,
                singleField: true,
                singleFieldNode: $('#tagboxField'),
                availableTags:[<? echo $tags?>],
            });
        });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>