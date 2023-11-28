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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/style.css" rel="stylesheet" />
</head>
<body>
  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">Página Principal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Productos</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php">Todos los Productos</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="marshall.php">Marshall</a></li>
                            <li><a class="dropdown-item" href="roland.php">Roland</a></li>
                            <li><a class="dropdown-item" href="blackstar.php">Blackstar</a></li>
                            <li><a class="dropdown-item" href="mapex.php">Mapex</a></li>
                            <li><a class="dropdown-item" href="neumann.php">Neumann</a></li>
                            <li><a class="dropdown-item" href="universal.php">Universal</a></li>
                            <li><a class="dropdown-item" href="korg.php">Korg</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                </ul>
                <form class="d-flex">
                    <button class="btn btn-outline-dark" type="submit">

                        <a href="login.html">Administrador
                        </a>
                    </button>
                </form>
            </div>
        </div>
    </nav>
  <header>
    <h1 class="text-center">Detalle del producto</h1>
  </header>
  <?php
  // 6) asignamos a diferentes variables los respectivos valores del array $datos.
  // este paso no es estrictamente necesario, pero es mas practico
  //para despues llamarlos solo con el nombre de la variable
  $instrumento=$datos["instrumento"];
  $marca=$datos["marca"];
  $descripcion=$datos["descripcion"];
  $precio=$datos["precio"];
  $imagen=$datos['imagen'];
  $pago=$datos['pago'];
  ?>

  <!-- mostramos los datos de ese único producto
  lo meto en una card, pero se puede mostrar como quieran-->

  <div class="container  text-center" style="max-width: 50rem;">
    <div class="row justify-content-center">
      <div class="card w-50">
        <img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode($imagen)?>" alt="..." />
          

        <div class="card-body">
          <h5 class="card-title">Marca: <?php echo $marca;?></h5>
          <p class="card-text">Descripción: <?php echo $descripcion?></p>
          <p class="card-text">$<?php echo $precio;?></p>
          <div class=""> 
          <a href="<?php echo $pago;?>">Comprar </a> 
          </div>
          <!-- si quieren pueden agregar el link o un boton de pago de Mercadopago-->
        </div>
      </div>
    </div>
  </div>

  <footer>
        <div class="card text-center ">
  <div class="card text-bg-info mb-3">
  <div class="card-header">Potrero Digital 2023</div>
  <div class="card-body">
    <h5 class="card-title">Conrado Ivani</h5>
    <a href="https://www.linkedin.com/in/conra-ivani-092847289/" class="btn btn-secondary"><i class="bi bi-github"></i></a>
    <a href="https://github.com/conraivani" class="btn btn-primary"><i class="bi bi-linkedin"></i></a>
  </div>
  </div>
  </div>
    </footer>


  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->



  <script src="js/scripts.js"></script>
</body>
</html>
