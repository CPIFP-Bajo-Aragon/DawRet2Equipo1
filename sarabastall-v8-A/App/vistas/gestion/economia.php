<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>/admin/index">Menu</a></li>
        <li class="breadcrumb-item active" aria-current="page">Gestion Economia</li>
    </ol>
</nav>

    <h1>ECONOMIA</h1>

    <div id="container">
        <br>
        <br>
        <br>
        <div class="container">
            <table class="table table-striped table-hover">
            <thead class="thead-azul">
                <tr>
                    <th scope="col">Nº Movimiento</th>
                    <th scope="col">Concepto</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cantidad</th>
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