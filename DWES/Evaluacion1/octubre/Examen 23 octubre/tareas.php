 <!doctype html>
 <html lang="es">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Examen</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 </head>

 <body>
     <nav class="navbar navbar-expand-lg bg-body-tertiary">
         <div class="container-fluid">
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                 aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarNav">
                 <ul class="navbar-nav">
                     <li class="nav-item">
                         <a class="nav-link" href="index.php">Ver tareas</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="nueva.php">Nueva tarea</a>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>
     <div class="container">
         <h1 class="text-center my-3">Mis tareas</h1>
         <div class="row">
             <div class="col-12 col-md-6 col-xl-3">
                 <div class="card text-center mb-4 bg-secondary-subtle">
                     <div class="card-header">
                         <strong>Tarea 1</strong>
                     </div>
                     <div class="card-body">
                         <h5 class="card-title">Prueba</h5>
                         <p class="card-text">Prueba </p>
                         <a href="editar_tarea.php?id=3" class="btn btn-primary">Editar</a>
                         <a href="eliminar_tarea.php?id=3" class="btn btn-danger">Eliminar</a>
                     </div>
                     <div class="card-footer text-body-secondary">
                         <strong>Prioridad Media</strong>
                     </div>
                 </div>
             </div>
         </div>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
             integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
             crossorigin="anonymous">
         </script>
 </body>

 </html>