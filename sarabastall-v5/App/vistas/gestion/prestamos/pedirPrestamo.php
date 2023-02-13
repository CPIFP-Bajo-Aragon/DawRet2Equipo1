<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
</head>
<body>
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Menu</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pedir Préstamo</li>
    </ol>
</nav>
    <h1>Préstamos</h1>
    
<div class="container">
<form method="post" action="<?php echo RUTA_URL ?>/admin/pedir_prestamo">

  <div class="row">
    <div class="col-3">
    <div class="mb-3">
      <label for="NombreText" class="form-label">Nombre:</label>
        <select name="Id_Persona">
        <?php foreach($datos["nombrepersona"] as $prestamoNombrePersona): ?>
          <option value="<?php echo $prestamoNombrePersona->Id_Persona ?>"><?php echo $prestamoNombrePersona->Nombre?></option>
          <?php endforeach?>
        </select>
    </div>
    </div>

    <div class="col-9">
    <div class="mb-3">
      <label for="Concepto" class="form-label">Concepto:</label>
      <input type="text" class="form-control" id="concepto" name="concepto" aria-describedby="text">
    </div>
    </div>
  </div>

  <div class="row">
    <div class="col-4">
    <label for="NombreText" class="form-label">Tipo de Préstamo:</label>
    <select name="Id_TipoPrestamo">
      <?php foreach($datos["tipoprestamo"] as $tipoPrestamo): ?>
        <option value="<?php echo $tipoPrestamo->Id_TipoPrestamo ?>"><?php echo $tipoPrestamo->Nombre?></option>
        <?php endforeach?>
    </select>
    </div>
    
    <div class="col-4">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Fecha Inicio:</label>
        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
    </div>
    </div>
    
    <div class="col-4">
    <div class="mb-3">
        <label for="Importe" class="form-label">Importe:</label>
        <input type="number" step="1.00" class="form-control" id="importe" name="importe" aria-describedby="text" required>
    </div>
    </div>
  <div>
    
    <br>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="observaciones" name="observaciones"></textarea>
        <label for="floatingTextarea">Observaciones</label>
    </div>

    </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    <button type="button" class="btn btn-primary">Guardar cambios</button>
    <input type="submit" value="Entrar">
  </div>
  </form>

  <div class="card text-dark bg-light mb-3 col-3" style="max-width: 18rem;">
                <a href="<?php echo RUTA_URL ?>/admin/gestionar_prestamos">
                  <div class="card-header"><i class="fa fa-dollar-sign fa-8x"></i></div>
                  <div class="card-body">
                    <h5 class="card-title">Consultar Préstamos</h5>
                  </div>
                </a>
                </div>

</div>





<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>