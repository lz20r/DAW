<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 14</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        img {
            width: 100px;
            height: 100px;
        }

        a {
            display: inline-block;
            margin: 10px;
        }

        h1 {
            text-align: center;
        }

        body {
            display: flex;
            align-items: center;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            opacity: 0.7;
        }

        @media screen and (max-width: 800px) {
            body {
                align-items: center;
                justify-content: center;
                height: 100vh;
                overflow-y: hidden;
            }

            img {
                width: 150px;
                height: 150px;
            }

            a {
                margin: 10px 0;
            }

        }

        @media screen and (max-width: 600px) {
            body {
                flex-direction: column;
            }

            a {
                margin: 10px 0;
            }

            img {
                width: 200px;
                height: 200px;
            }
        }

        @media screen and (max-width: 400px) {
            img {
                width: 200px;
                height: 200px;
            }

        }
    </style>
</head>

<body>
    <!-- 
        1º) Crea una página de index con 4 enlaces, cada uno de ellos será una de las imágenes adjuntas.
        2º) Todos los enlaces redirigen a la página perfil.php
        3º)En cada enlace envía por GET los datos de su correspondiente persona conforme a la siguiente lista:

        Carla tiene 32 años es enfermera y vive en Madrid.
        María tiene 22 años es estudiante y vive en Alicante.
        Remedios tiene 40 años es contable y vive en Granada.
        Sofía tiene 29 años es arquitecto y vive en Barcelona.
        4º) En la página de perfil.php muestra un mensaje que diga:

        Hola (nombre) tienes (edad) años, eres (profesión) y vives en (Ciudad).

        5º) Incluye también un botón para volver atrás (index.php). 
    -->
    <div class="container">
        <h1>Personas</h1>
        <div class="personas">
            <a href="../php/perfil.php?nombre=Carla&edad=32&profesion=enfermera&ciudad=Madrid"><img src="../fotos/Carla.jpg" alt="Carla"></a>
            <a href="../php/perfil.php?nombre=María&edad=22&profesion=estudiante&ciudad=Alicante"><img src="../fotos/Maria.jpg" alt="María"></a>
            <a href="../php/perfil.php?nombre=Remedios&edad=40&profesion=contable&ciudad=Granada"><img src="../fotos/Remedios.jpg" alt="Remedios"></a>
            <a href="../php/perfil.php?nombre=Sofía&edad=29&profesion=arquitecto&ciudad=Barcelona"><img src="../fotos/Sofia.jpg" alt="Sofía"></a>
        </div>
    </div>


</body>

</html>