<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Prestamo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  </head>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <!-- Poner imagen -->
      <!-- <img src="" width="140" height="24" class="d-inline-block align-text-top"> -->
      
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      

      </ul>
    </div>
    <button type="button" class="btn btn-outline-danger btn-sm ml-auto">Cerrar Sesion</button>
  </div>
</nav>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Menu</a></li>
                <li class="breadcrumb-item"><a href="#">Gestion Préstamo</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nuevo Préstamo</li>
            </ol>
        </nav>
        <div class="col-sm-12 d-flex justify-content-center">
            <h1 class="text-center">Nuevo Prestamo </h1>
        </div>
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">Nombre:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                </div>
    
                <div class="col-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Apellidos:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                </div>
    
                <div class="col-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Fecha:</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1">
                    </div>
                </div>

            <div class="row">
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label ">Concepto:</label>
                    <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" ></textarea>
                    <label for="floatingTextarea2"></label>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Importe:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                </div>

            </div>

            <div class="row">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label ">Observaciones:</label>
                    <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" ></textarea>
                    <label for="floatingTextarea2"></label>
                    </div>
                </div>

            </div>
            
            <div class="col-sm-12 d-flex justify-content-center">
                <button type="button" class="btn btn-primary text-center">Confirmar</button>
            </div>

            </div>
            
                
            </div>
            
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  </body>

</html>