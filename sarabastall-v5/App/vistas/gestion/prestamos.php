<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

</head>
<body>
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Menu</a></li>
        <li class="breadcrumb-item active" aria-current="page">Gestion Préstamos</li>
    </ol>
</nav>
    <h1>Préstamos</h1>
    

<!-- Button trigger modal -->
<button type="button" id="anadir" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
+
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Nuevo Préstamo</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
  <form method="post" action="<?php echo RUTA_URL ?>/admin/add_prestamo">
    <div class="mb-3">
      <label for="NombreText" class="form-label">Nombre:</label>
      <select name="Id_Persona">
      <?php foreach($datos["nombrepersona"] as $prestamoNombrePersona): ?>
        <option value="<?php echo $prestamoNombrePersona->Id_Persona ?>"><?php echo $prestamoNombrePersona->Nombre?></option>
        <?php endforeach?>
      </select>
    </div>

    <div class="mb-3">
      <label for="Concepto" class="form-label">Concepto:</label>
      <input type="text" class="form-control" id="concepto" name="concepto" aria-describedby="text">
    </div>

    <label for="NombreText" class="form-label">Tipo de Préstamo:</label>
    <select name="Id_TipoPrestamo">
      <?php foreach($datos["tipoprestamo"] as $tipoPrestamo): ?>
        <option value="<?php echo $tipoPrestamo->Id_TipoPrestamo ?>"><?php echo $tipoPrestamo->Nombre?></option>
        <?php endforeach?>
    </select>

    <!-- <label for="NombreText" class="form-label">Estado:</label>
    <select name="Id_Estado">
      <?php foreach($datos["estados"] as $estado): ?>
        <option value="<?php echo $estado->Id ?>"><?php echo $estado->Nombre?></option>
        <?php endforeach?>
    </select> -->
    
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Fecha Inicio:</label>
        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
    </div>
    
    <div class="mb-3">
        <label for="Importe" class="form-label">Importe:</label>
        <input type="number" step="1.00" class="form-control" id="importe" name="importe" aria-describedby="text" required>
    </div>
    
    <br>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="observaciones" name="observaciones"></textarea>
        <label for="floatingTextarea">Observaciones</label>
    </div>

    </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Añadir Prestamo</button>
  </div>
  </form>
</div>
</div>
</div>
</div>

<!-- Modal Ver Mas -->
<div class="modal fade" id="VerMas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Ingresos</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">

  <div class="list-group">
    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
      <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">Ingreso realizado</h5>
        <small class="text-muted">25/09/2022</small>
      </div>
      <p class="Ingreso">230</p>
    </a>
    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
      <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">Ingreso realizado</h5>
        <small class="text-muted">26/09/2022</small>
      </div>
      <p class="Ingreso">150</p>
    </a>
    <a href="#" class="list-group-item list-group-item-action">
      <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">Ingreso realizado</h5>
        <small class="text-muted">28/09/2022</small>
      </div>
      <p class="Ingreso">70</p>
    </a>
  </div>
    
    <br>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
        <label for="floatingTextarea">Observaciones</label>
    </div>

    </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    <button type="button" class="btn btn-primary">Guardar cambios</button>
  </div>
</div>
</div>
</div>
</div>


<!-- Modal ingresos -->
<div class="modal fade" id="modalEliminarprestamo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Ingresos</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">

  <!-- Añadir Formulario y funcion de crear Abono, y Movimiento -->
        
    <div class="mb-3">
        <label for="Importe" class="form-label">Ingreso:</label>
        <input type="number" step="1.00" class="form-control" id="Importe" aria-describedby="text" required>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Fecha Movimiento:</label>
        <input type="date" class="form-control" id="exampleFormControlInput1">
    </div>
  
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    <button type="button" class="btn btn-primary">Guardar cambios</button>
  </div>
</div>
</div>
</div>
</div>

<!-- Modal Aprobar Estado-->

<div class="modal fade" id="modalAprobarEstado" tabindex="-1">
  <div class="modal-dialog modal-dialog-center"> 
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modalCerrarAccionLabel">
                        ¿Estas seguro que quieres aprobar el prestamo?
              </h5>
          </div>

          <div  class="modal-footer"> 
              <form method="post" id="formCerrarAccion" action="<?php echo RUTA_URL ?>/admin/aprobarEstado">
              <input type="hidden" id="Id_Aceptar" name="id_prestamoA">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Cancelar
                </button>
                  
                <button type="submit" class="btn btn-warning">
                  Aprobar
                </button>
              </form>
              
          </div>
      </div>
  </div> 
</div>

<!-- Modal Rechazar Estado-->

<div class="modal fade" id="modalRechazarEstado" tabindex="-1">
  <div class="modal-dialog modal-dialog-center"> 
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modalCerrarAccionLabel">
                        ¿Estas seguro que quieres rechazar el prestamo?
              </h5>
          </div>

          <div  class="modal-footer"> 
              <form method="post" id="formCerrarAccion" action="<?php echo RUTA_URL ?>/admin/rechazarEstado">
              <input type="hidden" id="Id_Rechazar" name="id_prestamo">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Cancelar
                </button>
                  
                <button type="submit" class="btn btn-warning">
                  Rechazar
                </button>
              </form>
              
          </div>
      </div>
  </div> 
</div>
  


<input disabled id="page_controller" name="prestamo" value="0" hidden>  
<div class="container">
<div class="col-3">
    
    <input type="search" class="form-control form-control-dark" id="buscador" name="buscador" placeholder="Buscador" aria-label="Search" >
    

    <button id="buscador" onclick="mod_show()"><i class="bi bi-search"></i></button>

    <select id="panel_filtro" name="Tipo" onchange="mod_show()">
    <option id="refresh" value="0" selected></option>
      <?php foreach($datos["estados"] as $estado): ?>
        <option value="<?php echo $estado->Id ?>"><?php echo $estado->Nombre ?></option>
      <?php endforeach ?>
    </select>
    <br>
  </div>
  
<table class="table table-striped table-hover">
  <thead class="thead-azul">
    <tr>
    <th scope="col">Nº Préstamo</th>
    <th scope="col">Estado</th>
    <th scope="col">Tipo</th>
    <th scope="col">Nombre Persona</th>
    <th scope="col">Fecha <button type="button" name="4" value="1" onclick="mod_show(this)"><i class="fa fa-sort"></i></button></th>
    <th scope="col">Cantidad</th>
    <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody id="contenido_tabla">
  
  </tbody>
</table>

<h2 id="nomaches"></h2>

<div class="Centros">
<nav aria-label="Page navigation example">
<ul id="page_panel" class="pagination justify-content-center">

</ul>
</nav>
</div>
</div>

<!-- <button type="button"  onclick="place_id(<?php echo $prestamo -> Id_Prestamo ?>)" data-bs-toggle="modal" data-bs-target="#modalRechazarEstado" class="w-80 btn btn-warning btn-lg">
            <i class="bi bi-hand-thumbs-down-fill"></i>
          </button>

          <button type="button"  onclick="place_idAceptar(<?php echo $prestamo -> Id_Prestamo ?>)" data-bs-toggle="modal" data-bs-target="#modalAprobarEstado" class="w-80 btn btn-warning btn-lg">
            <i class="bi bi-hand-thumbs-up-fill"></i>    
          </button> -->




<script>

  window.onload=caja_fuerte(<?php echo json_encode($datos["PrestamosTotales"])?>); // Aqui pasamos el array en cuestion recibido por PHP

  window.onload=listar_elementos(true); // Se le pasa true indicando que es la primera vez que se ejecuta la funcion

</script>
    

    
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>