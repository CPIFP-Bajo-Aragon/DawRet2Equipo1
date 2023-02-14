<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

</head>
<body>
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Menu</a></li>
        <li class="breadcrumb-item active" aria-current="page">Gestion Centros</li>
    </ol>
</nav>
    <h1>CENTROS</h1>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<span class="cerrar">&times;</span>
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Nuevo Préstamo</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">

    <div class="mb-3">
      <label for="NombreText" class="form-label">Nombre:</label>
      <input type="text" class="form-control" id="text" aria-describedby="text">
      <div id="textoAlumno" class="form-text">Introduce el nombre de una persona ya existente.</div>
    </div>

    <div class="mb-3">
      <label for="Concepto" class="form-label">Concepto:</label>
      <input type="text" class="form-control" id="text" aria-describedby="text">
    </div>

    <label for="NombreText" class="form-label">Tipo de Préstamo:</label>
    <select class="form-select" aria-label="Default select example">
        <option value="1">Agricultura</option>
        <option value="2">Otros</option>
    </select>

    <label for="NombreText" class="form-label">Estado:</label>
    <select class="form-select" aria-label="Default select example">
        <option value="1">En proceso</option>
        <option value="2">Pagado</option>
    </select>
    
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Fecha Inicio:</label>
        <input type="date" class="form-control" id="exampleFormControlInput1">
    </div>
    
    <div class="mb-3">
        <label for="Importe" class="form-label">Importe:</label>
        <input type="number" step="1.00" class="form-control" id="Importe" aria-describedby="text" required>
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

<!-- Modal Seguro desea Eliminar -->

<div class="modal fade" id="modalEliminarcentro" tabindex="-1">
  <div class="modal-dialog modal-dialog-center"> 
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modalCerrarAccionLabel">
                        ¿Estas seguro que quieres eliminar el centro?
              </h5>
          </div>

          <div  class="modal-footer"> 
              <form method="post" id="formCerrarAccion" action="<?php echo RUTA_URL ?>/admin/del_centro">
              
                <input type="hidden" id="Id_Eliminar" name="id_centro">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Cancelar
                </button>
                  
                <button type="submit" class="btn btn-warning">
                  Eliminar
                </button>
              </form>
          </div>
      </div>
  </div> 
</div>




<div id="container">

  <div class="col-3">
    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
      <input type="search" class="form-control form-control-dark" id="buscador" name="buscador" placeholder="Buscador" aria-label="Search">
    </form>

    <button id="buscador" onclick="mod_show()"><i class="bi bi-search"></i></button>

    <select id="panel_filtro" name="Tipo" onchange="mod_show()">
    <option id="refresh" value="0" selected></option>
      <?php foreach($datos["ciudades"] as $ciudad): ?>
        <option value="<?php echo $ciudad->Id ?>"><?php echo $ciudad->Nombre ?></option>
      <?php endforeach ?>
    </select>
    <br>
  </div>



 <button type="button" id="abrirModal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button> 


  <br>
  <br>
  <br>

  <input disabled id="page_controller" name="centro" value="0" hidden>
  <div class="container">
      <table class="table table-striped table-hover">
        <thead class="thead-azul">
          <tr>
              <th scope="col">Nº Centro</th>
              <th scope="col">Ciudad</th>
              <th scope="col">Nombre Centro</th>
              <th scope="col">Cuantia</th>
              <th scope="col">Distancia</th>
              <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody id="contenido_tabla">
          
        </tbody>
      </table>

    <div class="Centros">
    <nav aria-label="Page navigation example">
      <ul id="page_panel" class="pagination justify-content-center">
        
      </ul>
    </nav>
    </div>

    <h2 id="nomaches"></h2>

  </div>



  <script>

  window.onload=caja_fuerte(<?php echo json_encode($datos["centros"])?>); // Aqui pasamos el array en cuestion recibido por PHP

  window.onload=listar_elementos(true); // Se le pasa true indicando que es la primera vez que se ejecuta la funcion

</script>
    

    
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>