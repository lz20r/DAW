<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Ordenadores</title>
</head>

<body>
    <h1>Gestión de Ordenadores</h1>

    <?php

    // 1. Interface Ordenador
    interface Ordenador
    {
        public function encender();
        public function apagar();
        public function reiniciar();
        public function suspender();
    }

    // 2. Clase Portatil
    class Portatil implements Ordenador
    {
        private $estado;
        private $marca;
        private $modelo;
        private $procesador;
        private $anio;
        private $pantalla;
        private $bateria;
        private $cargador;
        private $touchpad;

        public function __construct($estado, $marca, $modelo, $procesador, $anio, $pantalla, $bateria, $cargador, $touchpad)
        {
            $this->estado = $estado;
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->procesador = $procesador;
            $this->anio = $anio;
            $this->pantalla = $pantalla;
            $this->bateria = $bateria;
            $this->cargador = $cargador;
            $this->touchpad = $touchpad;
        }

        public function __destruct()
        {
            echo "<p>Objeto {$this->marca} {$this->modelo} ha sido destruido</p>\n";
        }

        public function encender()
        {
            $this->estado = "encendido";
        }

        public function apagar()
        {
            $this->estado = "apagado";
        }

        public function reiniciar()
        {
            $this->estado = "reiniciando";
        }

        public function suspender()
        {
            $this->estado = "suspendido";
        }

        public function getEstado()
        {
            return $this->estado;
        }
    }

    // 3. Clase Sobremesa
    class Sobremesa implements Ordenador
    {
        private $estado;
        private $marca;
        private $modelo;
        private $procesador;
        private $anio;
        private $monitor;
        private $teclado;
        private $raton;
        private $altavoces;

        public function __construct($estado, $marca, $modelo, $procesador, $anio, $monitor, $teclado, $raton, $altavoces)
        {
            $this->estado = $estado;
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->procesador = $procesador;
            $this->anio = $anio;
            $this->monitor = $monitor;
            $this->teclado = $teclado;
            $this->raton = $raton;
            $this->altavoces = $altavoces;
        }

        public function __destruct()
        {
            echo "<p>Objeto {$this->modelo} ha sido destruido</p>\n";
        }

        public function encender()
        {
            $this->estado = "encendido";
        }

        public function apagar()
        {
            $this->estado = "apagado";
        }

        public function reiniciar()
        {
            $this->estado = "reiniciando";
        }

        public function suspender()
        {
            $this->estado = "suspendido";
        }

        public function getEstado()
        {
            return $this->estado;
        }
    }

    // 4. Instancia de Portatil
    $portatil = new Portatil(
        "apagado",
        "HP",
        "Pavilion",
        "Intel Core i5",
        2019,
        15.6,
        true,
        false,
        true
    );

    // 5. Encender el portátil y mostrar su estado
    $portatil->encender();
    echo "<p>Estado del portátil: " . $portatil->getEstado() . "</p>\n";

    // 6. Instancia de Sobremesa
    $sobremesa = new Sobremesa(
        "apagado",
        "HP",
        "Elite 8300",
        "Intel Core i7",
        2017,
        true,
        true,
        true,
        false
    );

    // 7. Encender el sobremesa y mostrar su estado
    $sobremesa->encender();
    echo "<p>Estado del sobremesa: " . $sobremesa->getEstado() . "</p>\n";

    // 8. Reiniciar el sobremesa y mostrar su estado
    $sobremesa->reiniciar();
    echo "<p>Estado del sobremesa: " . $sobremesa->getEstado() . "</p>\n";

    // 9. Suspender el sobremesa y mostrar su estado
    $sobremesa->suspender();
    echo "<p>Estado del sobremesa: " . $sobremesa->getEstado() . "</p>\n";

    ?>

</body>

</html>