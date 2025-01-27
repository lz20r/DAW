<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formularios PHP</title>
    </head>
    <body>
        <?php
            // Recogemos los datos de cada input por su name.
            $nombre = $_POST["nombre"]; 
            $apellidos = $_POST["apellidos"];
            $sexo = $_POST["sexo"];
            $nacionalidad = $_POST["nacionalidad"];
            $aficiones = ""; // Declaro la variable $aficiones para poder concatenarle valores más adelante.
        
            if(isset($_POST["aficiones1"])){ // Con isset (si existe) compruebo si llega por POST algún valor en "aficiones1". En caso de ser así se ejecuta el siguiente código
                $aficiones .= $_POST["aficiones1"]." "; // Con .= Concateno el valor de $_POST['aficiones1'] a la variable $aficiones.
            }
            if(isset($_POST["aficiones2"])){
                $aficiones .= $_POST["aficiones2"]." ";
            }
            if(isset($_POST["aficiones3"])){
                $aficiones .= $_POST["aficiones3"]." ";
            }
            if(isset($_POST["aficiones4"])){
                $aficiones .= $_POST["aficiones4"]." ";
            }


            // Una vez tengo todos los valores del formulario almacenados en variables procedo a mostrarlos en pantalla.
            echo "Nombre: ".$nombre."<br>";
            echo "Apellidos: ".$apellidos."<br>";
            echo "Sexo: ".$sexo."<br>";
            echo "Nacionalidad: ".$nacionalidad."<br>";
            
            if($aficiones != ""){ // Compruebo si la variable $aficiones es distinta a "" (vacio) En caso de tener contenido significa que el usuario tiene como mínimo una afición por lo que procedo a mostrarlas.
                echo "Aficiones: ".$aficiones;
            }
        ?>
    </body>
</html>
<!-- CAMBIAR TODO A GET PARA VER LA DIFERENCIA EN LA URL -->