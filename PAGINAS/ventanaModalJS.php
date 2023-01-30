<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Gestion Cursos</title>
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

.modalJS {
  display: none;
  position: fixed;
  z-index: 1; /* Se situará por encima de otros elementos de la página*/
  padding-top: 30px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto; /* Se activará el scroll si es necesario */
  background-color: rgba(0,0,0,0.5); /* Se diferencie entre el modal y resto de la pagina */
  
}

/* Ventana o caja modal */
.contenido-modal {
  position: relative;
  background-color: white;
  margin: auto;
  padding: 10px;
  width: 25%;
}

.cerrar{
    float:right;
}

input[type=text], [type=date], [type=number], select {
    font-family: 'Montserrat', sans-serif;
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.tituloModal{
    float:left;
}

.boton{
    background-color: #0d6efd;
    border-radius: 5px;
    color: white;
    padding: 10px;
}

#abrirModal{
    float:right;
    background-color: #0d6efd;
    color:white;
    border-radius: 5px;
    padding-top:0.35em;
    padding-left:0.75em;
    padding-right:0.75em;
    padding-bottom:0.35em;
}


input:focus, input[type]:focus, select:focus {
    border-color: #95c0fe;
    box-shadow: 0 1px 1px  #95c0fe inset, 0 0 8px  #95c0fe;
    outline: 0 none;
}

  </style>
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


        

<!-- Button trigger modal -->


<button id="abrirModal">+</button>


<!-- Ventana modal JS -->
<div id="ventanaModal" class="modalJS">
    <div class="contenido-modal">
        <span class="cerrar">&times;</span>
        <h6 class="tituloModal">Ventana Modal</h6>
        <br>
        <hr>
        <form>
            <label>Nombre:</label>
            <input type="text" id="nombreCurso" name="nombreCurso" required>
            <p id="ErrorSoloLetras"></p>
            <br>
            <label>Profesor:</label>
            <input type="text" id="profesor" name="profesor" required>
            <br>
            <label>Tipo de curso:</label>
            <select>
                <option value="1">Sanitaria</option>
                <option value="2">Profesor</option>
            </select>
            <br>
            <label>Fecha:</label>
            <input type="date" id="fechaCurso" name="fechaCurso" required>
            <br>
            <label>Importe:</label>
            <input type="number" step="1.00" id="importe">
            <p id="ErrorImporte"></p>
            <br>
            <hr>
            <input class="boton" value="Guardar Cambios" type="button" onclick="importeNoNegativo()">
            <input type="submit" value="Entrar">
        </form>

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
        <tr>
          <th scope="row">1</th>
          <td>Agricultura</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>
              
              <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
                <i class="bi bi-search"></i>
              </a>

              <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#IngresoPrestamo">
                <i class="bi bi-trash3-fill"></i>
              </a>
              
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Agricultura</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>
              
              
              <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
                <i class="bi bi-search"></i>
              </a>
              
              <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#IngresoPrestamo">
                <i class="bi bi-trash3-fill"></i>
              </a>

          </td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Agricultura</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>
              
              <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
                <i class="bi bi-search"></i>
              </a>

              <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#IngresoPrestamo">
                <i class="bi bi-trash3-fill"></i>
              </a>

          </td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Agricultura</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>
              
              <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
                <i class="bi bi-search"></i>
              </a>

              
              <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#IngresoPrestamo">
                <i class="bi bi-trash3-fill"></i>
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
  <!-- Script JS -->
  <script src="ventanaModal.js" type="text/javascript"></script>
</body>
</html>