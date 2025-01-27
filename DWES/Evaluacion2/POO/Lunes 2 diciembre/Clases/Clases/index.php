<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Programación orientada a objetos en PHP (POO)

        // LAS CLASES
        // Las clases son un modelo que se utiliza para crear objetos que comparten un mismo comportamiento, estado e identidad. Podemos decir que es como un molde con el que creamos nuestros objetos.

        // Las clases se detinen con la palabra reservada class seguida del nombre de la clase y un bloque de código que contiene las propiedades y métodos de la clase.
        class Coche{
            // Los atributos o propiedades son las características que puede tener un objeto de una clase (variables).
            public $color = "Verde";
            public $modelo = "Kona";
            public $marca = "Hyundai";
            public $velocidad = 100;
            public $plazas = 5;
            
            // Los métodos son la implementación de las acciones que puede hacer un objeto (son funciones que definen el comportamiento de la clase).
            public function getColor(){
                // $this-> hace referencia al objeto que estemos utilizando
                return $this->color;
            }

            public function setColor($color){
                $this->color = $color;
            }

            public function acelerar(){
                $this->velocidad++;
            }

            public function frenar(){
                $this->velocidad--;
            }

            public function getVelocidad(){
                return $this->velocidad;
            }
        }
        // Fin de la definición de la clase

        // Creamos un objeto (Instanciar la clase) de tipo coche
        $coche = new Coche();
        
        // Mostramos en un var_dump o print_r el objeto coche
        echo "<pre>";
        print_r($coche);
        echo "</pre>";

        // Utilizamos los métodos para que el objeto realice funciones
        // Para ver la velocidad del coche utilizamos el método getVelocidad() con $this->
        echo "El coche va a una velocidad de: ";
        echo $coche->getVelocidad();
        echo "<br>";

        // También podemos modificar los valores de las propiedades con los métodos
        $coche->setColor("Rojo");
        echo "El color del coche ahora es: ";
        echo $coche->getColor();
        echo "<br>";

        // Podemos utilizar varias veces un método para que el objeto realice varias veces la misma función
        $coche->acelerar();
        $coche->acelerar();
        $coche->acelerar();
        $coche->acelerar();
        echo "El coche ahora va a una velocidad de: ";
        echo $coche->getVelocidad();
        echo "<br>";

        // Podemos crear más objetos de la misma clase
        $coche2 = new Coche();
        $coche2->setColor("Azul");
        echo "El color del coche 2 es: ";
        echo $coche2->getColor();
        echo "<br>";

        // Mostramos un print_r de los dos objetos
        echo "<pre>";
        print_r($coche);
        print_r($coche2);
        echo "</pre>";
    ?>
</body>
</html>