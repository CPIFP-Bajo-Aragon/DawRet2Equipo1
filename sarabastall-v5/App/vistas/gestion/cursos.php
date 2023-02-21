<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

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

    <!-- FILTROS -->

    <!--Funcion array y pagina que devuelva el nuevo array-->
    
<!-- Button trigger modal -->
<!-- <button type="button" id="anadir" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
+
</button> -->

<!-- Modal -->

<button id="abrirModal">+</button>


<!-- Ventana modal JS -->
<div id="ventanaModal" class="modalJS">
    <div class="contenido-modal">
        <span class="cerrar">&times;</span>
        <h6 class="tituloModal">Ventana Modal</h6>
        <br>
        <hr>
        <form method="post" onsubmit="return Validar(this, 'nombreCurso', 'profesor', 'fechaCurso')" action="<?php echo RUTA_URL ?>/admin/add_curso">
            <label>Nombre:</label>
            <input type="text" id="nombreCurso" name="nombre">
            <p id="ErrorNombre"></p>
            <br>
            <label>Profesor:</label>
            <select name="profesor">
              <?php foreach($datos["profesores"] as $profesor): ?>
                  <option value="<?php echo $profesor->Id ?>"><?php echo $profesor->Nombre ?></option>
              <?php endforeach ?>
            </select> <!--Problemas(FIXED), El Admin debe seleccionar un profesor de la bbdd e dejarlo indicado(de alguna frma, manteniendo el id del profe)-->
            <br>
            <label>Tipo de curso:</label>
            <select name="tipo">
              <?php foreach($datos["especialidades"] as $especialidad): ?>
                <option value="<?php echo $especialidad->Id ?>"><?php echo $especialidad->Nombre ?></option>
              <?php endforeach ?>
            </select>
            <br>
            <label>Fecha:</label>
            <input type="date" id="fechaCurso" name="fecha">
            <p id="ErrorFecha"></p>
            <br>
            <label>Importe:</label>  <!--Controlar que solo se usen valores numericos-->
            <input type="number" step="1.00" id="importe" name="importe">
            <p id="ErrorImporte"></p>
            <br>
            <hr>
            <!-- <input class="boton" value="Guardar Cambios" type="button" onclick="importeNoNegativo()"> -->
            <input type="submit" value="Entrar" onclick="todos()">
        </form>

    </div>
</div>



<!-- Modal Seguro desea Eliminar -->

<div class="modal fade" id="modalEliminarcurso" tabindex="-1">
  <div class="modal-dialog modal-dialog-center"> 
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modalCerrarAccionLabel">
                        ¿Estas seguro que quieres eliminar el curso?
              </h5>
          </div>

          <div  class="modal-footer"> 
              <form method="post" id="formCerrarAccion" action="<?php echo RUTA_URL ?>/admin/del_curso">
              
                <input type="hidden" id="Id_Eliminar" name="id_curso">
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

<!-- Modal Seguro desea Eliminar FINAL -->

<!-- BUSCADOR + FILTROS -->

<div class="col-3">
  <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
    <input type="search" class="form-control form-control-dark" id="buscador" name="buscador" placeholder="Buscador" aria-label="Search">
  </form>

  <button id="buscador" onclick="mod_show()"><i class="bi bi-search"></i></button>

  <select id="panel_filtro" name="Tipo" onchange="mod_show()">
  <option id="refresh" value="0" selected></option>
    <?php foreach($datos["especialidades"] as $especialidad): ?>
      <option value="<?php echo $especialidad->Id ?>"><?php echo $especialidad->Nombre ?></option>
    <?php endforeach ?>
  </select>
  <br>
</div>



<input disabled id="page_controller" name="curso" value="0" hidden>

<div class="container">

  <table class="table table-striped table-hover">
    <thead class="thead-azul">
      <tr>
      <th scope="col">Nº Curso</th>
      <th scope="col">Especialidad</th>
      <th scope="col">Nombre</th>
      <th scope="col">Profesor</th>
      <th scope="col">Fecha <button type="button" name="4" value="1" onclick="mod_show(this)"><i class="fa fa-sort"></i></button></th>
      <th scope="col">Detalle</th>
      </tr>
    </thead> 
    <tbody id ="contenido_tabla">

    </tbody>
  </table>

  <div class="Cursos">
    <nav aria-label="Page navigation example">
      <ul id="page_panel" class="pagination justify-content-center">
          
      </ul>
    </nav>
  </div>


  <h2 id="nomaches"></h2>

</div>



<br>
<br>
<br>

<script>

  window.onload=caja_fuerte(<?php echo json_encode($datos["CursosTotales"])?>); // Aqui pasamos el array en cuestion recibido por PHP

  window.onload=listar_elementos(true); // Se le pasa true indicando que es la primera vez que se ejecuta la funcion

</script>
    

    
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>