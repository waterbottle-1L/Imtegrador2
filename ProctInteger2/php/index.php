<?php

require 'config.php';
require 'database.php';

$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT cod_producto, nombre, precio FROM producto WHERE estado = 1");
$sql ->execute();

$resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);

//session_destroy();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href = "../css/estilos.css"  rel = "stylesheet">
    <title>Document</title>
</head>
<body>
    
<header>

  <div class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <strong>Pizzería Online</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id = "navbarHeader">
          <ul class = "navbar-nav me-auto mv-2 mb-lg-0">
              <li class = "nav-intem">
                <a href = "#" class= "nav-link active"> Catalogo</a>
              </li>
              <li class = "nav-intem">
                <a href = "#" class= "nav-link "> Contacto</a>
              </li>
          </ul>
          <a href= "carrito.php" class = "btn btn-primary">Carrito
            <span id = "num_cart" class = "badge bg-secondary"> <?php echo $num_cart; ?></span>
          </a>
      </div>
    </div>
  </div>
</header>

<main> 

<div class = "container">


<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <?php foreach($resultado as $row) { ?>
        <div class="col">
          <div class="card shadow-sm">
            <?php 
            $id =$row ['cod_producto'];
            $imagen = "../img/productos/$id/Principal.jpg";

            if(!file_exists($imagen)){
                 $imagen = "../img/Prueba.jpg";
            }
            ?>
            <img src = "<?php echo $imagen; ?>" width="100%" height="225">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
              <p class = "card-text">$/<?php echo $row['precio']; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group"> 

                </div>
                <button class = "btn btn-outline-success" type = "button" 
                onclick = "addProducto(<?php echo $row['cod_producto']; ?>, '<?php echo hash_hmac('sha1', $row['cod_producto'], KEY_TOKEN); ?>')">Agregar al Carrito</button>
                </div>
            </div>
          </div>
        </div>
        <?php } ?>
</div>

</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     
    <script>
        function addProducto(id,token){
            let url = 'carrito.php';
            let formData = new FormData();
            formData.append('id',id);
            formData.append('token',token);

            fetch(url,{
                method : 'POST',
                body : formData,
                mode : 'cors'
            }).then(response => response.json())
            .then(data => {
                if(data.ok){
                let elemento = document.getElementById("num_cart")
                elemento.innerHTML = data.numero
                }
            })
        }

    </script>    

</body>
</html>