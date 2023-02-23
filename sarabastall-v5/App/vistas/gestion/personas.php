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
            <label>Apellidos:</label>
            <input type="text" id="apellidosPersona" name="apellidosPersona">
            <p id="ErrorProfesor"></p>

            <label>Direccion:</label>
            <input type="text" id="direccionPersona" name="direccionPersona">
            <p id="ErrorProfesor"></p>

            <label>Fecha Nacimiento:</label>
            <input type="date" id="fechaNacimientoPersona" name="fechaNacimientoPersona">
            <p id="ErrorFecha"></p>

            <label>Telefono:</label>
            <input type="text" id="telefonoPersona" name="telefonoPersona">
            <p id="ErrorImporte"></p>

            <label>Email:</label>
            <input type="text" id="emailPersona" name="emailPersona">
            <p id="ErrorFecha"></p>
            <br>
            <hr>
            <!--<input class="boton" value="Guardar Cambios" type="button" onclick="importeNoNegativo()">-->
            
            <div class="">
                <button type="submit" value="Entrar" class="w-100 btn btn-success btn-lg" onclick="todos()">
                  Añadir
                </button>
            </div>
        </form>

    </div>
</div>

<!-- Modal Seguro desea Eliminar -->

<div class="modal fade" id="modalEliminarpersona" tabindex="-1">
  <div class="modal-dialog modal-dialog-center"> 
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modalCerrarAccionLabel">
                        ¿Estas seguro que quieres eliminar la persona?
              </h5>
          </div>

          <div  class="modal-footer"> 
              <form method="post" id="formCerrarAccion" action="<?php echo RUTA_URL ?>/admin/del_persona">
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

<!-- Modal Crear Usuario-->

<div class="modal fade" id="modalNewUser" tabindex="-1">
  <div class="modal-dialog modal-dialog-center"> 
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modalCerrarNewUserLabel">
                        Añadir Usuario
              </h5>
          </div>

          <div class="modal-footer"> 
            <form method="post" id="formCerrarAccion" action="<?php echo RUTA_URL ?>/admin/new_usuario">
              
              <label for="Importe" class="form-label">Usuario</label>
              <input type="text" class="form-control" name="usuario" aria-describedby="text" required>
              
              
              <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
              <input type="taxt" class="form-control" name="clave" required>
              
              <label for="exampleFormControlInput1" class="form-label">Rol</label>
              <select name="rol" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <?php foreach($datos["roles"] as $rol): ?>
                  <?php if ($rol->Id != 6): ?>
                    <option value="<?php echo $rol->Id ?>"><?php echo $rol->Nombre ?></option>
                  <?php endif ?>
                <?php endforeach ?>
              </select>


              <input type="hidden" id="Id_User" name="id_user">
              <br>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Cancelar
              </button>
              <button type="submit" class="btn btn-success">
                Crear
              </button>
            </form>
          </div>
      </div>
  </div> 
</div>

<input disabled id="page_controller" name="persona" value="0" hidden>

<div class="container">

<div class="col-3">
  <input type="search" class="form-control form-control-dark" id="buscador" name="buscador" placeholder="Buscador" aria-label="Search">

  <button id="buscador" onclick="mod_show()"><i class="bi bi-search"></i></button>

  <select id="panel_filtro" name="Tipo" onchange="mod_show()" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
  <option id="refresh" value="0" selected></option>
    <?php foreach($datos["roles"] as $rol): ?>
      <option value="<?php echo $rol->Id ?>"><?php echo $rol->Nombre ?></option>
    <?php endforeach ?>
  </select>
  <br>
</div>


<input disabled id="page_controller" name="persona" value="0" hidden>


<table class="table table-striped table-hover">
  <thead class="thead-azul">
    <tr>
    <th scope="col">Nº</th>
    <th scope="col">Tipo Rol</th>
    <th scope="col">Nombre <button type="button" name="2" value="1" onclick="mod_show(this)"><i class="fa fa-sort"></i></button></th>
    <th scope="col">Apellidos</th>
    <th scope="col">Direccion</th>
    <th scope="col">Fecha Nacimiento</th>
    <th scope="col">Telefono</th>
    <th scope="col">Email</th>
    <th scope="col">Usuario</th>
    <th scope="col">Detalle</th>
    </tr>
  </thead>
  <tbody id="contenido_tabla">
    
  </tbody>
</table>

<div class="Cursos">
  <nav aria-label="Page navigation example">
    <ul id="page_panel" class="pagination justify-content-center">
      
    </ul>
  </nav>
</div>

<h2 id="nomaches"></h2>

<script>
  window.onload=caja_fuerte(<?php echo json_encode($datos["PersonasTotales"])?>);
  window.onload=listar_elementos(true);
</script>


</div>

<br>
<br>
<br>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>