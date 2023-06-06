@extends('backend.app')
@section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info page-panel">
                        <div class="panel-heading">
                           Profile Update
                            <div class="panel-btn pull-right">
                            	<a href="{{URL::to('dashboard')}}" class="btn btn-success btn-sm"> <i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </div>
                        </div>
                            {!! Form::open(['url'=>'profile','method'=>'POST','role'=>'form','data-toggle'=>'validator','class'=>'form-horizontal','files'=>'true'])  !!}
                        <div class="panel-body">
                            <div class="col-md-9">
                                
                            
                            <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">
                                {{Form::label('name','Name:',['class'=>'col-md-2 control-label'])}}
                                <div class="col-md-10">
                                    {{Form::text('name',Auth::user()->name,['class'=>'form-control','placeholder'=>'Your Name','required'])}}
                                    <div class="help-block with-errors"></div>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                {{Form::label('email','Email:',['class'=>'col-md-2 control-label'])}}
                                <div class="col-md-10">
                                    {{Form::email('email',Auth::user()->email,['class'=>'form-control','placeholder'=>'Email','required'])}}
                                    <div class="help-block with-errors"></div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                {{Form::label('address','Address:',['class'=>'col-md-2 control-label'])}}
                                <div class="col-md-10">
                                    {{Form::textarea('address',Auth::user()->address,['class'=>'form-control','placeholder'=>'Address','rows'=>'2'])}}
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group  {{ $errors->has('fb_link') ? 'has-error' : '' }}">
                                {{Form::label('fb_link','Facebook:',['class'=>'col-md-2 control-label'])}}
                                <div class="col-md-10">
                                    {{Form::text('fb_link','',['class'=>'form-control','placeholder'=>'Facebook username','required'])}}
                                    <div class="help-block with-errors"></div>
                                    @if ($errors->has('fb_link'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fb_link') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('about') ? 'has-error' : '' }}">
                                {{Form::label('about','About yourself:',['class'=>'col-md-2 control-label'])}}
                                <div class="col-md-10">
                                    {{Form::textarea('about','',['class'=>'form-control','placeholder'=>'Write about yourself here..','rows'=>'4'])}}
                                    @if ($errors->has('about'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('about') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">
                                {{Form::label('name','Name:',['class'=>'col-md-2 control-label'])}}
                                <div class="col-md-10">
                                    {{Form::text('name',Auth::user()->name,['class'=>'form-control','placeholder'=>'Your Name','required'])}}
                                    <div class="help-block with-errors"></div>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
                                   <button  type="submit" class="btn btn-success"><i class="fa fa-save"></i> &nbsp;Save</button>
                                </div>
                               
                            </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                                    
                                    <div class="col-md-12">
                                        <label class="post_upload" for="file">
                                            <!--  -->
                                            <img id="image_load" src="{{asset('images/default/photo.png')}}">
                                        </label>
                                        {{Form::file('photo',array('id'=>'file','style'=>'display:none','onchange'=>"photoLoad(this,'image_load')"))}}
                                         @if ($errors->has('photo'))
                                                <span class="help-block" style="display:block">
                                                    <strong>{{ $errors->first('photo') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                    {{Form::label('photo', 'Profile Picture', array('class' => 'col-md-12'))}}
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