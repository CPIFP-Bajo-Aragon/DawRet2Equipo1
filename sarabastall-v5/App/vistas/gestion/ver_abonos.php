<?php require_once RUTA_APP.'/vistas/inc/header.php'?>


<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>/admin/index">Menu</a></li>
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>/admin/gestionar_prestamos">Gestion Prestamos</a></li>
      <li class="breadcrumb-item active" aria-current="page">Abonos</li>
    </ol>
  </nav>

  <!-- Modal ingresos -->
    <div class="modal fade" id="modalEliminarprestamo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Abonos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    
      <!-- Añadir Formulario y funcion de crear Abono, y Movimiento -->
        <form method="post" id="formAbonar" action="<?php echo RUTA_URL ?>/admin/add_abono">
            
        <div class="mb-3">
            <label for="Importe" class="form-label">Abonar:</label>
            <input type="number" step=".01" min="0" max="" class="form-control" id="Importe" aria-describedby="text" required>
        </div>
    
        <input type="hidden" id="Id_Prestacion" name="id_prestamo">
    
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary">Abonar</button>
        </div>
        </form>
      </div>
    </div>
    </div>
    </div>
            
    <div class="col-12">
        <h1>Prestamo: <?php echo $datos["centro"]->Nombre ?> </h1>
    </div>
    
    <br>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                <!-- Formulario rellenado con la informacion del centro para modificar cualquier dato -->
                <form method="post" class="mb-5">
                  <div class="row">

                  <input hidden name="Id_Ciudad" type="text" value="<?php echo $datos["centro"]->Id_Ciudad?>">
                    <div class="mb-3 col-6">
                      <label for="Nombre" class="form-label">Nombre</label>
                      <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo $datos["centro"]->Nombre?>">
                    </div>

                    <div class="mb-3 col-6">
                      <label for="Cuantia" class="form-label">Cuantia</label>
                      <input type="text" class="form-control" id="Cuantia" name="Cuantia" value="<?php echo $datos["centro"]->Cuantia?>">
                    </div>

                    <div class="mb-3 col-6">
                      <label for="Ciudad" class="form-label">Ciudad</label>
                      <input type="text" class="form-control" id="Ciudad" name="Ciudad" value="<?php echo $datos["centro"]->Nombre_Ciudad?>">
                    </div>

                    <div class="mb-3 col-6">
                      <label for="Distancia" class="form-label">Distancia</label>
                      <input type="text" class="form-control" id="Distancia" name="Distancia" value="<?php echo $datos["centro"]->Distancia?>">
                    </div>  

                    <div class="col-8">
                      <button type="submit" class="w-100 btn btn-success btn-lg">Modificar</button>
                    </div>

                    <div class="col-4">
                      <a class="w-100 btn btn-danger btn-lg" href="<?php echo RUTA_URL?>/admin/gestionar_centros">Atras</a>
                    </div>

                  </div>
                </form>
              </div>
          </div>  
          <br>
        </div> 
    </div>
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>