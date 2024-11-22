<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Imágenes - Jeep Wrangler</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <style>
        .gallery-container {
            box-sizing: border-box;
            width: 100%;
            max-width: 900px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 5px;
            margin: 0 auto;
            margin-top: 50px;
            margin-bottom: 50px;
            box-shadow: 0 0px 4px rgba(0, 0, 0.1, 0.5);
        }

        .main-image-container img {
            max-width: 100%;
            height: auto;
            transition: all 0.3s ease;
        }

        .thumbnail-container {
            margin-top: 10px;
            display: flex;
            justify-content: center;
            gap: 10px;
            overflow-x: auto;
            padding: 10px 0;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }


        .thumbnail-container a img {
            object-fit: contain;
            width: 80px;
            height: 60px;
            cursor: pointer;
            border-radius: 5px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .carousel-indicators button {
            width: 10px;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <div class="gallery-container">
        <div id="mainImageCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://gtrentals.es/wp-content/uploads/2023/01/1-IMG_3593-scaled.jpg"
                        alt="Jeep Wrangler Chelsea">
                </div>
                <div class="carousel-item">
                    <img src="https://gtrentals.es/wp-content/uploads/2023/01/3-IMG_3605-scaled.jpg"
                        alt="Jeep Wrangler 2">
                </div>
                <div class="carousel-item">
                    <img src="https://gtrentals.es/wp-content/uploads/2023/01/4-IMG_3611-scaled.jpg"
                        alt="Jeep Wrangler 3">
                </div>
                <div class="carousel-item">
                    <img src="https://gtrentals.es/wp-content/uploads/2023/01/5-IMG_3614-scaled.jpg"
                        alt="Jeep Wrangler 4">
                </div>
                <div class="carousel-item">
                    <img src="https://gtrentals.es/wp-content/uploads/2023/01/6-IMG_3617-scaled.jpg"
                        alt="Jeep Wrangler 5">
                </div>
                <div class="carousel-item">
                    <img src="https://gtrentals.es/wp-content/uploads/2023/01/7-IMG_3620-scaled.jpg"
                        alt="Jeep Wrangler 6">
                </div>
                <div class="carousel-item">
                    <img src="https://gtrentals.es/wp-content/uploads/2023/01/8-IMG_3627-scaled.jpg"
                        alt="Jeep Wrangler 7">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mainImageCarousel" data-bs-slide="prev"
                style="left: -5%;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainImageCarousel" data-bs-slide="next"
                style="right: -5%;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="thumbnail-container">
            <a href="javascript:void(0);"
                onclick="changeMainImage('https://gtrentals.es/wp-content/uploads/2023/01/1-IMG_3593-scaled.jpg')">
                <img src="https://gtrentals.es/wp-content/uploads/2023/01/1-IMG_3593-scaled.jpg" alt="Miniatura 1">
            </a>
            <a href="javascript:void(0);"
                onclick="changeMainImage('https://gtrentals.es/wp-content/uploads/2023/01/3-IMG_3605-scaled.jpg')">
                <img src="https://gtrentals.es/wp-content/uploads/2023/01/3-IMG_3605-scaled.jpg" alt="Miniatura 2">
            </a>
            <a href="javascript:void(0);"
                onclick="changeMainImage('https://gtrentals.es/wp-content/uploads/2023/01/4-IMG_3611-scaled.jpg')">
                <img src="https://gtrentals.es/wp-content/uploads/2023/01/4-IMG_3611-scaled.jpg" alt="Miniatura 3">
            </a>
            <a href="javascript:void(0);"
                onclick="changeMainImage('https://gtrentals.es/wp-content/uploads/2023/01/5-IMG_3614-scaled.jpg')">
                <img src="https://gtrentals.es/wp-content/uploads/2023/01/5-IMG_3614-scaled.jpg" alt="Miniatura 4">
            </a>
            <a href="javascript:void(0);"
                onclick="changeMainImage('https://gtrentals.es/wp-content/uploads/2023/01/6-IMG_3617-scaled.jpg')">
                <img src="https://gtrentals.es/wp-content/uploads/2023/01/6-IMG_3617-scaled.jpg" alt="Miniatura 5">
            </a>
            <a href="javascript:void(0);"
                onclick="changeMainImage('https://gtrentals.es/wp-content/uploads/2023/01/7-IMG_3620-scaled.jpg')">
                <img src="https://gtrentals.es/wp-content/uploads/2023/01/7-IMG_3620-scaled.jpg" alt="Miniatura 6">
            </a>
            <a href="javascript:void(0);"
                onclick="changeMainImage('https://gtrentals.es/wp-content/uploads/2023/01/8-IMG_3627-scaled.jpg')">
                <img src="https://gtrentals.es/wp-content/uploads/2023/01/8-IMG_3627-scaled.jpg" alt="Miniatura 7">
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script>
        function changeMainImage(imageUrl) {
            const mainImage = document.querySelector("#mainImageCarousel .carousel-inner .carousel-item.active img");
            mainImage.src = imageUrl;
        }
    </script>
</body>

</html>