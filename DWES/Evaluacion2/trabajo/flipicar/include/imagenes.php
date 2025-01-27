<?php
// Conexión a la base de datos
include 'conexion.php';

// Obtener marca y modelo desde los parámetros de la URL
$marca = $_GET['marca'] ?? null;
$modelo = $_GET['modelo'] ?? null;

if (!$marca || !$modelo) {
    die("Marca y modelo no proporcionados.");
}

// Consulta para obtener la galería basada en la marca y modelo
$query = "SELECT gallery FROM coches WHERE marca = ? AND modelo = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ss", $marca, $modelo);
$stmt->execute();
$result = $stmt->get_result();
$coche = $result->fetch_assoc();

// Validar si se encontró el coche y la galería
if (!$coche) {
    die("No se encontraron imágenes para la marca y modelo especificados.");
}

// Decodificar la galería JSON
$gallery = json_decode($coche['gallery'], true);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Imágenes - <?= htmlspecialchars($marca) . ' ' . htmlspecialchars($modelo) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <style>
        .gallery-container {
            width: 100%;
            max-width: 900px;
            margin: 50px auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .thumbnail-container {
            margin-top: 10px;
            display: flex;
            justify-content: center;
            gap: 10px;
            overflow-x: auto;
            padding: 10px 0;
        }

        .thumbnail-container a img {
            width: 80px;
            height: 60px;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .thumbnail-container a img:hover {
            transform: scale(1.1);
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body>
    <div class="gallery-container">
        <div id="mainImageCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <?php if (!empty($gallery)): ?>
                    <?php foreach ($gallery as $index => $image): ?>
                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                            <a data-fancybox="gallery" href="<?= htmlspecialchars($image['image_url']) ?>">
                                <img src="<?= htmlspecialchars($image['image_url']) ?>" alt="<?= htmlspecialchars($image['alt_text']) ?>">
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="carousel-item active">
                        <p>No hay imágenes disponibles para este coche.</p>
                    </div>
                <?php endif; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mainImageCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainImageCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="thumbnail-container">
            <?php if (!empty($gallery)): ?>
                <?php foreach ($gallery as $image): ?>
                    <a data-fancybox="gallery" href="<?= htmlspecialchars($image['image_url']) ?>">
                        <img src="<?= htmlspecialchars($image['thumbnail_url']) ?>" alt="<?= htmlspecialchars($image['alt_text']) ?>">
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay miniaturas disponibles para este coche.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
</body>

</html>