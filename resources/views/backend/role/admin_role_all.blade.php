@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Total Admin User </h3>
<a href="{{route("add.admin.user")}}" class="btn btn-danger" style="float: right;">Add Admin User</a>

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image  </th>
								<th>Name  </th>
								<th>Email </th> 
								<th>Access </th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($adminuser as $item)
	 <tr>
		<td> <img src="{{ asset($item->profile_photo_path) }}" style="width: 50px; height: 50px;">  </td>
		<td> {{ $item->name }}  </td>
		<td>  {{ $item->email  }}  </td>

		<td>
			@if($item->brands == 1)
			<span class="badge btn-primary">Brand</span>
			@else
			@endif

			@if($item->categories == 1)
			<span class="badge btn-secondary">Category</span>
			@else
			@endif


			@if($item->products == 1)
			<span class="badge btn-success">Product</span>
			@else
			@endif


			@if($item->sliders == 1)
			<span class="badge btn-danger">Slider</span>
			@else
			@endif


			{{--@if($item->coupons == 1)
			<span class="badge btn-warning">Coupons</span>
			@else
			@endif--}}



			@if($item->setting == 1)
			<span class="badge btn-dark">Setting</span>
			@else
			@endif


			@if($item->returnorder == 1)
			<span class="badge btn-primary">Return Order</span>
			@else
			@endif


			@if($item->orders == 1)
			<span class="badge btn-success">Orders</span>
			@else
			@endif

			@if($item->stocks == 1)
			<span class="badge btn-danger">Stock</span>
			@else
			@endif

			@if($item->reports == 1)
			<span class="badge btn-warning">Reports</span>
			@else
			@endif

			@if($item->alluser == 1)
			<span class="badge btn-info">Alluser</span>
			@else
			@endif

			@if($item->manage_admin == 1)
			<span class="badge btn-dark">Adminuserrole</span>
			@else
			@endif
			@if($item->refer_earn == 1)
			<span class="badge btn-dark">Refer & earn</span>
			@else
			@endif

			@if($item->pickup_center == 1)
			<span class="badge btn-info">Pickup Center</span>
			@else
			@endif

			@if($item->invoice == 1)
			<span class="badge btn-warning">Invoice</span>
			@else
			@endif
 
 

		  </td>
		 

		<td width="25%">
 <a href="{{route("edit.admin.user",$item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>

 <a href="{{route("delete.role",$item->id)}}" class="btn btn-danger" title="Delete" id="delete">
 	<i class="fa fa-trash"></i></a>
		</td>
							 
	 </tr>
	  @endforeach
						</tbody>
						 
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			          
			</div>
			<!-- /.col -->

 

 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection