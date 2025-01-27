<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        </head>
        <title>API El tiempo</title>
    </head>
    <body>
        <?php
            //API El Tiempo - Información en https://www.el-tiempo.net/api

            // PETICIÓN DE TIPO GET
            //Creamos una variable en la que vamos a iniciar la petición.
            $peticion = curl_init();

            //Con curl_setopt podemos configurar diferentes opciones de nuestra petición.
            //Primero vamos a indicarle la url a la que lanzamos la petición.
            //La url que recibe la petición se llama EndPoint.
            curl_setopt($peticion,CURLOPT_URL,'https://www.el-tiempo.net/api/json/v2/provincias/28/municipios/28092');

            //Indicamos que nos devuelva la respuesta a nuestra petición en formato string (JSON).
            curl_setopt($peticion,CURLOPT_RETURNTRANSFER,true);

            //Ejecutamos la petición y guardamos el resultado en la variable respuesta.
            $respuesta = curl_exec($peticion);

            // Comprobamos si hay algún error y en caso afirmativo lo mostramos.
            if(curl_errno($peticion)){
                echo curl_errno($peticion);
            }else{
                // Convertimos el JSON que nos devuelve la API en un array.
                $respuesta_decodificada = json_decode($respuesta, true); // Si el segundo argumento es true convierte en array, si es false convierte en objetos.
            ?>
            <h2>El tiempo en <span style="color: blue;"><?php echo $respuesta_decodificada["municipio"]["NOMBRE_CAPITAL"]; ?></span> hoy</h2>
                <ul>
                    <li>Provincia a la que pertenece: <span style="color: blue;"><?php echo $respuesta_decodificada["municipio"]["NOMBRE_PROVINCIA"]; ?></span></li>
                    <li>Población: <span style="color: blue;"><?php echo $respuesta_decodificada["municipio"]["POBLACION_MUNI"]; ?></span> habitantes.</li>
                    <li>Temperatura mínima: <span style="color: blue;"><?php echo $respuesta_decodificada["temperaturas"]["min"]; ?></span>º</li>
                    <li>Temperatura máxima: <span style="color: blue;"><?php echo $respuesta_decodificada["temperaturas"]["max"]; ?></span>º</li>
                    <li>Estado del cielo: <span style="color: blue;"><?php echo $respuesta_decodificada["stateSky"]["description"]; ?></span></li>
                </ul>       
            <?php
                curl_close($peticion);
            }   
        ?>
        </body>
    </body>
</html>