<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura</title>

    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            border-top: 10px solid #007bff; /* Azul */
        }

        .header, .total {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #007bff; /* Azul */
        }

        .header p {
            margin: 0;
            font-size: 18px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #28a745; /* Verde */
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #e9f5e9; /* Verde claro */
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .total {
            font-size: 24px;
            font-weight: bold;
            color: #28a745; /* Verde */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>EcoMarket<br></h1>
            <h1>Factura</h1>
            
            <p>
                Fecha: {{ $sale->sale_date }}
                <br>
                Cliente: {{ $customer->first_name }}
                <br>
                Documento: {{ $customer->identification_document }}
            </p>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $detail)
                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td>${{ $detail->product->purchase_price }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>${{ $detail->product->purchase_price * $detail->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p class="total">Total: ${{ $sale->total_sale }}</p>
    </div>
</body>

</html>