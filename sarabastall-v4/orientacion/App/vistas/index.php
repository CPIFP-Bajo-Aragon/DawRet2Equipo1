<?php require_once RUTA_APP.'/vistas/inc/header.php';

?>

<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Home</li>
  </ol>
</nav>
<div class="row-d-flex justify-content-center-text-center">
    <div class="col-12">
    <h1>
    Asesorias Nuevas o activas
    </h1>
    <?php 
    //print_r($this->datos["asesoriasActivas"]);
    ?>
    </div>
</div>


  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <a  class="btn btn-primary me-md-2" type="button" href="<?php echo RUTA_URL ?>/asesorias/addAsesoria">+</a>
  </div>

  <br>

<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titulo</th>
      <th scope="col">Datos Personales(Nombre, DNI, telefono, Email)</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Domicilio</th>
      <!-- <th scope="col">Fecha Inicio</th> -->
      <th scope="col">Estado</th>
      <?php if(!tienePrivilegios($this->datos["usuarioSesion"]->id_rol, [200, 300])):?>
      <th scope="col">Acciones</th>
      <?php endif ?>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php foreach ($datos["asesoriasActivas"] as $asesoria): ?>
      <th scope="row"><?php echo $asesoria ->id_asesoria?></th>
      <td><?php echo $asesoria ->titulo_as?></td>
      <td>
        <?php echo ($asesoria ->nombre_as) ? "Nombre: ".$asesoria->nombre_as."<br>" : "";?>
        <?php echo ($asesoria ->dni_as) ? "DNI: ".$asesoria->dni_as."<br>" : "";?>
        <?php echo ($asesoria ->telefono_as) ? "Telefono: ".$asesoria->telefono_as."<br>" : "";?>
        <?php echo ($asesoria ->email_as) ? "Email: ".$asesoria->email_as."<br>" : "";?>
      </td>
      <td><?php echo $asesoria ->descripcion_as?></td>
      <td><?php echo $asesoria ->domicilio_as?></td>
      <!-- <td><?php echo formatoFecha ($asesoria ->fecha_inicio)?></td> -->
      <td>
        <?php if($asesoria->id_estado == 1): ?>
        <strong class="text-success"><?php echo $asesoria ->estado?>
        <?php elseif($asesoria->id_estado == 2): ?>
        <strong class="text-warning"><?php echo $asesoria ->estado?>
        <?php endif ?>
      </td>


      <?php if(!tienePrivilegios($this->datos["usuarioSesion"]->id_rol, [200, 300])):?>
      <td>
        <a class="btn btn-outline-success btn-sm" href="<?php echo RUTA_URL ?>/asesorias/ver_asesoria/<?php echo $asesoria->id_asesoria ?>">
            <i class="bi-eye"></i>
        </a>
        <a class="btn btn-outline-warning btn-sm">
            <i class="bi-pencil-square"></i>
        </a>
        <a class="btn btn-outline-danger btn-sm">
            <i class="bi-trash"></i>
        </a>
      </td>
      <?php endif ?>
    </tr>
    <tr>
      <td></td>
      <td colspan="7">
          <?php foreach($asesoria->acciones as $accion): ?>
            <strong>Accion:</strong>
            <?php echo $accion->accion?>
            &nbsp;&nbsp;&nbsp;
            <strong>Fecha:</strong>
            <?php echo formatoFecha($accion->fecha_reg)?>
            &nbsp;&nbsp;&nbsp;
            <strong>Creada por:</strong>
            <?php echo $accion->nombre_completo?>
            &nbsp;&nbsp;&nbsp;
            <strong>Accion:</strong>
            <?php echo $accion->accion?>
          <?php endforeach ?>
      </td>

    </tr>
    <?php endforeach?>
  </tbody>
</table>

</div>

    

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
