<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Condicional if - II</title>
    </head>
    <body>
        <?php
            $ingresos = "5000";
        
            if($ingresos <= 12450){
                echo "Primer tramo de IRPF 19%";
            }elseif($ingresos <= 20200){ // Con elseif puedo realizar otra comprobación en caso de que la primera devuelva falso.
                echo "Segundo tramo de IRPF 24%";
            }elseif($ingresos <= 35200){ // Puedo seguir anidando tantos elseif como necesite. En cuanto uno de ellos devuelva verdadero la ejecución se detendrá.
                echo "Tercer tramo de IRPF 30%";
            }elseif($ingresos <= 60000){
                echo "Cuarto tramo de IRPF 37%";
            }elseif($ingresos <= 300000){
                echo "Quinto tramo de IRPF 45%";
            }elseif($ingresos > 300000){
                echo "Sexto tramo de IRPF 47%";
            }else{
                echo "Ingresos erroneos";
            }
        ?>
    </body>
</html>