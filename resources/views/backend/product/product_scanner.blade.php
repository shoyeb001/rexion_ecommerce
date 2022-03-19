@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Product </h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{route("add.invoice")}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Product Code <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" id="product_code" name="product_code" class="form-control"
                                                    required="">
                                                    <p class="text-center mt-3"><button class="btn btn-primary" type="button" id="getinfo">Get Info</button></p>
                                                @error('product_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- start 1st row  -->
                                            

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name" class="form-control" id="product_name"
                                                            required="" value="" >
                                                        @error('product_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 2nd row  -->



                                        <div class="row">
                                            <!-- start 3RD row  -->
                                            {{-- <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_code" class="form-control"
                                                            required="">
                                                        @error('product_code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- end col md 4 --> --}}

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_qty" class="form-control"
                                                            required="" id="product_qty" value="">
                                                        @error('product_qty')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->


                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Tags <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags" class="form-control"
                                                            value="hello" id="product_tags" style="color: #fff"  required="" >
                                                        @error('product_tags')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 3RD row  -->






                                        <div class="row">
                                            <!-- start 4th row  -->
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Size<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size" class="form-control"
                                                            value="" id="product_size" style="color: #fff">
                                                        @error('product_size')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->
                                        </div> <!-- end 4th row  -->



                                        <div class="row">
                                            <!-- start 5th row  -->
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Color<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color" class="form-control"
                                                            value="" id="product_color" style="color: #fff">
                                                        @error('product_color')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Purchase Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="number" name="purchase_price" class="form-control" id="purchase_price"
                                                            required="" step="0.01">
                                                        @error('purchase_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="number" name="selling_price" class="form-control" id="selling_price"
                                                            required="" step="0.01">
                                                        @error('selling_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 5th row  -->




                                        <div class="row">
                                            <!-- start 6th row  -->
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount_price" class="form-control" id="discount_price"
                                                            required="" step="0.01">
                                                        @error('discount_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>GST <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="gst" class="form-control" id="gst"
                                                            required="" >
                                                        @error('gst')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Customer Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="customer_name" class="form-control" id="discount_price">
                                                        @error('customer_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 6th row  -->





                                     {{--  <div class="row">
                                            <!-- start 7th row  -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Short Description <span class="text-danger">*</span></h5>
                                                    <div class="controls" id="short_desc">
                                                        <textarea name="short_descp" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->



                                        </div> <!-- end 7th row  -->





                                        <div class="row">
                                            <!-- start 8th row  -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Long Description <span class="text-danger">*</span></h5>
                                                    <div class="controls" id="long_descp">
                                                        <textarea class="a1" id="a1" name="long_descp" rows="10" cols="80"
                                                            required="">
                                  
                                          </textarea>
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->
                                        </div> <!-- end 8th row  -->--}}



                                        <hr>



                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_2" name="hot_deals"
                                                                value="1">
                                                            <label for="checkbox_2">Hot Deals</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_3" name="featured"
                                                                value="1">
                                                            <label for="checkbox_3">Featured</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_4" name="special_offer"
                                                                value="1">
                                                            <label for="checkbox_4">Special Offer</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_5" name="special_deals"
                                                                value="1">
                                                            <label for="checkbox_5">Special Deals</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-success" value="Add to Invoice">
                                        <a style="margin-left: 30px" href="{{route("invoice.view")}}" class="btn btn-success">View Invoice</a>

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
        <!-- /.content -->

        
       
    </div>
  {{--  <script type="text/javascript">
       let code = "";
let reading = false;

document.addEventListener('keypress', e => {
  //usually scanners throw an 'Enter' key at the end of read
   if (e.keyCode === 13) {
          if(code.length > 10) {
            console.log(code);
            /// code ready to use                
            code = "";
         }
    } else {
        code += e.key; //while this is not an 'enter' it stores the every key            
    }

    //run a timeout of 200ms at the first read and clear everything
    if(!reading) {
        reading = true;
        setTimeout(() => {
            code = "";
            reading = false;
        }, 200);  //200 works fine for me but you can adjust it
    }
    document.getElementById("product_code").value=code;

});
    </script>--}}

    <script type="text/javascript">
           
           $(document).ready(function() {
            $('#product_code').on('change', function() {
                var $p_code = $(this).val();
                if ($p_code) {
                    $.ajax({
                        url: "{{ url('/scan/data/ajax') }}/" + $p_code,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                           //const new_data =  JSON.stringify(data)
                           //console.log(new_data);
                            //myObj = JSON.parse(new_data);
                            //console.log(new_data.id);

                            $.each(data, function(key, value) {
                                $("#product_name").val(value.product_name);
                                $("#product_qty").val(value.product_qty);
                                $("#product_tags").val(value.product_tags);
                                $("#product_size").val(value.product_size);
                                $("#product_tags").val(value.product_tags);
                                $("#product_color").val(value.product_color);
                                $("#purchase_price").val(value.purchase_price);
                                $("#selling_price").val(value.selling_price);
                                $("#discount_price").val(value.discount_price);
                                $("#gst").val(value.gst);

                              // $("#short_desc").append(' <textarea name="short_descp" id="textarea" class="form-control" required placeholder="Textarea text">'+value.short_descp+'</textarea>');
                              $("#textarea").html(value.short_descp);
                               $("#a1").html(value.long_descp);
                             //  $("#long_descp").append(' <textarea id="editor1" class="long_descp" name="long_descp" rows="10" cols="80" required="">'+value.long_descp+'</textarea>')
                             if (value.hot_deals == 1) {
                                $("#checkbox_2").attr("checked","");
                             }
                             if (value.featured == 1) {
                                $("#checkbox_3").attr("checked","");
                             }
                             if (value.special_offer == 1) {
                                $("#checkbox_4").attr("checked","");
                             }
                             if (value.special_deals == 1) {
                                $("#checkbox_5").attr("checked","");
                             }
                                



                            });
                            
                        },
                    });
                } else {
                    alert('danger');
                }
            });

            

        });



        



       
    </script>




@endsection
