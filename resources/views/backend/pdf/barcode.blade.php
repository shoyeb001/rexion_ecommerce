<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-6" style="width: 50%; float:left">
            @for ($i = 0; $i < 16; $i++)
            {!! DNS1D::getBarcodeHTML($product_code, 'C128', 1.6, 25) !!}<br><br>
            @endfor
        </div>
        <div class="col-6" style="width: 50%; float:right">
            @for ($i = 0; $i < 16; $i++)
            {!! DNS1D::getBarcodeHTML($product_code, 'C128', 1.6, 25) !!}<br><br>
            @endfor
        </div>
    </div>
</body>
</html>