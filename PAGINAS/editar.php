<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  </head>
  <body>
    <div class="container">
        
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Menu</a></li>
            <li class="breadcrumb-item"><a href="#">Gestion Personas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>
    <div class="col-sm-12 d-flex justify-content-center">
        <h1 class="text-center">Editar Persona </h1>
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
                    <label for="exampleFormControlInput1" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>

            
            
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Direccion:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>

            <div class="col-3">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Fecha Nacimiento:</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>

            <div class="col-3">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Telefono:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>
              
        </div>
        <br>

        <div class="col-sm-12 d-flex justify-content-center">
            <h3 class="text-center">Usuario </h3>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label ">Usuario:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>

            <div class="col-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>

            <div class="col-4">
                <div class="mb-3">
                    <label for="disabledSelect" class="form-label">Tipo de Rol:</label>
                    <select id="disabledSelect" class="form-select">
                      <option>Profesor</option>
                      <option>Trabajador</option>
                      <option>Admin</option>
                    </select>
                  </div>
            </div>

            
            
        </div>

        <div class="col-sm-12 d-flex justify-content-center">
            <button type="button" class="btn btn-primary text-center">Confirmar</button>
        </div>

            
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  </body>
</html>