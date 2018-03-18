@extends('backend.app')
@section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info page-panel">
                        <div class="panel-heading">
                           Add New Category
                            <div class="panel-btn pull-right">
                            	<a href="{{URL::to('category')}}" class="btn btn-success btn-sm"> <i class="fa fa-asterisk"></i> All Category</a>
                            </div>
                        </div>
                            {!! Form::open(['route'=>'category.store','method'=>'POST','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal'])  !!}
                        <div class="panel-body">
                            <div class="form-group  {{ $errors->has('category_name') ? 'has-error' : '' }}">
                                {{Form::label('category_name','Category Name',['class'=>'col-md-2'])}}
                                <div class="col-md-7">
                                    {{Form::text('category_name','',['class'=>'form-control','placeholder'=>'Write category name','required'])}}
                                    @if ($errors->has('category_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    {{Form::select('status',['1'=>'Active','0'=>'Inactive'],'1',['class'=>'form-control','required'])}}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
                                {{Form::label('link','Category Link',['class'=>'col-md-2'])}}
                                <div class="col-md-7">
                                    {{Form::text('link','',['class'=>'form-control','placeholder'=>'Ex: life-style','required'])}}
                                    @if ($errors->has('link'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('link') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    {{Form::number('serial_num',$max_serial,['class'=>'form-control','required','min'=>0])}}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                {{Form::label('description','Short Description',['class'=>'col-md-2'])}}
                                <div class="col-md-9">
                                    {{Form::textArea('description','',['class'=>'form-control','placeholder'=>'Write short description about this category. ','rows'=>5])}}
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                               
                            </div>
                            <div class="form-group {{ $errors->has('keywords') ? 'has-error' : '' }}">
                                {{Form::label('keywords','Keywords',['class'=>'col-md-2'])}}
                                <div class="col-md-9">
                                    {{Form::text('keywords','',['class'=>'form-control','placeholder'=>'Write some keywords about this category for seo help. '])}}
                                    @if ($errors->has('keywords'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('keywords') }}</strong>
                                        </span>
                                    @endif
                                </div>
                               
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-2">
                                   <button  type="submit" class="btn btn-success"><i class="fa fa-save"></i> &nbsp;Save</button>
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