<?php
if ($_POST['submit']) {
    switch ($_POST['submit']) {
        case 'guardar':
            $nombre = $_POST['nombre'];
            $valor = $_POST['valor'];
            $tiempo = time() + 60 * 60;
            setcookie($nombre, $valor, $tiempo);
            break;
        case 'borrar todas':
            foreach ($_COOKIE as $nombre => $valor)
                setcookie($nombre, 1, time() - 1);
            break;
        case 'ver':
            $msj = "<ol>";
            foreach ($_COOKIE as $nombre => $valor) {
                $msj .= "<li> $nombre = $valor </li>";
            }
            $msj .= "</ol>";
            break;
        case "borrar una cookie":
            $name = $_POST['nombre'];
            foreach ($_COOKIE as $nombre => $valor) {
                if ($name === $nombre) {
                    setcookie($nombre, 1, time() - 1);
                    $msj = "Cookie $nombre borrada correctamente";
                    break;
                } else {
                    $msj = "No existe la cookie " . $name . ".";
                }
            }
            break;
        case "ver una cookie":
            $name = $_POST['nombre'];
            if (array_key_exists($name, $_COOKIE))
                $msj = "<ul><li> $name = {$_COOKIE[$name]} </li></ul>";
            else
                $msj = "No existe la cookie " . $name . ".";
            break;
    }
}
?>




<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <h1>Gestor de cookies</h1>

        <form action="index.php" method="post">
            Nombre de cookie <input type="text" name = "nombre" ><br />
            Valor  de cookie <input type="text" name = "valor" ><br />
            <input type="submit" value="guardar" name="submit">
            <input type="submit" value="borrar todas" name="submit">
            <input type="submit" value="ver" name="submit">
            <input type="submit" value="borrar una cookie" name="submit">
            <input type="submit" value="ver una cookie" name="submit">

        </form>
        <h4>Listado de cookies</h4>
        <?php echo $msj ?>
    </body>
</html>
