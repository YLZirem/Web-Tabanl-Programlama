<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tek Sayılar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f9;
            color: #333;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 30%;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>1-100 Arası Tek Sayılar</h1>
    <table>
        <thead>
            <tr>
                <th>Tek Sayı</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 1; $i <= 100; $i += 2) {
                echo "<tr>
                        <td>{$i}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
