<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SELECT</title>
    </head>
    <body>
        <?php
            // 1º Creamos la conexión a la base de datos.

            // Para hacerlo más sencillo primero guardaremos en variables los 4 valores necesarios para realizar la conexión (dirección del servidor, nombre de usuario, contraseña y nombre de la base de datos).

            $server = "localhost"; // Dirección del servidor MySQL (cuando el servidor web y el servidor MySQL están en el mismo equipo se utiliza localhost en caso de que el servidor esté en otra máquina pondremos la url o IP del servidor).

            $username = "root"; // Nombre de usuario de la base de datos a la que nos vamos a conectar. En Xampp es root para todas las bases de datos.

            $password = ""; // Contraseña de la base de datos. En Xampp no hay contraseña y se deja vacío, en un servidor real debemos establecer esta contraseña al crear la base de datos.

            $dbname = "ejercicio"; // Nombre de la base de datos a la que nos queremos conectar.

	        $mysqli = new mysqli($server, $username, $password, $dbname); //Creamos la conexión a la base de datos con la función mysqli() y le pasamos los argumentos con los datos guardados previamente en variables. Es muy importante que el orden sea el del ejemplo.

            //El siguiente código para crear la conexión es igual de válido que el anterior pero sin necesidad de guardar en variables los datos de conexión.

            //$mysqli = new mysqli("localhost","root","","ejercicio");

            // El siguiente if comprueba si la conexión es correcta y en caso de fallo muestra el error. No es necesario pero ayuda en caso de fallo en la conexión con la base de datos.
		    if($mysqli->connect_errno){
                echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            
            //Creamos la sentencia SQL en la que determinaremos de que tabla o tablas vamos a extraer los datos y las columnas de las que extraer los datos.
            
            $sql = "SELECT * FROM contactos"; // En este caso queremos extraer todos los datos de la tabla contactos.

            $resultado = mysqli_query($mysqli, $sql); // Ejecutamos la consulta con la función mysqli_query() donde pasaremos como primer argumento la conexión y como segundo argumento la consulta SQL. Guardamos el resultado en la variable $resultado para poder operar con ella.

            //Creamos un if en el que comprobamos si nuestro resultado tiene al menos 1 resultado con la función mysqli_num_rows() pasando como argumento el resultado de la consulta SQL.

            if(mysqli_num_rows($resultado)){
                // Usamos un bucle while en el cual vamos a crear una matriz llamada $fila. En esta matriz se van a volcar todos los datos del resultado de la consulta. Con la función mysqli_fetch_assoc() a la que le pasamos como argumento el resultado de la consulta SQL.
                while($fila = mysqli_fetch_assoc($resultado)){
                    // Ahora creamos el código que se repetirá por cada fila que contenga la tabla. Accederemos a los elementos de la matriz utilizando $fila["nombre_columna_tabla"].
                    echo $fila["id"];
                    echo "<br>";
                    echo $fila["nombre"];
                    echo "<br>";
                    echo $fila["apellidos"];
                    echo "<br>";
                    echo $fila["telefono"];
                    echo "<br>";
                    echo "<br>";
                }        
            }else{
                // No es obligatorio pero si muy aconsejable definir un mensaje para el caso en el que la consulta no obtenga resultados.
                echo "Sin resultados";
            }
        ?>
    </body>
</html>