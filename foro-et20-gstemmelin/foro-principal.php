<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="foro-principal.css">
    <title>Foro - Inicio</title>
</head>
<body>


    <?php


    echo '<h1>Bienvenido</h1>';

try {


    $conexion= new PDO('mysql:host=localhost;dbname=foro-et20-gstemmelin','root','');
    $busca = $conexion->query("SELECT * FROM `temas`");

    echo '<div class="contenedor">';
    foreach ($busca as $imagen){
        
        $tema= $imagen['tema']. '.php'; 
        echo '<a href="' . $tema . '" class="caja">';
        echo $imagen['tema'].'</a>';
        
    }
    echo '</div>';

}catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}


    ?>


</body>
</html>