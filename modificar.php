<?php
// 1) Conexion
// a) realizar la conexion con la bbdd
// b) seleccionar la base de datos a usar
$conexion=mysqli_connect("127.0.0.1","root","");
 mysqli_select_db($conexion,"tienda");
// 2) Almacenamos los datos del envío GET
// a) generar variables para el id a utilizar
$id = $_GET['id'];
// 3) Preparar la SQL
// => Selecciona todos los campos de la tabla alumno donde el campo id  sea igual a $id
// a) generar la consulta a realizar
$consulta = "SELECT * FROM instrumentos WHERE id=$id";
// 4) Ejecutar la orden y almacenamos en una variable el resultado
// a) ejecutar la consulta
$respuesta=mysqli_query ($conexion, $consulta);
// 5) Transformamos el registro obtenido a un array
$datos=mysqli_fetch_array($respuesta);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tienda de instrumentos</title>
    </head>
    <body>
        <?php
        // 6) asignamos a diferentes variables los respectivos valores del array $datos.
        $instrumento=$datos["instrumento"];
        $marca=$datos["marca"];
        $descripcion=$datos["descripcion"];
        $precio=$datos["precio"];
        $imagen=$datos['imagen'];
        $imagen2=$datos['imagen2'];
        $pago=$datos["pago"];
        ?>
        <h2>Modificar</h2>
        <p>Ingrese los nuevos datos de la instrumento.</p>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Tipo de instrumento</label>
            <input type="text" name="instrumento" placeholder="Tipo de instrumento" value="<?php echo "$instrumento"; ?>">
<br><br>
            <label>Marca</label>
            <input type="text" name="marca" placeholder="Marca" value="<?php echo "$marca"; ?>">
<br><br>
            <label>descripcion</label>
            <input type="text" name="descripcion" placeholder="descripcion" value="<?php echo "$descripcion"; ?>">
<br><br>
            <label>Precio</label>
            <input type="text" name="precio" placeholder="Precio" value="<?php echo "$precio"; ?>">
            
<br><br>
             <!-- Solo si quieren le agregan la opción para modificar la imagen-->
             <label>Imagen2</label>
             <input type="text" name="imagen2" placeholder="imagen2" value="<?php echo "$imagen2"; ?>">
<br><br>
            <label>Imagen</label>
            <input type="file" name="imagen" placeholder="imagen">
            <label>Pago</label>
            <input type="text" name="pago" placeholder="Pago" value="<?php echo "$pago"; ?>">
<br><br>
            <input type="submit" name="guardar_cambios" value="Guardar Cambios">
            <button type="submit" name="Cancelar" formaction="listar.php">Cancelar</button>
        </form>
        <?php
        // Si en la variable constante $_POST existe un indice llamado 'guardar_cambios' ocurre el bloque de instrucciones.
        if(array_key_exists('guardar_cambios',$_POST)){
            // 2') Almacenamos los datos actualizados del envío POST
            // a) generar variables para cada dato a almacenar en la bbdd
            // Si se desea almacenar una imagen en la base de datos usar lo siguiente:
            // addslashes(file_get_contents($_FILES['ID NOMBRE DE LA IMAGEN EN EL FORMULARIO']['tmp_name']))
            $instrumento=$_POST['instrumento'];
            $marca=$_POST['marca'];
            $descripcion=$_POST['descripcion'];
            $precio=$_POST['precio'];
            $imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
            $pago=$_POST['pago'];
            // 3') Preparar la orden SQL
            // "UPDATE tabla SET campo1='valor1', campo2='valor2', campo3='valor3', campo3='valor3', campo3='valor3' WHERE campo_clave=valor_clave"
            // a) generar la consulta a realizar
             $consulta = "UPDATE instrumentos SET instrumento='$instrumento', marca='$marca', descripcion='$descripcion', precio='$precio', imagen='$imagen', pago='$pago' WHERE id=$id";
            // 4') Ejecutar la orden y actualizamos los datos
            // a) ejecutar la consulta
            mysqli_query($conexion,$consulta);
            // a) rederigir a index
            header('location: index.php');
          } ?>

    </body>
</html>
