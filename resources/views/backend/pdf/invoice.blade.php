<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h4 style="text-align: center">Glorious Plus pvt.Ltd</h4>
   <p style="text-align: center">Ena Islampur, Bastacolla, Dhanbad, Jharkhand – 828111</p>
   <p style="text-align: center">Phone: 9431323382</p>
   <p style="text-align: center"><b>Invoice</b></p>
   <p><b>Byuer Name:</b> {{$data[0]->customer_name}}<br>
   <b>Date:</b> {{ Carbon\Carbon::now()->format('d F Y')}}</p>


   <table>
       <tr>
           <th style="width: 20%">Product</th>
           <th style="width: 20%">Price</th>
           <th style="width: 20%">GST</th>
           <th style="width: 20%">Qty</th>
           <th style="width: 20%">Total</th>
       </tr>
       <?php  $total = 0 ?>
       @foreach ($data as $item)
           <tr>
               <td>{{$item->product_name}}</td>
               <td>{{ number_format($item->price,2)}}</td>
               <td>{{$item->gst}}</td>
               <td>{{$item->quantity}}</td>
               <td>{{ number_format($item->total_price,2)}}</td>
           </tr>
          <?php
            $total = $total + $item->total_price
          ?>
       @endforeach
       <tr>
           <td><b>Total</b></td>
           <td></td>
           <td></td>
           <td></td>
           <td>{{number_format($total,2)}}</td>
       </tr>
   </table>
</body>
</html>