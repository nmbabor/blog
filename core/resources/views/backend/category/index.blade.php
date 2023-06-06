@extends('backend.app')
@section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default page-panel">
                        <div class="panel-heading">
                            All Categories
                            <div class="panel-btn pull-right">
                            	<a href="{{URL::to('category/create')}}" class="btn btn-primary btn-sm" > <i class="fa fa-plus"></i> Add New</a>
                            </div>
                        </div>
                        <div class="panel-body">
                        	<table class="table table-striped table-bordered">
                        		<thead>
                        			<tr>
                        				<th width="5%">SL</th>
                        				<th>Category Name</th>
                        				<th>Created At</th>
                        				<th>Sub Category</th>
                        				<th width="7%">Action</th>
                        			</tr>
                        		</thead>
                        		<tbody>
                                    <?php $i=0; ?>
                                    @foreach($allData as $data)
                                    <?php $i++; ?>
                        			<tr>
                        				<td>{{$i}}</td>
                                        <td>{{$data->category_name}}</td>
                        				<td>{{date('d-m-Y',strtotime($data->created_at))}}</td>

                        				<td><a href='{{URL::to("sub-category/$data->id")}}' class="btn btn-warning btn-xs">Sub Category ({{DB::table('sub_categories')->where('fk_category_id',$data->id)->count()}})</a></td>
                        				<td style="text-align: center">
                                            {{Form::open(array('route'=>['category.destroy',$data->id],'method'=>'DELETE','id'=>'deleteForm'))}}
                        					<a href='{{URL::to("category/$data->id/edit")}}' class="btn btn-info btn-xs"> <i class="fa fa-pencil-square"></i></a>
                                            <button type="button" class="btn btn-danger btn-xs" onclick="return deleteConfirm()"><i class="fa fa-trash"></i></button>
                                        {!! Form::close() !!}

                        				</td>
                        			</tr>
                                    @endforeach
                        		</tbody>
                        		
                        	</table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        


@endsection