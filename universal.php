<DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/style.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
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
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Tienda de Música</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Los mejores productos aquí</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

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

                  $consulta="SELECT * FROM `instrumentos` WHERE `marca` = 'universal'";

                  // 3) Ejecutar la orden y obtenemos los registros
                  $datos= mysqli_query($conexion, $consulta);

                  //  recorro todos los registros y genero una CARD PARA CADA UNA
                  while ($reg = mysqli_fetch_array($datos)) {?>

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen'])?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo ucwords($reg['marca']) ?></h5>
                                    <!-- Product price-->
                                  <h2>$<?php echo $reg['precio']; ?></h2>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a href="<?php echo $reg['pago']; ?>"><h1><i class="bi bi-cart"></i></h1></div>
                            </div>
                        </div>
                    </div>

                  <?php } ?>

                </div>
            </div>
        </section>

        <!-- Footer-->
        <footer>
        <div class="card text-center ">
  <div class="card-header py-2 bg-dark">
  </div>
  <div class="card-body">
    <h5 class="card-title">Conrado Ivani</h5>
    <p class="card-text">Potrero Digital 2023</p>
    <a href="https://www.linkedin.com/in/conra-ivani-092847289/" class="btn btn-primary"><i class="bi bi-github"></i></a>
    <a href="https://github.com/conraivani" class="btn btn-primary"><i class="bi bi-linkedin"></i></a>
  </div>
  <div class="card text-center ">
  <div class="card-header py-2 bg-dark">
  </div>
</div>
    </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
