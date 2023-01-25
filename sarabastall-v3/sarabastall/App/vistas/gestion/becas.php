<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<style>

#anadir{
  float:right;
  background-color: #0d6efd;
}

.container {
  text-align: center;
}

table{
  font-family: 'Montserrat', sans-serif;
}

.table-striped tbody tr:nth-of-type(odd) {
  background-color: #8ec4ff;
}

.table-hover tbody tr:hover {
  background-color: #2E64FE;
  color: #FFFFFF;
}

.thead-azul {
  background-color: #5b9bd5;
  color: white;
}

.page-item{
  font-family: 'Source Sans Pro', sans-serif;
}

#breadcrumb-item{
  color: #0d6efd;
}

.Pago{
  font-family: 'Montserrat', sans-serif;
  color:#B40404;
}

.modal{
  font-family: 'Montserrat', sans-serif;
}

</style>
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

    <div class="mb-3">
      <label for="NombreText" class="form-label">Nombre:</label>
      <input type="text" class="form-control" id="text" aria-describedby="text">
      <div id="textoAlumno" class="form-text">Introduce el nombre de un alumno ya existente.</div>
    </div>

    <div class="mb-3">
      <label for="Tutor" class="form-label">Tutor:</label>
      <input type="text" class="form-control" id="text" aria-describedby="text">
    </div>

    <label for="NombreText" class="form-label">Tipo de Beca:</label>
    <select class="form-select" aria-label="Default select example">
        <option value="1">JRM</option>
        <option value="2">Refugio</option>
        <option value="3">Carrera</option>
    </select>

    <label for="NombreText" class="form-label">Centro:</label>
    <select class="form-select" aria-label="Default select example">
        <option value="1">F</option>
        <option value="2">A</option>
        <option value="3">C</option>
    </select>
    
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Fecha:</label>
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



<div class="container">
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
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>
          
          <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
            <i class="bi bi-search"></i>
          </a>

        
          
      </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>
          
          
          <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
            <i class="bi bi-search"></i>
          </a>
          
          
      </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>
          
          <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
            <i class="bi bi-search"></i>
          </a>
          
          
      </td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>
          
          <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
            <i class="bi bi-search"></i>
          </a>
          
          
      </td>
    </tr>
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