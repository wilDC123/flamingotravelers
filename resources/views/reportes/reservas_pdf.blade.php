<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Reservas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            color: #2C3E50;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th {
            background-color: #3498DB;
            color: white;
            padding: 15px;
            text-align: center;
        }

        td {
            padding: 12px;
            text-align: center;
            font-size: 14px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e8f4fc;
        }

        .container {
            width: 90%;
            margin: auto;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #888;
            font-size: 12px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Reporte de Reservas</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Cliente</th>
                    <th>Fecha Inicio</th>
                    <th>Personas</th>
                    <th>Estado</th>
                    <th>Destino ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->client->first_name }}</td> <!-- Asume que hay una relación con el cliente -->
                        <td>{{ $reservation->start_date }}</td>
                        <td>{{ $reservation->number_people }}</td>
                        <td>{{ $reservation->status }}</td>
                        <td>{{ $reservation->destination_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>Generado el {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
        </div>
    </div>

</body>
</html>

