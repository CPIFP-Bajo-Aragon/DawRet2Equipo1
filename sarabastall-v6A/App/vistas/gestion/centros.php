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
    

<!--Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
 -->


<!-- Modal para la confirmacion de eliminar un registro de la tabla-->
<div class="modal fade" id="modalEliminarCentro" tabindex="-1">
  <div class="modal-dialog modal-dialog-center"> 
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modalCerrarAccionLabel">
                  ¿Seguro qué desea eliminar el centro?
              </h5>
          </div>

          <div  class="modal-footer"> 
              <form method="post" id="formCerrarAccion" action="<?php echo RUTA_URL ?>/admin/del_centro">
                <input type="hidden" id="Id_Eliminar" name="Id_Centro">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-warning">Eliminar</button>
              </form>
          </div>
      </div>
  </div> 
</div>

<!-- Contenedor principal con la tabla -->
<div id="container">
   <button type="button" id="anadir" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button> 
    <br>
    <br>
    <br>
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
          <tbody>
            <tr>
                <?php foreach ($datos["centros"] as $centro):  ?>

                    <th scope="row"><?php echo $centro ->Id_Centro?></th>
                    <td><?php echo $centro->Nombre?></td>
                    <td><?php echo $centro->Nombre_Ciudad?></td> 
                    <td><?php echo $centro->Cuantia?></td>
                    <td><?php echo $centro->Distancia?></td>

                    <td>
                      <button type="button" href="#" data-bs-toggle="modal" data-bs-target="#VerMas" class="w-80 btn btn-warning btn-lg">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                      <button type="button" onclick="place_id(<?php echo $centro->Id_Centro ?>)" data-bs-toggle="modal" data-bs-target="#modalEliminarCentro" class="w-80 btn btn-warning btn-lg">
                          <i class="bi bi-trash"></i>
                      </button>
                    </td>
            </tr>
            <?php endforeach?>
          </tbody>
        </table>
</div>


    

    
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>