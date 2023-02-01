<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<!-- Si la asesoria está cerrada, desactiva el boton modal -->
<?php 
  $estadoFormulario ="";
  if($datos['curso']->Profesor != $datos['usuarioSesion']->Nombre){
    $estadoFormulario = "disabled";
  } 
?>

<?php print_r($datos) ?>


<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>">Gestion Cursos</a></li>
          <li class="breadcrumb-item active" aria-current="page">Ver Curso</li>
        </ol>
    </nav>
    
    <div class="col-12">
      <h1>Curso : <?php echo $datos["curso"]->Curso ?></h1>
    </div>
    <br>


    <div class="row">
        <div class="col-md-7">
        
          <!-- Añadir textarea y boton para añadir nuevas acciones -->
            <form method="post" action="<?php echo RUTA_URL?>/admin/add_material">

              <input type="hidden" name="id_curso" value="<?php echo $datos['curso']->Id ?>">

              <div class="row">
                <div class="col-mb-3 col-10">
                    
                    <textarea class="form-control form-control-sm" id="accion" name="accion" placeholder="Agregar Archivo"></textarea>
                </div>
                <div class="col-mb-3 col-2">
                    <button type="submit" class="w-100 btn btn-success btn-lg">Añadir</button>
                </div>
              </div>
            </form>
        

        <div class="card">
            <div class="card-body">
            <!-- Formulario rellenado con la informacion de la asesoria para modificar cualquier dato -->
            <form method="post" class="mb-5">
              <div class="row">
                <div class="mb-3 col-6">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input <?php echo $estadoFormulario ?> type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datos["curso"]->Curso?>">
                </div>
                <div class="mb-3 col-6">
                  <label for="especialidad" class="form-label">Especialidad</label>
                  <input <?php echo $estadoFormulario ?> type="text" class="form-control" id="especialidad" name="especialidad" value="<?php echo $datos["curso"]->Especialidad?>">
                </div>
                <div class="mb-3 col-6">
                  <label for="profesor" class="form-label">Profesor</label>
                  <input <?php echo $estadoFormulario ?> type="text" class="form-control" id="profesor" name="profesor" value="<?php echo $datos["curso"]->Profesor?>">
                </div>
                <div class="mb-3 col-6">
                  <label for="importe" class="form-label">Importe</label>
                  <input <?php echo $estadoFormulario ?> type="text" class="form-control" id="importe" name="importe" value="<?php echo $datos["curso"]->Importe?>">
                </div>
                <div class="mb-3 col-6">
                  <label for="importe" class="form-label">Fecha de Finalizacion</label>
                  <input <?php echo $estadoFormulario ?> type="text" class="form-control" id="fecha" name="fecha" value="<?php echo $datos["curso"]->Fecha?>">
                </div> 
                <div class="card-footer d-flex justify-content-end">
                    <span class="card-text">#<?php echo $datos["curso"]->Id?></span>
                </div>

                <div class="col-8">
                  <button type="submit" class="w-100 btn btn-success btn-lg" <?php echo $estadoFormulario ?>>Modificar</button>
                </div>
                <div class="col-4">
                  <a class="w-100 btn btn-danger btn-lg" href="<?php echo RUTA_URL?>/">Atras</a>
                </div>
              </div>
            </form>
          </div>
        </div>  
        <br>
        <!-- Accion en el boton cerrar asesoria para poner id de estado de la asesoria 3 como que esta cerrada -->
        <!-- SOlo hay que mostrar el boton si la Asesoria aun no está cerrada -->
        <!-- <?php if($datos['curso']->Profesor == $datos['usuarioSesion']->Nombre):?>
        <button type="button" onclick="asesoriaCerrada(<?php echo $datos['asesoria']->id_asesoria ?>)" 
        data-bs-toggle="modal" data-bs-target="#modalCerrarAccion" class="w-100 btn btn-warning btn-lg">
                    Desactivar Curso
        </button> -->
        
    <?php endif ?>

        </div>

        <!-- Acciones que tiene dicha asesoria -->
        <div class="col-md-5">
            <?php foreach($datos["curso"]->material as $material): ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-subtitle"> <?php echo $material->Nombre ?>:</h5>
                        <p class="card-text ps-2"> <?php echo $material->Archivo ?></p>

                        <div class="card-footer d-flex justify-content-end">
                            <span class="card-text">#<?php echo $material->Id?></span>
                        </div>

                    </div>

                </div>
            <?php endforeach?>
        </div>  
    </div>
</div>

<div class="modal fade" id="modalCerrarAccion" tabindex="-1">
  <div class="modal-dialog modal-dialog-center"> 
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modalCerrarAccionLabel">
                        ¿Estas seguro que quieres cerrar la Asesoria?
              </h5>
          </div>

          <div  class="modal-footer"> 
              <form method="post" id="formCerrarAccion" action="<?php echo RUTA_URL ?>/asesorias/cerrar_accion">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                          Cancelar
                    </button>
                      
                    <button type="submit" class="btn btn-warning">
                          Cerrar Asesoria
                    </button>
                      
                    <input type="hidden" id="id_asesoria" name="id_asesoria">
              </form>
          </div>
      </div>
  </div> 
</div>

  <script>
      function valida_cerrar(id_asesoria){
        document.getElementById("id_asesoria").value = id_asesoria
      }
  </script>
    

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>