@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">

	 <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Admin User </h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
	 <form method="POST" action="{{route("update.admin.user")}}" enctype="multipart/form-data" >
	 	@csrf

	 	<input type="hidden" name="id" value="{{ $adminuser->id }}">	
	 <input type="hidden" name="old_image" value="{{ $adminuser->profile_photo_path }}">



					  <div class="row">
						<div class="col-12">

			<div class="row">
				<div class="col-md-6">

	 <div class="form-group">
		<h5>Admin User Name  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="name" class="form-control" value="{{ $adminuser->name }}" > </div>
	</div>
					
				</div> <!-- end cold md 6 -->



				<div class="col-md-6">

	  <div class="form-group">
		<h5>Admin Email  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="email" name="email" class="form-control" value="{{ $adminuser->email }}" > </div>
	</div>
					
				</div> <!-- end cold md 6 --> 
				
			</div>	<!-- end row 	 -->	




	<div class="row">
				<div class="col-md-6">

	 <div class="form-group">
		<h5>Admin User Phone  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="phone" class="form-control" value="{{ $adminuser->phone }}" > </div>
	</div>
					
				</div> <!-- end cold md 6 -->



				 
				
			</div>	<!-- end row 	 -->	







	 <div class="row">

				<div class="col-md-6">
		<div class="form-group">
		<h5>Admin User Image <span class="text-danger">*</span></h5>
		<div class="controls">
 <input type="file" name="profile_photo_path" class="form-control" id="image"> </div>
	</div>
				</div><!-- end cold md 6 --> 

				<div class="col-md-6">
	<img id="showImage" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; height: 100px;">				

				</div><!-- end cold md 6 -->  
			</div><!-- end row 	 -->	



	 <hr>
 


	<div class="row">

<div class="col-md-4">
			<div class="form-group">
			 
		<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_2" name="brand" value="1" {{ $adminuser->brands == 1 ? 'checked' : '' }}>
				<label for="checkbox_2">Brand</label>
			</fieldset>
			<fieldset>
				<input type="checkbox" id="checkbox_3" name="category" value="1" {{ $adminuser->categories == 1 ? 'checked' : '' }}>
				<label for="checkbox_3">Category</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_4" name="product" value="1" {{ $adminuser->products == 1 ? 'checked' : '' }}>
				<label for="checkbox_4">Product</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_5" name="slider" value="1" {{ $adminuser->sliders == 1 ? 'checked' : '' }}>
				<label for="checkbox_5">Slider</label>
			</fieldset>

			{{--<fieldset>
				<input type="checkbox" id="checkbox_6" name="coupons" value="1" {{ $adminuser->coupons == 1 ? 'checked' : '' }}>
				<label for="checkbox_6">Coupons</label>
			</fieldset>--}}
		</div>
	</div>
</div>



<div class="col-md-4">
			<div class="form-group">
			 
		<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_9" name="setting" value="1" {{ $adminuser->settings == 1 ? 'checked' : '' }}>
				<label for="checkbox_9">Setting</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_12" name="orders" value="1" {{ $adminuser->orders == 1 ? 'checked' : '' }}>
				<label for="checkbox_12">Orders</label>
			</fieldset>

            <fieldset>
				<input type="checkbox" id="checkbox_13" name="stock" value="1" {{ $adminuser->stocks == 1 ? 'checked' : '' }}>
				<label for="checkbox_13">Stock</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_10" name="returnorder" value="1" {{ $adminuser->returnorders == 1 ? 'checked' : '' }}>
				<label for="checkbox_10">Return Order</label>
			</fieldset>

		
		</div>
	</div>
</div>




<div class="col-md-4">
	<div class="form-group">
		 
		<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_14" name="reports" value="1" {{ $adminuser->reports == 1 ? 'checked' : '' }}>
				<label for="checkbox_14">Reports</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_15" name="alluser" value="1" {{ $adminuser->alluser == 1 ? 'checked' : '' }}>
				<label for="checkbox_15">Alluser</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_16" name="adminuserrole" value="1" {{ $adminuser->manage_admins == 1 ? 'checked' : '' }}>
				<label for="checkbox_16">Adminuserrole</label>
			</fieldset>
			
			<fieldset>
				<input type="checkbox" id="checkbox_17" name="refer_earn" value="1" {{ $adminuser->refer_earn == 1 ? 'checked' : '' }}>
				<label for="checkbox_17">Refer Earn</label>
			</fieldset>
		</div>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		 
		<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_18" name="reports" value="1" {{ $adminuser->pickup_center == 1 ? 'checked' : '' }}>
				<label for="checkbox_18">Pickup Center</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_19" name="alluser" value="1" {{ $adminuser->invoice == 1 ? 'checked' : '' }}>
				<label for="checkbox_19">Invoice</label>
			</fieldset>

			
		</div>
	</div>
</div>
						</div>


	
	  

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Admin User">					 
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
 


	  </div>


<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
			 $('#showImage').attr('src',e.target.result);	
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>


@endsection