<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
</head>
<body>
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Menu</a></li>
        <li class="breadcrumb-item active" aria-current="page">Gestion Personas</li>
    </ol>
</nav>
    <h1>Personas</h1>

    

<!-- Modal -->

<button id="abrirModal">+</button>


<!-- Ventana modal JS -->
<div id="ventanaModal" class="modalJS">
    <div class="contenido-modal">
        <span class="cerrar">&times;</span>
        <h6 class="tituloModal">Añadir Persona</h6>
        <br>
        <hr>
        <form method="post" action="<?php echo RUTA_URL ?>/admin/add_persona">
            <label>Nombre:</label>
            <input type="text" id="nombrePersona" name="nombrePersona">
            <p id="ErrorNombre"></p>
            <br>
            <label>Apellidos:</label>
            <input type="text" id="apellidosPersona" name="apellidosPersona">
            <p id="ErrorProfesor"></p>
            <br>
            <br>
            <label>Direccion:</label>
            <input type="text" id="direccionPersona" name="direccionPersona">
            <p id="ErrorProfesor"></p>
            <br>
            <label>Fecha Nacimiento:</label>
            <input type="date" id="fechaNacimientoPersona" name="fechaNacimientoPersona">
            <p id="ErrorFecha"></p>
            <br>
            <label>Telefono:</label>
            <input type="text" id="telefonoPersona" name="telefonoPersona">
            <p id="ErrorImporte"></p>
            <br>
            <label>Email:</label>
            <input type="text" id="emailPersona" name="emailPersona">
            <p id="ErrorFecha"></p>
            <br>
            <br>
            <!-- <label>Login:</label>
            <input type="text" id="loginPersona" name="loginPersona">
            <p id="ErrorFecha"></p> -->
            <hr>
            <input class="boton" value="Guardar Cambios" type="button" onclick="importeNoNegativo()">
            <input type="submit" value="Entrar" onclick="todos()">
            <div class="col-10">
                <button type="submit" class="w-100 btn btn-success btn-lg">Guardar</button>
            </div>
        </form>

    </div>
</div>

<!-- Modal Seguro desea Eliminar -->

<div class="modal fade" id="modalEliminarPersona" tabindex="-1">
  <div class="modal-dialog modal-dialog-center"> 
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modalCerrarAccionLabel">
                        ¿Estas seguro que quieres eliminar la persona?
              </h5>
          </div>

          <div  class="modal-footer"> 
              <form method="post" id="formCerrarAccion" action="<?php echo RUTA_URL ?>/admin/eliminarPersona">
              <input type="hidden" id="Id_Eliminar" name="id_persona">
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


<div class="container" id="contenedor">
<div class="col-3">
    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
      <input type="search" class="form-control form-control-dark" id="buscador" name="buscador" placeholder="Buscador" aria-label="Search">
    </form>

    <button type="button" onclick="buscar()" class="btn btn-primary">
        <i class="bi bi-search"></i>
    </button>
  

    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="Tipo">
      <option selected id="refresh">Tipos de Rol</option>
      <option id="admin" onclick="filtrarRolAdmin()">Administrador</option>
      <option id="profesor" onclick="filtrarRolProfesor()">Profesor</option>
      <option id="master" onclick="filtrarRolMaster()">Master</option>
    </select>
  <br>
  
</div>
<table class="table table-striped table-hover" id="TablaOrden">
  <thead class="thead-azul">
    <tr>
    <th scope="col">Nº</th>
    <th scope="col">Nombre</th>
    <th scope="col">Apellidos</th>
    <th scope="col">Direccion</th>
    <th scope="col">Fecha Nacimiento

    <button type="button" name="ordenard" id="ordenar" value="Ordenar por Fecha" onclick="ordenasc()">ASCENDENTE</button>

    <button type="button" name="ordenard" id="ordenar" value="Ordenar por Fecha" onclick="ordendes()">DESCENDENTE</button>

    </th>
    <th scope="col">Telefono</th>
    <th scope="col">Email</th>
    <th scope="col">Usuario</th>
    <th scope="col">Tipo Rol</th>
    <th scope="col">Detalle</th>
    </tr>
  </thead>
  <tbody id="tbody">
    <?php foreach ($datos["PersonasTotales"] as $persona): ?>
      <tr>
        <th scope="row"><?php echo $persona ->Id_Persona?></th>
        <td><?php echo $persona ->Nombre?></td>
        <td><?php echo $persona ->Apellidos?></td>
        <td><?php echo $persona ->Direccion?></td>
        <td><?php echo $persona ->Fecha_Nacimiento?></td>
        <td><?php echo $persona ->Telefono?></td>
        <td><?php echo $persona ->Email?></td>
        <td><?php echo $persona ->Login?></td>
        <td><?php echo $persona ->Nombre_Rol?></td>
        <td>
          <!--Aqui van 2 botones-->
          <a href="<?php echo RUTA_URL ?>/admin/verPersona/<?php echo $persona->Id_Persona ?>">
          <button type="button" class="w-80 btn btn-warning btn-lg">
            <i class="bi bi-pencil-square"></i>
          </button>
          <a>

          <a class="btn btn-outline-success btn-sm" href="<?php echo RUTA_URL ?>/admin/verPersona/<?php echo $persona->Id_Persona ?>">
            <i class="bi bi-pencil-square"></i>
          </a>

          <button type="button"  onclick="place_id(<?php echo $persona -> Id_Persona ?>)" data-bs-toggle="modal" data-bs-target="#modalEliminarPersona" class="w-80 btn btn-warning btn-lg">
            <i class="bi bi-trash"></i>      
          </button>
        </td>

      </tr>
    <?php endforeach?>
  </tbody>
</table>
<div class="paginacion">
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

<script type="text/javascript">
  const datosTabla=<?php echo json_encode($persona)?>;
</script>

</div>



<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>