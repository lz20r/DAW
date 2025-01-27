<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            color: #495057;
            margin-top: 2rem;
            font-weight: bold;
            border-bottom: 3px solid #6c757d;
            display: inline-block;
        }

        .highlight {
            font-weight: bold;
            color: #343a40;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1 class="display-4">Datos de Persona</h1>
            <p class="text-muted">Información detallada y modificaciones</p>
        </div>
        <div class="card p-4">
            <div class="card-body">
                <?php
                class Persona
                {
                    public string $nombre;
                    public string $apellidos;
                    public int $edad;
                    public string $colorPelo;
                    public int $estatura;

                    public function getNombre()
                    {
                        return $this->nombre;
                    }

                    public function getApellidos()
                    {
                        return $this->apellidos;
                    }

                    public function getEdad()
                    {
                        return $this->edad;
                    }

                    public function getColorPelo()
                    {
                        return $this->colorPelo;
                    }

                    public function getEstatura()
                    {
                        return $this->estatura;
                    }

                    public function setNombre($nombre)
                    {
                        $this->nombre = $nombre;
                    }

                    public function setApellidos($apellidos)
                    {
                        $this->apellidos = $apellidos;
                    }

                    public function setEdad($edad)
                    {
                        $this->edad = $edad;
                    }

                    public function setColorPelo($colorPelo)
                    {
                        $this->colorPelo = $colorPelo;
                    }

                    public function setEstatura($estatura)
                    {
                        $this->estatura = $estatura;
                    }

                    public function envejecer()
                    {
                        $this->edad++;
                    }

                    public function menguar()
                    {
                        $this->estatura--;
                    }
                }

                $persona1 = new Persona();
                $persona1->setNombre("Maria");
                $persona1->setApellidos("Garcia");
                $persona1->setEdad(20);
                $persona1->setColorPelo("Blanco");
                $persona1->setEstatura(160);

                echo "<h3 class='section-title'>Datos Iniciales</h3>";
                echo "<p> La persona de mi primer objeto es <span class='highlight'>" . $persona1->getNombre() ;
                echo "<p> Su apellido es <span class='highlight'>" . $persona1->getApellidos();
                echo "<p> Su edad es <span class='highlight'>" . $persona1->getEdad();
                echo "<p> Su color de pelo es <span class='highlight'>" . $persona1->getColorPelo();
                echo "<p> Mide <span class='highlight'>" . $persona1->getEstatura();

                for ($i = 0; $i < 7; $i++) {
                    $persona1->envejecer();
                }
                echo "<h3 class='section-title'>Después de Envejecer</h3>";
                echo "<p>Ahora tiene <span class='highlight'>" . $persona1->getEdad() . " años</span>.</p>";

                for ($i = 0; $i < 2; $i++) {
                    $persona1->menguar();
                }
                echo "<h3 class='section-title'>Después de Menguar</h3>";
                echo "<p> Ahora mide <span class='highlight'>" . $persona1->getEstatura() . " cm</span>.</p>";
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>