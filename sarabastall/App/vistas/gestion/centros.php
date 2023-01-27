<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Menu</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gestion Préstamos</li>
        </ol>
    </nav>

    <h1>Centros</h1>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a  class="btn btn-primary me-md-2" type="button" href="<?php echo RUTA_URL ?>/asesorias/addCentro">+
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
        </a>
    </div>

    <table class="table table-striped table-hover">
        <thead class="thead-azul">
            <tr>
                <th scope="col">Nº Centro</th>
                <th scope="col">Nombre</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Distancia (Km)</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php foreach ($datos["centros"] as $asesoria): ?>
                <th scope="row"><?php echo $asesoria ->Id_Centro?></th>
                <td><?php echo $asesoria ->Nombre?></td>
                <td><?php echo $asesoria ->Id_Ciudad?></td> 
                <td><?php echo $asesoria ->Cuantia?></td>
                <td>
                    <a class="btn btn-link-primary" href="<?php echo RUTA_URL ?>/asesorias/ver_centro/<?php echo $asesoria->id_asesoria ?>" >
                        <i class="bi-pencil-square"></i>
                    </a>
                    <a class="btn btn-outline-danger btn-sm">
                        <i class="bi-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
    
    <div class="Centros">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#">Anterior</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">Siguiente</a>
                </li>
            </ul>
        </nav>
    </div>
</div>



<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>