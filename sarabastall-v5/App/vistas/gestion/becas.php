<?php require_once RUTA_APP.'/vistas/inc/header.php'?>


</head>
<body>
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Menu</a></li>
        <li class="breadcrumb-item active" aria-current="page">Gestion Becas</li>
    </ol>
</nav>
    <h1>Becas</h1>
    

<!-- Button trigger modal -->
<button type="button" id="anadir" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
+
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Nueva Beca</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">

  <form method="post" action="<?php echo RUTA_URL ?>/admin/add_beca">
    <div class="mb-3">
      <label for="NombreText" class="form-label">Nombre:</label>
      <select name="Id_Persona">
      <?php foreach($datos["nombrealumno"] as $becasNombreAlumno): ?>
        <option value="<?php echo $becasNombreAlumno->Id_Persona ?>"><?php echo $becasNombreAlumno->Nombre?></option>
        <?php endforeach?>
      </select>
      <!-- <input type="text" class="form-control" id="Nombre" name ="Nombre" aria-describedby="text">
      <div id="textoAlumno" class="form-text">Introduce el nombre de un alumno ya existente.</div> -->
      
    </div>

    <label for="NombreText" class="form-label">Tipo de Beca:</label>
    <select name="Id_Tipo_Beca">
      <?php foreach($datos["tipobeca"] as $becasTipo): ?>
        <option value="<?php echo $becasTipo->Id_Tipo_Beca ?>"><?php echo $becasTipo->Tipo_Beca?></option>
        <?php endforeach?>
      </select>


    <label for="NombreText" class="form-label">Centro:</label>
    <select name="Id_Ciudad">
      <?php foreach($datos["ciudades"] as $becasCentro): ?>
        <option value="<?php echo $becasCentro->Id_Centro ?>"><?php echo $becasCentro->Nombre?></option>
        <?php endforeach?>
    </select>

    <label for="NombreText" class="form-label">Centro:</label>
    <select name="Id_Centro">
      <?php foreach($datos["centros"] as $becasCiudad): ?>
        <option value="<?php echo $becasCiudad->Id_Ciudad ?>"><?php echo $becasCiudad->Nombre?></option>
        <?php endforeach?>
      </select>

    
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Fecha:</label>
        <input type="date" class="form-control" id="Fecha_Beca" name="Fecha_Beca">
    </div>
    
    <div class="mb-3">
        <label for="Importe" class="form-label">Importe:</label>
        <input type="number" step="1.00" class="form-control" id="Importe" name="Importe" aria-describedby="text" required>
    </div>
    
    <br>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="Observaciones" name="Observaciones"></textarea>
        <label for="floatingTextarea">Observaciones</label>
    </div>

    </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    <button type="button" class="btn btn-primary">Guardar cambios</button>
    <input type="submit" value="Entrar">
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
    <h5 class="modal-title" id="exampleModalLabel">Pagos</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">

  <div class="list-group">
    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
      <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">Pago realizado</h5>
        <small class="text-muted">25/09/2022</small>
      </div>
      <p class="Pago">230</p>
    </a>
    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
      <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">Pago realizado</h5>
        <small class="text-muted">26/09/2022</small>
      </div>
      <p class="Pago">150</p>
    </a>
    <a href="#" class="list-group-item list-group-item-action">
      <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">Pago realizado</h5>
        <small class="text-muted">28/09/2022</small>
      </div>
      <p class="Pago">70</p>
    </a>
  </div>
    
    <br>
    <?php foreach ($datos["BecasTotales"] as $becas): ?>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"><?php echo $becas ->Observaciones?></textarea>
        <label for="floatingTextarea">Observaciones</label>
    </div>
    <?php endforeach?>
    </div>
    
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    <button type="button" class="btn btn-primary">Guardar cambios</button>
  </div>
</div>
</div>
</div>
</div>



<div class="container">
<div class="col-3">
    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
      <input type="search" class="form-control form-control-dark" id="buscador" name="buscador" placeholder="Buscador" aria-label="Search" onkeyup="buscar()">
    </form>
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="Tipo">
      <option selected id="refresh">Tipos de Beca</option>
      <option id="JRM" onclick="filtrarTipoBeca1()">JRM</option>
      <option id="CARRERA" onclick="filtrarTipoBeca2()">CARRERA</option>
      <option id="REFUGIO" onclick="filtrarTipoBeca3()">REFUGIO</option>
    </select>
  </div>
  <br>
<table class="table table-striped table-hover">
  <thead class="thead-azul">
    <tr>
    <th scope="col">Nº Beca</th>
    <th scope="col">Tipo Beca</th>
    <th scope="col">Alumno</th>
    <th scope="col">Tutor</th>
    <th scope="col">Cuantía(€)</th>
    <th scope="col">Fecha</th>
    <th scope="col">Detalle</th>
    </tr>
  </thead>
  <tbody id="tbody">
  <?php foreach ($datos["BecasTotales"] as $becas): ?>
    <tr>
      <th scope="row"><?php echo $becas ->Id_Beca?></th>
      <td><?php echo $becas ->Tipo_Beca?></td>
      <td><?php echo $becas ->Nombre?></td>
      <td><?php echo $becas ->Tutor_Legal?></td>
      <td><?php echo $becas ->Importe?></td>
      <td><?php echo $becas ->Fecha_Beca?></td>
      <td>
          
          <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
            <i class="bi bi-search"></i>
          </a>
         
          <button type="button" class="w-80 btn btn-warning btn-lg">
            <i class="bi bi-search"></i>
          </button>        
          
      </td>
    </tr>
    <tr>
    <?php endforeach?>
  </tbody>
</table>
<div class="Centros">
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