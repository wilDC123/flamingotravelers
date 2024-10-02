<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Pagos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Reporte de Pagos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Método de Pago</th>
                <th>Monto</th>
                <th>Fecha</th>
                <th>Tipo de Moneda</th>
                <th>ID de Reserva</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->method }}</td>
                    <td>{{ number_format($payment->amount, 2) }} Bs.</td>
                    <td>{{ $payment->date }}</td>
                    <td>{{ $payment->currency_type }}</td>
                    <td>{{ $payment->reservation_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
