<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formularios PHP</title>
    </head>
    <body>
        <!--
        En el atributo action="" indico la ruta a la que me llevará el formulario una vez pulsemos en Enviar. 
        Puedo elegir la forma en que enviaré los datos a la página de destino del formulario mediante method=""
        Con method="POST" los datos se enviarán de forma segura e invisible mientras que con method="GET" los datos viajan de una manera más rápida y son visibles en la URL.
        -->
        <form action="datos.php" method="POST">
    
            <span>Nombre:</span>
            
            <!-- 
            Debo indicar un atributo name="" a cada input ya que será el identificador que utilizaré en la página de destino para recoger los datos. El atributo name="" lo dejaremos vacio o lo omitiremos en los input que no tengan opciones predefinidas
            -->
            <input type="text" name="nombre" value=""> 
            <br><br><br> 
            
            <span>Apellidos:</span>
            <input type="text" name="apellidos" value="">
            <br><br><br>
            
            <!--
            En el caso de los input de tipo radio todos los del mismo grupo tendrán el mismo name
            -->
            <span>Sexo:</span>
            <input type="radio" name="sexo" value="hombre"><span>Hombre</span>
            <input type="radio" name="sexo" value="mujer"><span>Mujer</span>
            <input type="radio" name="sexo" value="no contesta"><span>No contesta</span>
            <br><br><br>
            
            <span>Nacionalidad</span>
            <select name="nacionalidad">
                <option value="espaniola">Española</option>
                <option value="portuguesa">Portuguesa</option>
                <option value="francesa">Francesa</option>
                <option value="italiana">Italiana</option>
                <option value="alemana">Alemana</option>
            </select>
            <br><br><br>

            <span>Aficiones:</span>
            <input type="checkbox" name="aficiones1" value="correr"><span>Correr</span>
            <input type="checkbox" name="aficiones2" value="leer"><span>Leer</span>
            <input type="checkbox" name="aficiones3" value="cine"><span>Ir al Cine</span>
            <input type="checkbox" name="aficiones4" value="musica"><span>Escuchar música</span>
            <br><br><br>

            <input type="submit" value="Enviar">
        </form>
    </body>
</html>