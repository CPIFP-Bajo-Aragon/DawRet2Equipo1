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

    <?php $pageLists = listElements($datos["CursosTotales"]) ?>

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

<div class="modal fade" id="modalEliminarCurso" tabindex="-1">
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

<input disabled id="page_controller" name="curso" value="0" hidden>

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
      
    <tbody id ="contenido_tabla">

        <!-- <tr>
          <th scope="row"><?php echo $curso ->Id_Curso?></th>
          <td><?php echo $curso ->Nombre?></td>
          <td><?php echo $curso ->Profesor?></td>
          <td><?php echo $curso ->Fecha?></td>
          <td>
            <h1>Ha</h1>
            <a href="<?php echo RUTA_URL ?>/admin/see_curso/<?php echo $curso->Id_Curso ?>">
            <button type="button" class="w-80 btn btn-warning btn-lg">
              <i class="bi bi-search"></i>   
            </button>
            </a>
            <button type="button" onclick="place_id(<?php echo $curso -> Id_Curso ?>)" data-bs-toggle="modal" data-bs-target="#modalEliminarCurso" class="w-80 btn btn-warning btn-lg">
              <i class="bi bi-trash"></i>      
            </button>
          </td>

          <?php echo RUTA_URL ?>/asesorias/ver_asesoria/<?php echo $asesoria->id_asesoria ?> -->

        


    </tbody>
  </table>

  <div class="Cursos">
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <?php if(count($datos["CursosTotales"]) > 8):?>

          <li class="page-item disabled" id="page_a"><a class="page-link" onclick='anterior(<?php echo json_encode($pageLists)?>)'>Anterior</a></li>
        
          <li id="page_1" class="page-item"><a class="page-link" name="1" onclick='go_page(this, <?php echo json_encode($pageLists)?>)'>1</a></li>

          <?php for($i = 1; $i*8 <= count($datos["CursosTotales"]); $i++): ?>

            <li id="page_<?php echo $i+1 ?>" class="page-item"><a class="page-link" name="<?php echo $i+1 ?>" onclick='go_page(this, <?php echo json_encode($pageLists)?>)'><?php echo $i+1 ?></a></li>
            
          <?php endfor ?>
          
          <li class="page-item" id="page_s"><a class="page-link" onclick='siguiente(<?php echo json_encode($pageLists)?>)'>Siguiente</a></li>
          
        <?php endif ?>
      </ul>
    </nav>
  </div>
</div>

<br>
<br>
<br>

<script>
  window.onload=listar_elementos(<?php echo json_encode($pageLists)?>);
</script>
    

    
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>