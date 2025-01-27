<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 15</title>

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: black;
        }

        #container {
            text-align: center;
        }

        h1 {
            color: white;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        form {
            color: white;
            display: flex;
            flex-direction: column;
        }

        select {
            margin: 10px;
        }

        input {
            margin: 10px;
            padding: 5px;
            background-color: white;
            color: black;
            border: none;
            cursor: pointer;
        }

        p {
            color: white;
        }

        a {
            text-decoration: underline;
            color: white;
        }
    </style>
</head>

<body>
    <!--
        1º) Crea un formulario que pida al usuario número de refrescos y número de bocadillos (cada uno en un select) con valores del 0 al 5

        2º) En la página de destino del formulario muestra:
        - Cantidad de refrescos.
        - Importe refresco por unidad X€.
        - Total refrescos: XX€
        - Cantidad de bocadillos.
        - Importe bocadillo por unidad X€.
        - Total bocadillos: XX€
        - Muestra el importe total del pedido antes de aplicar ningún descuento.

        3º) Crea una función que sume el total del importe de los refrescos y el total del importe de los bocadillos (2 argumentos).
        - Si el importe total es inferior a 10€ el descuento es de 0€.
        - Si el importe total es inferior a 14€ el descuento es de 2€.
        - Si el importe total es inferior a 24€ el descuento es de 4€.
        - Si el importe total es superior a 25€ el descuento es de 6€.

        4º) Muestra el descuento que se le aplica al cliente X€
        5º) Muestra el total a pagar: X€

        *Los refrescos valen 2€ y los bocadillos 5€
    -->

    <div id="container">
        <h1> Ejercicio 15 </h1>
        <div class="container">
            <form action="ej15.php" method="post">
                <label for="refrescos">Refrescos</label>
                <select name="refrescos" id="refrescos">
                    <?php
                    for ($i = 0; $i <= 5; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
                <label for="bocadillos">Bocadillos</label>
                <select name="bocadillos" id="bocadillos">
                    <?php
                    for ($i = 0; $i <= 5; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['refrescos']) && isset($_POST['bocadillos'])) {
        $refrescos = $_POST['refrescos'];
        $bocadillos = $_POST['bocadillos'];
        $precioRefresco = 2;
        $precioBocadillo = 5;

        $totalRefrescos = $refrescos * $precioRefresco;
        $totalBocadillos = $bocadillos * $precioBocadillo;
        $totalPedido = $totalRefrescos + $totalBocadillos;

        function calcularDescuento($totalRefrescos, $totalBocadillos)
        {
            $total = $totalRefrescos + $totalBocadillos;
            $descuento = 0;
            if ($total < 10) {
                $descuento = 0;
            } elseif ($total < 14) {
                $descuento = 2;
            } elseif ($total < 24) {
                $descuento = 4;
            } elseif ($total > 25) {
                $descuento = 6;
            }
            return $descuento;
        }

        $descuento = calcularDescuento($totalRefrescos, $totalBocadillos);
        $totalPagar = $totalPedido - $descuento;

        echo "<div id='container'>";
        echo "<h1>Resumen del pedido</h1>";
        echo "<p>Cantidad de refrescos: $refrescos</p>";
        echo "<p>Importe refresco por unidad $precioRefresco €</p>";
        echo "<p>Total refrescos: $totalRefrescos €</p>";
        echo "<p>Cantidad de bocadillos: $bocadillos</p>";
        echo "<p>Importe bocadillo por unidad $precioBocadillo €</p>";
        echo "<p>Total bocadillos: $totalBocadillos €</p>";
        echo "<p>Importe total del pedido: $totalPedido €</p>";
        echo "<p>Descuento: $descuento €</p>";
        echo "<p>Total a pagar: $totalPagar €</p>";
        echo "</div>";
    }
    ?>
</body>

</html>