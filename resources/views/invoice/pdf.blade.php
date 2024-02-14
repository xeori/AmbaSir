<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembelian</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .total {
            font-weight: bold;
            border-top: 2px solid #333;
            margin-top: 10px;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
   
   
        <div class="header">
            <h2>Struk Pembelian</h2>
             <p>cancut</p> 
           
        </div>

        <div class="item">
            <span>Nama Barang 1</span>
            <span>Rp 50,000</span>
        </div>

        <div class="item">
            <span>Nama Barang 2</span>
            <span>Rp 30,000</span>
        </div>

        <div class="total">
            <span>Total:</span>
            <span>Rp 80,000</span>
        </div>
      
    </div>
</body>
</html>
`