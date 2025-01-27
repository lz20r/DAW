<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PeppaPig PHP Loop</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Números del 1 al 100 - PeppaPig</h1>
    <table>
        <tr>
            <?php
            for ($i = 1; $i <= 100; $i++) {
                echo "<td>";
                if ($i % 3 == 0 && $i % 5 == 0) {
                    echo "PeppaPig";
                } elseif ($i % 3 == 0) {
                    echo "Peppa";
                } elseif ($i % 5 == 0) {
                    echo "Pig";
                } else {
                    echo $i;
                }
                echo "</td>";

                // Romper la fila cada 10 números
                if ($i % 10 == 0) {
                    echo "</tr><tr>";
                }
            }
            ?>
        </tr>
    </table>
</body>

</html>