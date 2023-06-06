@extends('backend.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info page-panel">
            <div class="panel-heading">
                Add new Sub Category in <a href='{{URL::to("category/$category->id/edit")}}'>{{$category->category_name}}</a>
                <div class="panel-btn pull-right">
                	<a href="{{URL::to('category')}}" class="btn btn-primary btn-sm" > <i class="fa fa-angel-left"></i> Back to Category</a>
                </div>
            </div>
            <div class="panel-body">

            	<div class="box-body col-md-12">
					{!! Form::open(array('route' => 'sub-category.store','class'=>'form-horizontal')) !!}
					<div class="form-group {{ $errors->has('sub_category_name') ? 'has-error' : '' }}">
						{{Form::label('sub_category_name', 'Name', array('class' => 'col-md-2'))}}
						<div class="col-md-8">
							{{Form::text('sub_category_name','',array('class'=>'form-control','placeholder'=>'Sub Category Name','required'))}}
							@if ($errors->has('sub_category_name'))
			                    <span class="help-block">
			                        <strong>{{ $errors->first('sub_category_name') }}</strong>
			                    </span>
				            @endif
						</div>
						<div class="col-md-2">
							{{Form::select('status', array('1' => 'Active', '2' => 'Inactive'), '1', ['class' => 'form-control'])}}
						</div>
					</div>
					<div class="form-group {{ $errors->has('sub_link') ? 'has-error' : '' }}">
                        {{Form::label('sub_link','Category Link',['class'=>'col-md-2'])}}
                        <div class="col-md-8">
                            {{Form::text('sub_link','',['class'=>'form-control','placeholder'=>'Ex: life-style','required'])}}
                            @if ($errors->has('sub_link'))
			                    <span class="help-block">
			                        <strong>{{ $errors->first('sub_link') }}</strong>
			                    </span>
				            @endif
                        </div>
                        <div class="col-md-2">
                            {{Form::number('serial_num',$max_serial,['class'=>'form-control','required','min'=>0])}}
                        </div>
                    </div>
					<div class="form-group">
							{{Form::label('sub_description', 'Description', array('class' => 'col-md-2'))}}
							<div class="col-md-10">
								{{Form::textArea('sub_description','', ['class' => 'form-control','rows'=>'3','placeholder'=>'Write something about sub category. This is helpful for seo.'])}}
							</div>
						</div>
						<div class="form-group">
                            {{Form::label('sub_keywords','Keywords',['class'=>'col-md-2'])}}
                            <div class="col-md-10">
                                {{Form::text('sub_keywords','',['class'=>'form-control','placeholder'=>'Write some keywords about this category for seo help. '])}}
                            </div>
                           
                        </div>
							{{Form::hidden('fk_category_id',$category->id)}}
					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							{{Form::submit('Submit',array('class'=>'btn btn-info'))}}
						</div>
					</div>
						
					{!! Form::close() !!}
				</div>

           	</div>
        </div>

					<table class="table table-striped table-hover table-bordered center_table" id="my_table">
						<thead>
							<tr>
								<th>SL</th>
								<th>Sub Category Name</th>
								<th>Catgeory</th>
								<th>Status</th>
								<th>Created At</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php $i=1; ?>
						@foreach($allData as $data)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$data->sub_category_name}}</td>
								<td>{{$data->category_name}}</td>
								<td><i class="{{($data->status==1)? 'fa fa-check-circle text-success' : 'fa fa-times text-danger'}}"></i></td>
								<td><?php echo date('d-M-Y',strtotime($data->created_at)); ?></td>
								<td><a href="#editModal{{$data->id}}" data-toggle="modal" class="btn btn-info btn-xs"><i class="fa fa-pencil-square"></i></a>
								<!-- Modal -->
					<div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog">
					  <div class="modal-dialog modal-lg">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title">Edit : {{$data->sub_category_name}}</h4>
					      </div>
					        {!! Form::open(array('route' => ['sub-category.update',$data->id],'class'=>'form-horizontal','method'=>'PUT')) !!}
					      <div class="modal-body">
							<div class="form-group {{ $errors->has('sub_category_name') ? 'has-error' : '' }}">
								{{Form::label('sub_category_name', 'Name', array('class' => 'col-md-2'))}}
								<div class="col-md-8">
									{{Form::text('sub_category_name',$data->sub_category_name,array('class'=>'form-control','placeholder'=>'Category Name','required'))}}
									@if ($errors->has('sub_category_name'))
					                    <span class="help-block">
					                        <strong>{{ $errors->first('sub_category_name') }}</strong>
					                    </span>
						            @endif
								</div>
								<div class="col-md-2">
									{{Form::select('status', array('1' => 'Active', '2' => 'Inactive'),$data->status, ['class' => 'form-control'])}}
								</div>
							</div>
							<div class="form-group {{ $errors->has('sub_link') ? 'has-error' : '' }}">
		                        {{Form::label('sub_link','Category Link',['class'=>'col-md-2'])}}
		                        <div class="col-md-8">
		                            {{Form::text('sub_link',$data->sub_link,['class'=>'form-control','placeholder'=>'Ex: life-style','required'])}}
		                            @if ($errors->has('sub_link'))
					                    <span class="help-block">
					                        <strong>{{ $errors->first('sub_link') }}</strong>
					                    </span>
						            @endif
		                        </div>
		                        <?php $max=$max_serial+1; ?>
								<div class="col-md-2">
									{{Form::number('serial_num',$data->serial_num, ['min'=>'1','max'=>$max,'class' => 'form-control','required'])}}
								</div>
		                    </div>
							<div class="form-group">
								{{Form::label('sub_description', 'Description', array('class' => 'col-md-2'))}}
								<div class="col-md-10">
									{{Form::textArea('sub_description',$data->sub_description, ['class' => 'form-control','rows'=>'3','placeholder'=>'Write something about sub category. This is helpful for seo.'])}}
								</div>
							</div>
							<div class="form-group">
	                            {{Form::label('sub_keywords','Keywords',['class'=>'col-md-2'])}}
	                            <div class="col-md-10">
	                                {{Form::text('sub_keywords',$data->sub_keywords,['class'=>'form-control','placeholder'=>'Write some keywords about this category for seo help. '])}}
	                            </div>
	                           
	                        </div>
							
								
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									{{Form::submit('Save changes',array('class'=>'btn btn-info'))}}
					      </div>
							{!! Form::close() !!}
					    </div><!-- /.modal-content -->
					  </div><!-- /.modal-dialog -->
					</div><!-- /.modal -->

								</td>
								<td>
									{{Form::open(array('route'=>['sub-category.destroy',$data->id],'method'=>'DELETE','id'=>'deleteForm'))}}
			            				<button type="button" class="btn btn-danger btn-xs" onclick="return deleteConfirm()"><i class="fa fa-trash"></i></button>
			        				{!! Form::close() !!}
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					<div class="pull-right">
					{{$allData->render()}}	
					</div>
				
    </div>
</div>


	

@endsection




<script type="text/javascript">

function deleteConfirm(){
  var con= confirm("Do you want to delete?");
  if(con){
    return true;
  }else 
  return false;
}
</script>