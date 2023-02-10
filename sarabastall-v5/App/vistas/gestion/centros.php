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
    
    <?php $pageLists = listElements($datos["centros"]) ?>


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


<div id="container">
  <!-- Boton para añadir nuevos centros -->
  <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <a  class="btn btn-primary me-md-2" type="button" href="<?php echo RUTA_URL ?>/sarabastall/addCentro">+</a>
  </div> -->
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
              <th scope="col">Nombre Centro</th>
              <th scope="col">Ciudad</th>
              <th scope="col">Cuantia</th>
              <th scope="col">Distancia</th>
              <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody id="contenido_tabla">
          
        </tbody>
      </table>

    <div class="Cursos">
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <?php if(count($datos["centros"]) > 8):?>

          <li class="page-item disabled" id="page_a"><a class="page-link" onclick='anterior(<?php echo json_encode($pageLists)?>)'>Anterior</a></li>
        
          <li id="page_1" class="page-item"><a class="page-link" name="1" onclick='go_page(this, <?php echo json_encode($pageLists)?>)'>1</a></li>

          <?php for($i = 1; $i*8 <= count($datos["centros"]); $i++): ?>

            <li id="page_<?php echo $i+1 ?>" class="page-item"><a class="page-link" name="<?php echo $i+1 ?>" onclick='go_page(this, <?php echo json_encode($pageLists)?>)'><?php echo $i+1 ?></a></li>
            
          <?php endfor ?>
          
          <li class="page-item" id="page_s"><a class="page-link" onclick='siguiente(<?php echo json_encode($pageLists)?>)'>Siguiente</a></li>
          
        <?php endif ?>
      </ul>
    </nav>
    </div>
  </div>

  <script>
  window.onload=listar_elementos(<?php echo json_encode($pageLists)?>);
  </script>
    

    
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>