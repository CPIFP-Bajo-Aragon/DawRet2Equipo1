<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>/admin/index">Menu</a></li>
        <li class="breadcrumb-item active" aria-current="page">Gestion Economia</li>
    </ol>
</nav>

    <div id="ventanaModal" class="modalJS"> 
        <div class="content">
            <span class="cerrar">&times;</span>
            <h4 class="title">Añadir nuevos movimientos</h4>
            <br>
            <hr>
            <form method="post" action="<?php echo RUTA_URL?>/admin/add_movimiento">
                <label>Concepto Movimiento:</label>
                <input type="text" id="concepto" name="concepto">
                <p id="ErrorNombre"></p>

                <label>Fecha:</label>
                <input type="date" id="fecha" name="fecha">
                <p id="ErrorFecha"></p>

                <label>Cantidad:</label>
                <input type="number" step="any" id="cuantia" name="cuantia"> 
                <p id="ErrorCuantia"></p>

                <label>Tipo Movimiento:</label>
                <select name="selectMovimiento">
                <?php foreach($datos["tipoMov"] as $tipoMovimiento): ?>
                    <option value="<?php echo $tipoMovimiento->Id_TipoMov ?>"><?php echo $tipoMovimiento->Nombre_TipoMov?></option>
                <?php endforeach ?>
                </select>

                <label>Beca relacionada</label>
                <select name="selectBeca">
                    <option id="enBlanco" value="null" cheked></option>
                    <?php foreach($datos['tipoBeca'] as $tipoBeca): ?>
                        <option value="<?php echo $tipoBeca->Id_Beca ?>"><?php echo "Id Beca: " ?><?php echo $tipoBeca->Id_Beca ?><?php echo " - " ?><?php echo "Importe: "?><?php echo $tipoBeca->Importe ?></option>
                    <?php endforeach ?>
                </select>
                <p>***Si el movimiento que desea hacer no está relacionado a una Beca, por favor seleccione el registro en blanco.</p>

                <input type="submit" value="Añadir nuevo movimiento" onclick="todos()">
            </form> 
        </div>
    </div>  

    <h1>ECONOMIA</h1>

<div id="contenido">
    <button id="abrirModal">+</button>
    <br>
    <br>
    <div id="contenido">
        <table class="table table-striped table-hover">
            <thead class="thead-azul">
                <tr>
                    <th scope="col">Nº Movimiento</th>
                    <th scope="col">Concepto</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Tipo Movimiento</th>
                    <th scope="col">Id Beca</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos["movimientos"] as $movimiento):?>
                    <tr>
                        <th scope="row"><?php echo $movimiento->Id_Movimiento?></th>
                        <td><?php echo $movimiento->Procedencia?></td>
                        <td> <?php echo formatFecha($movimiento->Fecha)?></td>
                        <td><?php echo $movimiento->Cantidad?></td>
                        <td><?php echo $movimiento->Nombre_TipoMov?></td>
                        <td><?php echo $movimiento->Id_Beca?></td>
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>
</div>



<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>