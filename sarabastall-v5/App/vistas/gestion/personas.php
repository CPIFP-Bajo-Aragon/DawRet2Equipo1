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

    <?php $pageLists = listElements($datos["PersonasTotales"]) ?>

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

<input disabled id="page_controller" name="persona" value="0" hidden>

<div class="container">
<div class="col-3">
    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
      <input type="search" class="form-control form-control-dark" id="buscador" name="buscador" placeholder="Buscador" aria-label="Search">
    </form>
  <button id="buscador" onclick="buscar()">BUSCAR</button>
  <select name="Tipo">
        <option id="admin" onclick="filtrarRolAdmin()">Administrador</option>
        <option id="profesor" onclick="filtrarRolProfesor()">Profesor</option>
        <option id="master" onclick="filtrarRolMaster()">Master</option>
  </select>
  <br>
</div>
<table class="table table-striped table-hover">
  <thead class="thead-azul">
    <tr>
    <th scope="col">Nº</th>
    <th scope="col">Nombre</th>
    <th scope="col">Apellidos</th>
    <th scope="col">Direccion</th>
    <th scope="col">Fecha Nacimiento</th>
    <th scope="col">Telefono</th>
    <th scope="col">Email</th>
    <th scope="col">Usuario</th>
    <th scope="col">Tipo Rol</th>
    <th scope="col">Detalle</th>
    </tr>
  </thead>
  <tbody id="contenido_tabla">
    
  </tbody>
</table>

<div class="Cursos">
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <?php if(count($datos["PersonasTotales"]) > 8):?>
        <li class="page-item disabled" id="page_a"><a class="page-link" onclick='anterior(<?php echo json_encode($pageLists)?>)'>Anterior</a></li>
      
        <li id="page_1" class="page-item"><a class="page-link" name="1" onclick='go_page(this, <?php echo json_encode($pageLists)?>)'>1</a></li>
        <?php for($i = 1; $i*8 <= count($datos["PersonasTotales"]); $i++): ?>
          <li id="page_<?php echo $i+1 ?>" class="page-item"><a class="page-link" name="<?php echo $i+1 ?>" onclick='go_page(this, <?php echo json_encode($pageLists)?>)'><?php echo $i+1 ?></a></li>
          
        <?php endfor ?>
        
        <li class="page-item" id="page_s"><a class="page-link" onclick='siguiente(<?php echo json_encode($pageLists)?>)'>Siguiente</a></li>
        
      <?php endif ?>
    </ul>
  </nav>
</div>


<script>
  window.onload=listar_elementos(<?php echo json_encode($pageLists)?>);
</script>


</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>