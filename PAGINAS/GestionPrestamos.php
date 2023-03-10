<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Gestion Préstamos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,900;1,900&family=Source+Sans+Pro:wght@700&display=swap" rel="stylesheet"> 
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

    .Ingreso{
      font-family: 'Montserrat', sans-serif;
      color:#04B431;
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



<div class="container">
    <table class="table table-striped table-hover">
      <thead class="thead-azul">
        <tr>
        <th scope="col">Nº Préstamo</th>
        <th scope="col">Tipo Beca</th>
        <th scope="col">Nombre Persona</th>
        <th scope="col">Fecha</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Estado</th>
        <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Agricultura</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>Mark</td>
          <td>Otto</td>
          <td>
              
              <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
                <i class="bi bi-search"></i>
              </a>

              <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#IngresoPrestamo">
                <i class="bi bi-cash-coin"></i>
              </a>
              
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Agricultura</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>Mark</td>
          <td>Otto</td>
          <td>
              
              
              <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
                <i class="bi bi-search"></i>
              </a>
              
              <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#IngresoPrestamo">
                <i class="bi bi-cash-coin"></i>
              </a>

          </td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Agricultura</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>Mark</td>
          <td>Otto</td>
          <td>
              
              <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
                <i class="bi bi-search"></i>
              </a>

              <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#IngresoPrestamo">
                <i class="bi bi-cash-coin"></i>
              </a>

          </td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Agricultura</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>Mark</td>
          <td>Otto</td>
          <td>
              
              <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
                <i class="bi bi-search"></i>
              </a>

              
              <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#IngresoPrestamo">
                <i class="bi bi-cash-coin"></i>
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
</body>
</html>