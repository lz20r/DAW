<style>
    p {
        text-align: center;
    }
    a {
        display: inline-block;
        margin: 10px;
    }
    a {
        text-decoration: none;
    }
    a:hover {
        opacity: 0.7;
    }
    a img {
        width: 100px;
        height: 100px;
    } 
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }
    a { 
        text-decoration: underline;
        color: black;
    }
    a:hover {
        opacity: 0.7;
    }  
</style>

<p>Hola <?php echo $_GET['nombre'] ?> tienes <?php echo $_GET['edad'] ?> años, eres <?php echo $_GET['profesion'] ?> y vives en <?php echo $_GET['ciudad'] ?>.</p>.

<a href="ej14.php">Volver atrás</a>