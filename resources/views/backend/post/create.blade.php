@extends('backend.app')
@section('content')
            <div class="row">
                <div class="col-lg-12 no-padding">
                    <div class="panel panel-info page-panel">
                        <div class="panel-heading">
                           Add New Post
                            <div class="panel-btn pull-right">
                            	<a href="{{URL::to('posts-admin')}}" class="btn btn-success btn-sm"> <i class="fa fa-asterisk"></i> All Posts</a>
                            </div>
                        </div>
                            {!! Form::open(['route'=>'posts-admin.store','method'=>'POST','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal','files'=>'true'])  !!}
                        <div class="panel-body min-padding">
                            <div class="col-md-9">
                                <div class="form-group  {{ $errors->has('title') ? 'has-error' : '' }}">
                                    {{Form::label('title','Title:',['class'=>'col-md-12'])}}
                                    <div class="col-md-12">
                                        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Write Title','required'])}}
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
                                    {{Form::label('link','Post Link:',['class'=>'col-md-12'])}}
                                    <div class="col-md-12">
                                        {{Form::text('link','',['class'=>'form-control','placeholder'=>'Ex: best-tutorial-for-web-development','required'])}}
                                        @if ($errors->has('link'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('link') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
                                    {{Form::label('meta_description','Short Description:',['class'=>'col-md-12'])}}
                                    <div class="col-md-12">
                                        {{Form::textArea('meta_description','',['class'=>'form-control','placeholder'=>'Write short description about this post. ','rows'=>3])}}
                                        @if ($errors->has('meta_description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('meta_description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                   
                                </div>
                                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                    {{Form::label('description','Description:',['class'=>'col-md-12'])}}
                                    <div class="col-md-12">
                                        {{Form::textArea('description','',['class'=>'form-control tinymce','placeholder'=>'Write description here... ','rows'=>5,'required'])}}
                                        <div class="help-block with-errors"></div>
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-md-3 well min-padding">
                                <div class="form-group {{ $errors->has('fk_category_id') ? 'has-error' : '' }}">
                                    {{Form::label('fk_category_id','Category:',['class'=>'col-md-12'])}}
                                    <div class="col-md-12">
                                        {{Form::select('fk_category_id',$categories,'',['class'=>'form-control','required','placeholder'=>'Select Category','onchange'=>'loadSubCat(this.value)','id'=>'category'])}}
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('fk_sub_category_id') ? 'has-error' : '' }}">
                                    {{Form::label('fk_sub_category_id','Sub Category:',['class'=>'col-md-12'])}}
                                    <div class="col-md-12" id="subCategoryLoad">
                                        <span class="form-control">First select category</span>
                                        
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                                    {{Form::label('status','Status:',['class'=>'col-md-12'])}}
                                    <div class="col-md-12">
                                        {{Form::select('status',['1'=>'Publish','0'=>'Draft'],'1',['class'=>'form-control'])}}
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('is_pin') ? 'has-error' : '' }}">
                                    {{Form::label('is_pin','Type:',['class'=>'col-md-12'])}}
                                    <div class="col-md-12">
                                        {{Form::select('is_pin',['1'=>'Top Featured','2'=>'Pin Post','0'=>'Normal'],'0',['class'=>'form-control'])}}
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('feature_photo') ? 'has-error' : '' }}">
                                    {{Form::label('feature_photo', 'Feature Photo:', array('class' => 'col-md-12'))}}
                                    <div class="col-md-12">
                                        <label class="post_upload" for="file">
                                            <!--  -->
                                            <img id="image_load" src="{{asset('assets/images/default/photo.png')}}">
                                        </label>
                                        {{Form::file('feature_photo',array('id'=>'file','style'=>'display:none','onchange'=>"photoLoad(this,'image_load')"))}}
                                         @if ($errors->has('feature_photo'))
                                                <span class="help-block" style="display:block">
                                                    <strong>{{ $errors->first('feature_photo') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                                    {{Form::label('tags','Tags:',['class'=>'col-md-12'])}}
                                    <div class="col-md-12">
                                        <input name="tags" id="tagboxField" value="" type="hidden">
                                        <ul id="tagbox">
                                        </ul>
                                        <span> Separate by comma(,)</span>
                                        @if ($errors->has('tags'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tags') }}</strong>
                                            </span>
                                        @endif
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
                        {{Form::close()}}
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

@endsection
@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="{{asset('assets/backend/plugin/tagbox/js/tag-it.min.js')}}"></script>
<script type="text/javascript">
    function loadSubCat(id){
        $('#subCategoryLoad').load('{{URL::To("load-sub-cat")}}/'+id);
    }
   
    $(document).ready(function() {
            $('#tagbox').tagit({
                allowSpaces: true,
                singleField: true,
                singleFieldNode: $('#tagboxField'),
                availableTags:[<?php echo $tags?>],
            });
        });
</script>
@endsection