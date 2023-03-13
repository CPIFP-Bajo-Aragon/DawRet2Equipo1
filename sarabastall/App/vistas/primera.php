<<<<<<< HEAD
<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<div id="container">

<br>

    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Menu</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gestion Centros</li>
            </ol>
     </nav>  
      
    <h1>CENTROS</h1>

  <!-- Boton para añadir nuevos centros -->
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <a  class="btn btn-primary me-md-2" type="button" href="<?php echo RUTA_URL ?>/sarabastall/addCentro">+</a>
  </div>
  <!-- <button type="button" id="anadir" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button> -->



    <!-- Modal que se abre al clicar en el + para añadir nuevos centros -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Centro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="NombreText" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="text" aria-describedby="text">
                        <div id="textoAlumno" class="form-text">Introduce el nombre de un nuevo centro.</div>
                    </div>

                    <div class="mb-3">
                        <label for="Concepto" class="form-label">Ciudad en la que se encuentra el centro:</label>
                        <input type="text" class="form-control" id="text" aria-describedby="text">
                    </div>

                    <div class="mb-3">
                        <label for="Concepto" class="form-label">Kilometros que hay desde Hushé a esta ciudad:</label>
                        <input type="text" class="form-control" id="text" aria-describedby="text">
                    </div>

                    <div class="mb-3">
                        <label for="Concepto" class="form-label">Cuantía:</label>
                        <input type="text" class="form-control" id="text" aria-describedby="text">
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Insertar nuevo centro</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ver Mas -->
    <!-- <div class="modal fade" id="VerMas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div> -->


    <!-- Modal ingresos -->
    <!-- <div class="modal fade" id="IngresoPrestamo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div> -->
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
                <th scope="col">Distancia</th>
                <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>
                <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
                  <i class="bi bi-pencil-square"></i>
                </a>
                
                <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
                    <i class="bi bi-trash"></i>
                  </a>
            </td>
    
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>
                  <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
                    <i class="bi bi-pencil-square"></i>
                  </a>
                  <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
                    <i class="bi bi-trash"></i>
                  </a>
              </td>
            </tr>

            <tr>
              <th scope="row">3</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>
                  <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
                    <i class="bi bi-pencil-square"></i>
                  </a>
                  <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
                    <i class="bi bi-trash"></i>
                  </a>
              </td>
            </tr>

            <tr>
              <th scope="row">4</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>
                  <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
                    <i class="bi bi-pencil-square"></i>
                  </a>
                  <a class="btn btn-link-primary" href="#" data-bs-toggle="modal" data-bs-target="#VerMas">
                    <i class="bi bi-trash"></i>
                  </a>
              </td>
            </tr>

          </tbody>
        </table>

        <br>
        <br>

        <!-- Paginacion para centros -->
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


</div>
=======
<?php require_once RUTA_APP.'/vistas/inc/header_no_login.php'?>

<div id="menuFondo">
    <div class="row d-flex justify-content-center text-center " >
        <div class="titulosPrincipales">
            <h1>
                <span class="titulo1">¿Quienes    </span>
                <span class="titulo2">Somos?</span>
            </h1>
        </div>

        <br>

        <div class="contenido">
            <div>
                <p>Pequeña ONG española, que nace y trabaja en la provincia de Zaragoza, en Caspe y su Comarca, y desarrollamos
                 proyectos de cooperación en Asia.</p>
            </div>
            
            <div>
                <p>En 1983, un grupo de jóvenes empezamos a realizar campamentos de verano para niños y niñas de la zona,
                en el Pirineo aragonés. Ampliaron los proyectos y, además de los campamentos, comenzamos a realizar actividades medioambientales, 
                solidarias y culturales. La cual surgió la Asociación Sarabastall en un referente de participación social y voluntariado.</p>
            </div>

            <div>
                <p>Cuando nuestros proyectos de cooperación comienzan a crecer, Sarabastall se organiza en dos entidades:</p>
            </div>

            <div id="div_asociacion_fundacion">
                <p><strong>-<u>ASOCIACIÓN SARABASTALL</u></strong> : Se encarga de desarrollar actividades culturales, de animación y campamentos de verano.</p>
            </div>

            <div id="div_asociacion_fundacion">
                <p><strong>-<u>FUNDACIÓN SARABASTALL. ONG</u></strong> : Inscrita en el Registro de la DGA con nº 319(I) según Orden publicada en el BOA del 16 de agosto de 2011, y
                 cuyo objeto es desarrollar proyectos de cooperación en países en vías de desarrollo, y realizar actividades de captación de fondos.</p>
            </div>

        </div>
    </div>

    <a id="acceder_sesion" class="btn btn-primary me-md-2" type="button" href="<?php echo RUTA_URL ?>/login">ACCEDER</a>

</div>

>>>>>>> david
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>