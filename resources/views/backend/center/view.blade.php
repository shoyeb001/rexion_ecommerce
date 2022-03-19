@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Pickup Cneter List <span class="badge badge-pill badge-danger"> {{ count($center) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Center Address </th>
								<th>Name</th>
								<th>Phone</th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($center as $item)
	 <tr>
		<td>{{ $item->address }}</td>
		<td>{{ $item->name }}</td>
		<td>{{$item->phone}}</td>

		<td>
 <a href="{{route("pickupcenter.edit",$item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
 <a href="{{route("pickupcenter.delete",$item->id)}}" class="btn btn-danger" title="Delete Data" id="delete">
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


<!--   ------------ Add Category Page -------- -->


          <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Pickup Center </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{route("pickupcenter.add")}}">
	 	@csrf
					   

	 <div class="form-group">
		<h5>Center Address <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="address" class="form-control" > 
	 @error('address') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>

	<div class="form-group">
		<h5>Name  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="name" class="form-control" >
     @error('name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div> 
    
	<div class="form-group">
		<h5>Phone No <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="number"  name="phone" class="form-control" > 
	 @error('phone') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">					 
						</div>
					</form>




					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>

 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection
