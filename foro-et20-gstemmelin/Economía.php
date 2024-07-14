<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="foro1.css">
    <title>Foro Economía</title>
</head>

<header>
    <div class="temas">

    <a href="http://localhost/foro-et20-gstemmelin/Política.php">Política</a>
    <a href="http://localhost/foro-et20-gstemmelin/foro-principal.php">Inicio</a>
    <a href="http://localhost/foro-et20-gstemmelin/Videojuegos.php">Videojuegos</a>

    </div>
</header>


<body>

    <div class="regist">
<form action="Economía.php" method="post">

    <h1>Bienvenido a "Economía"</h1>

    <input type="text" name="nickname" placeholder="Nombre">

    <br>

    <textarea name="comment" placeholder="Tu comentario aquí"></textarea>

    <br>

    <input type="submit" value="Subir Comentario">

</form>
    </div>

    <hr>

    <?php


        echo '<div class="contenedor">';
        

        try {
            $conexion= new PDO('mysql:host=localhost;dbname=foro-et20-gstemmelin','root','');

            if(!empty($_POST)){
                $nick = $_POST['nickname'];
                $comm = $_POST['comment'];
                $fech = date("y/m/d");
        
                $conexion->query("INSERT INTO `economía` (`ID`, `nickname`, `comment`, `fecha`) VALUES (NULL, '$nick', '$comm', '$fech');");
            }

            $busca = $conexion->query("SELECT * FROM `economía`");


            foreach ($busca as $imagen)
            {
                echo '<div class="caja">';
                echo "<p> Nombre: ".$imagen['nickname']."</p>";
                echo "<p> Comentario: ".$imagen['comment']."</p>";
                echo "<p> Fecha: ".$imagen['fecha']."</p>";
                echo "<br>";
                echo '</div>';
            }
            
            } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
    
        echo '</div>';
        



    ?>


</body>
</html>