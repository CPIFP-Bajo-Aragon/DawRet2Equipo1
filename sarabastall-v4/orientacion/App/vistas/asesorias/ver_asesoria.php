<?php require_once RUTA_APP.'/vistas/inc/header.php'?>


<!-- Si la asesoria está cerrada, desactiva el boton modal -->
<?php 
  $estadoFormulario ="";
  if($datos['asesoria']->id_estado == 3){
    $estadoFormulario = "disabled";
  } 
?>






<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ver  Asesoria</li>
    </ol>
  </nav>
    
   
        
        <div class="col-12">
          <h1>Asesoria : <?php echo $datos["asesoria"]->nombre_as ?></h1>
        </div>

        <br>


      <div class="row">
        <div class="col-md-7">
        <?php if($datos['asesoria']->id_estado != 3 ):?>
          <!-- Añadir textarea y boton para añadir nuevas acciones -->
          <form method="post" action="<?php echo RUTA_URL?>/asesorias/add_accion">

              <input type="hidden" name="id_asesoria" value="<?php echo $datos['asesoria']->id_asesoria ?>">

              <div class="row">
                <div class="col-mb-3 col-10">
                    
                    <textarea class="form-control form-control-sm" id="accion" name="accion" placeholder="Nueva Accion"></textarea>
                </div>
                <div class="col-mb-3 col-2">
                    <button type="submit" class="w-100 btn btn-success btn-lg">Add</button>
                </div>
              </div>
          </form>
        <?php endif ?>

          <div class="card">
              <div class="card-body">
                <!-- Formulario rellenado con la informacion de la asesoria para modificar cualquier dato -->
                <form method="post" class="mb-5">
                  <div class="row">

                    <div class="mb-3 col-6">
                      <label for="nombre_as" class="form-label">Nombre</label>
                      <input <?php echo $estadoFormulario ?> type="text" class="form-control" id="nombre_as" name="nombre_as" value="<?php echo $datos["asesoria"]->nombre_as?>">
                    </div>

                    <div class="mb-3 col-6">
                      <label for="dni_as" class="form-label">DNI</label>
                      <input <?php echo $estadoFormulario ?> type="text" class="form-control" id="dni_as" name="dni_as" value="<?php echo $datos["asesoria"]->dni_as?>">
                    </div>

                    <div class="mb-3 col-6">
                      <label for="titulo_as" class="form-label">Titulo</label>
                      <input <?php echo $estadoFormulario ?> type="text" class="form-control" id="titulo_as" name="titulo_as" value="<?php echo $datos["asesoria"]->titulo_as?>">
                    </div>

                    <div class="mb-3 col-6">
                      <label for="telefono_as" class="form-label">Telefono</label>
                      <input <?php echo $estadoFormulario ?> type="text" class="form-control" id="telefono_as" name="telefono_as" value="<?php echo $datos["asesoria"]->telefono_as?>">
                    </div> 

                    <div class="mb-3 col-6">
                      <label for="email_as" class="form-label">Email</label>
                      <input <?php echo $estadoFormulario ?> type="email" class="form-control" id="email_as" name="email_as" value="<?php echo $datos["asesoria"]->email_as?>">
                    </div>

                    <div class="mb-3 col-6">
                      <label for="domicilio_as" class="form-label">Domicilio</label>
                      <input <?php echo $estadoFormulario ?> type="text" class="form-control" id="domicilio_as" name="domicilio_as" value="<?php echo $datos["asesoria"]->domicilio_as?>">
                    </div> 

                    <div class="mb-3">
                      <label for="descripcion_as" class="form-label">Descripcion</label>
                      <textarea <?php echo $estadoFormulario ?> class="form-control" id="descripcion_as" name="descripcion_as"><?php echo $datos["asesoria"]->descripcion_as?></textarea>
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
          <?php if($datos['asesoria']->id_estado != 3 ):?>

            <button type="button" onclick="asesoriaCerrada(<?php echo $datos['asesoria']->id_asesoria ?>)" 
            data-bs-toggle="modal" data-bs-target="#modalCerrarAccion" class="w-100 btn btn-warning btn-lg">
                          Cerrar Asesoria
            </button>
            
          <?php endif ?>

        </div>

        <!-- Acciones que tiene dicha asesoria -->
        <div class="col-md-5">
            <?php foreach($datos["asesoria"]->acciones as $accion): ?>
                <div class="card">
                  <div class="card-body">
                      <?php if($accion->automatica): ?>
                          <span class="card-title"><?php echo $accion->accion ?>: </span>
                          <span class="card-subtitle"><?php echo $accion->nombre_completo ?>:</span>

                      <?php else: ?>
                        <h5 class="card-subtitle"> <?php echo $accion->nombre_completo ?>:</h5>
                        <p class="card-text ps-2"> <?php echo $accion->accion ?></p>
                      
                      <?php endif ?>
                  </div>

                  <div class="card-footer d-flex justify-content-end">
                    <span class="card-text"><?php echo formatoFecha($accion->fecha_reg)?></span>
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

  <script>
      function valida_cerrar(id_asesoria){
        document.getElementById("id_asesoria").value = id_asesoria
      }
  </script>
    

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>