<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<div class="container">
  <nav aria-label="breadcrumb">
    <br>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Añadir Asesoria</li>
    </ol>
    <br>
  </nav>
    <?php
        echo "<h1>Nueva Asesoria</h1>";

    ?>


    <?php if($datos["error"] == 1): ?>
      <div class="alert alert-danger" role="alert">
        Se ha de rellenar un campo obligatoriamente!!
      </div>


    <?php endif ?>

<form method="post">
<div class="row">

  <div class="mb-3 col-6">
    <label for="nombre_as" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre_as" name="nombre_as" autofocus>
  </div>

  <div class="mb-3 col-6">
    <label for="dni_as" class="form-label">DNI</label>
    <input type="text" class="form-control" id="dni_as" name="dni_as">
  </div>

  <div class="mb-3 col-6">
    <label for="titulo_as" class="form-label">Titulo</label>
    <input type="text" class="form-control" id="titulo_as" name="titulo_as">
  </div>

  <div class="mb-3 col-6">
    <label for="telefono_as" class="form-label">Telefono</label>
    <input type="text" class="form-control" id="telefono_as" name="telefono_as">
  </div> 

  <div class="mb-3 col-6">
    <label for="email_as" class="form-label">Email</label>
    <input type="email" class="form-control" id="email_as" name="email_as">
  </div>

  <div class="mb-3 col-6">
    <label for="domicilio_as" class="form-label">Domicilio</label>
    <input type="text" class="form-control" id="domicilio_as" name="domicilio_as">
  </div> 

  <div class="mb-3">
    <label for="descripcion_as" class="form-label">Descripcion</label>
    <textarea class="form-control" id="descripcion_as" name="descripcion_as"></textarea>
  </div> 

  <div class="col-10">
    <button type="submit" class="w-100 btn btn-success btn-lg">Guardar</button>
  </div>
  <div class="col-2">
    <a class="w-100 btn btn-danger btn-lg" href="<?php echo RUTA_URL?>/asesorias/">Cancelar</a>
  </div>

</div>
</form>

</div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>