<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tienda de instrumentos musicales</h1>
    <button type="submit"><a href="index.php">Inicio</a></button>
    <button type="submit"><a href="listar.php">Listar instrumentos</a></button>
    <button type="submit"><a href="agregar.html">Agregar instrumentos</a></button>
    <h2>Lista de instrumentos</h2>
    <p>La siguiente lista muestra los datos de la instrumentos actualmente en stock.</p>
    <table border="1">
    <tr>
        <th>ID</th>
        <th>INSTRUMENTO</th>
        <th>MARCA</th>
        <th>DESCRIPCION</th>
        <th>PRECIO</th>
        <th>IMAGEN</th>
        <th>PAGO</th>
        <th>EDITAR</th>
        <th>BORRAR</th>
    </tr>
    <?php
    // 1) Conexion
    $conexion = mysqli_connect("127.0.0.1", "root", "");
    mysqli_select_db($conexion, "tienda");


    // 2) Preparar la orden SQL
    // Sintaxis SQL SELECT
    // SELECT * FROM nombre_tabla
    // => Selecciona todos los campos de la siguiente tabla
    // SELECT campos_tabla FROM nombre_tabla
    // => Selecciona los siguientes campos de la siguiente tabla
    $consulta='SELECT * FROM instrumentos';

    // 3) Ejecutar la orden y obtenemos los registros
    $datos= mysqli_query($conexion, $consulta);


    // 4) Mostrar los datos del registro
     while ($reg=mysqli_fetch_array($datos)) { ?>
        <tr>
        <td><?php echo $reg['id']; ?></td>
        <td><?php echo $reg['instrumento']; ?></td>
        <td><?php echo $reg['marca']; ?></td>
        <td><?php echo $reg['descripcion']; ?></td>
        <td><?php echo $reg['precio']; ?></td>
        <td><img src="data:image/png;base64, <?php echo base64_encode($reg['imagen'])?>" alt="" width="100px" height="100px"></td>
        <td><?php echo $reg['pago']; ?></td>
        <td><a href="modificar.php?id=<?php echo $reg['id'];?>">Editar</a></td>
        <td><a href="borrar.php?id=<?php echo $reg['id'];?>">Borrar</a></td>
        </tr>
    <?php } ?>
  </table>

</body>
</html>
