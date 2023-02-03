<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

</head>
<body>
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Menu</a></li>
        <li class="breadcrumb-item active" aria-current="page">Gestion Cursos</li>
    </ol>
</nav>
    <h1>Cursos</h1>
    
    <?php 
    print_r($this->datos["CursosTotales"]);
    ?>

<!-- Button trigger modal -->
<!-- <button type="button" id="anadir" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
+
</button> -->


<!-- Modal -->

<button id="abrirModal">+</button>


<!-- Ventana modal JS -->
<div id="ventanaModal" class="modalJS">
    <div class="contenido-modal">
        <span class="cerrar">&times;</span>
        <h6 class="tituloModal">Ventana Modal</h6>
        <br>
        <hr>
        <form onsubmit="return Validar(this, 'nombreCurso', 'profesor', 'fechaCurso')" >
            <label>Nombre:</label>
            <input type="text" id="nombreCurso" name="nombreCurso">
            <p id="ErrorNombre"></p>
            <br>
            <label>Profesor:</label>
            <input type="text" id="profesor" name="profesor">
            <p id="ErrorProfesor"></p>
            <br>
            <label>Tipo de curso:</label>
            <select>
                <option value="1">Sanitaria</option>
                <option value="2">Profesor</option>
            </select>
            <br>
            <label>Fecha:</label>
            <input type="date" id="fechaCurso" name="fechaCurso">
            <p id="ErrorFecha"></p>
            <br>
            <label>Importe:</label>
            <input type="number" step="1.00" id="importe" name="importe">
            <p id="ErrorImporte"></p>
            <br>
            <hr>
            <!-- <input class="boton" value="Guardar Cambios" type="button" onclick="importeNoNegativo()"> -->
            <input type="submit" value="Entrar" onclick="todos()">
        </form>

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
<div class="modal fade" id="IngresoPrestamo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

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

<!-- Modal Seguro desea Eliminar -->

<div class="modal fade" id="modalEliminarCurso" tabindex="-1">
  <div class="modal-dialog modal-dialog-center"> 
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modalCerrarAccionLabel">
                        ¿Estas seguro que quieres eliminar el curso?
              </h5>
          </div>

          <div  class="modal-footer"> 
              <form method="post" id="formCerrarAccion" action="<?php echo RUTA_URL ?>/admin/del_curso">
              
                <input type="hidden" id="id_curso" name="id_curso">
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

<div class="container">

<table class="table table-striped table-hover">
  <thead class="thead-azul">
    <tr>
    <th scope="col">Nº Curso</th>
    <th scope="col">Nombre</th>
    <th scope="col">Profesor</th>
    <th scope="col">Fecha</th>
    <th scope="col">Detalle</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($datos["CursosTotales"] as $curso): ?>
      <tr>
        <th scope="row"><?php echo $curso ->Id_Curso?></th>
        <td><?php echo $curso ->Nombre?></td>
        <td><?php echo $curso ->Profesor?></td>
        <td><?php echo $curso ->Fecha?></td>
        <td>
          <button type="button" data-bs-toggle="modal" data-bs-target="#VerMas" class="w-100 btn btn-warning btn-lg">
            <i class="bi bi-search"></i>     
          </button>
          <button type="button" onclick="place_id(<?php echo $curso -> Id_Curso ?>)" data-bs-toggle="modal" data-bs-target="#modalEliminarCurso" class="w-100 btn btn-warning btn-lg">
            <i class="bi bi-trash"></i>      
          </button>
        </td>

        <!-- <?php echo RUTA_URL ?>/asesorias/ver_asesoria/<?php echo $asesoria->id_asesoria ?> -->

      </tr>
    <?php endforeach?>
  </tbody>
</table>
<div class="Cursos">
<nav aria-label="Page navigation example">
<ul class="pagination justify-content-center">
<li class="page-item"><a class="page-link" href="#">Previous</a></li>
<li class="page-item"><a class="page-link" href="#">1</a></li>
<li class="page-item"><a class="page-link" href="#">2</a></li>
<li class="page-item"><a class="page-link" href="#">3</a></li>
<li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul>
</nav>
</div>
</div>


    

    
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>