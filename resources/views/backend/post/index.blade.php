@extends('backend.app')
@section('content')
            <div class="row">
                <div class="col-lg-12 no-padding">
                    <div class="panel panel-default page-panel">
                        <div class="panel-heading">
                            All Posts
                            <div class="panel-btn pull-right">
                            	<a href="{{URL::to('posts-admin/create')}}" class="btn btn-primary btn-sm" > <i class="fa fa-plus"></i> Add New</a>
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
                                    @foreach($allData as $data)
                                    <? $i++; ?>
                        			<tr>
                        				<td>{{$i}}</td>
                                        <td>{{$data->title}} 
                                        @if($data->is_pin==1)
                                        <span class="badge">F</span>
                                        @elseif($data->is_pin==2)
                                        <span class="badge">Pin</span>
                                        @endif
                                        <span class="badge">{{$data->hit}}</span>

                                        </td>
                                        <td>{{$data->category_name}}<br><small>({{$data->sub_category_name}})</small></td>
                                        <td>{{$data->user_name}}</td>
                        				<td>{{date('d-m-Y',strtotime($data->created_at))}}</td>
                        				<td style="text-align: center">
                                            {{Form::open(array('route'=>['posts-admin.destroy',$data->id],'method'=>'DELETE','id'=>"deleteForm$data->id"))}}
                        					<a href='{{URL::to("posts-admin/$data->id/edit")}}' class="btn btn-info btn-xs"> <i class="fa fa-pencil-square"></i></a>
                                            <button type="button" class="btn btn-danger btn-xs" onclick='return deleteConfirm("deleteForm{{$data->id}}")'><i class="fa fa-trash"></i></button>
                                        {!! Form::close() !!}

                        				</td>
                        			</tr>
                                    @endforeach
                        		</tbody>
                        		
                        	</table>
                        </div>
                        {{$allData->render()}}
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        


@endsection