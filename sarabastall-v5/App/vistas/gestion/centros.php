<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>/admin/index">Menu</a></li>
        <li class="breadcrumb-item active" aria-current="page">Gestion Centros</li>
    </ol>
</nav>
    <h1>CENTROS</h1>
    <button id="botonCiudad">Añadir Nueva Ciudad</button>


<!-- Ventana modal para insertar un nuevo centro -->
<div id="ventanaModal" class="modalJS">
    <div class="contenido-modal">
        <span class="cerrar">&times;</span>
        <h4 class="tituloModal">Crear nuevo centro</h4>
        <br>
        <hr>
        <form method="post" action="<?php echo RUTA_URL ?>/admin/add_centro">
            <label>Nombre Centro:</label>
            <input type="text" id="nombreCentro" name="nombreCentro">
            <p id="ErrorNombre"></p>

            <label>Ciudad:</label>
            <select name="selectNombre">
              <?php foreach($datos["ciudades"] as $ciudad): ?>
                <option value="<?php echo $ciudad->Id_Ciudad ?>"><?php echo $ciudad->Nombre_Ciudad?></option>
              <?php endforeach ?>
            </select>

            <label>Cuantia:</label>
            <input type="number" step="any" id="cuantia" name="cuantia"> 
            <p id="ErrorCuantia"></p>

            <input type="submit" value="Insertar" onclick="todos()">
        </form>

    </div>
</div>

<!-- Ventana modal para añadir nuevas ciudades -->
<div id="MODAlciudad" class="modalJS">
    <div class="contenidoModal">
        <span class="cerrarVentana">&times;</span>
        <h4 class="titulo">Crear nuevas ciudades</h4>
        <br>
        <br>
        <form method="post" action="<?php echo RUTA_URL ?>/admin/add_ciudad">
            <label>Nombre Ciudad:</label>
            <input type="text" id="Nombre_Ciudad" name="Nombre_Ciudad">

            <label>Distancia:</label>
            <input type="number" step="any" id="Distancia" name="Distancia">

            <input type="submit" value="Agregar" onclick="todos()">
        </form>
    </div>
</div>

<!-- Contenedor principal con la tabla -->
<div id="container">
    <button id="abrirModal">+</button>
    
    <br>
    <br>
    <br>
    
    <div class="container">
      <br>
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
                      <a  href="<?php echo RUTA_URL ?>/admin/verCentro/<?php echo $centro->Id_Centro ?>">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#VerMas" class="w-80 btn btn-warning btn-lg">
                          <i class="bi bi-pencil-square"></i>
                        </button>
                      </a>
                    </td>
            </tr>
            <?php endforeach?>
          </tbody>
        </table>
                </div>
</div>

    
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>