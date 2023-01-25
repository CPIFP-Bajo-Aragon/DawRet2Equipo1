<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ver Asesoria</li>
            </ol>
        </nav>


        <h1><?php echo $datos['asesoria']->titulo_as ?></h1>

        

        <div class="row">
            <div class="mb-3 col-6">
                <div class="infoCard">
                    <h3>Información del Asesorado</h3>
                    <p><span>Nombre:</span> <?php echo $datos['asesoria']->nombre_as ?></p>
                    <p><span>DNI:</span> <?php echo $datos['asesoria']->dni_as ?></p>
                    <p><span>Telefono:</span> <?php echo $datos['asesoria']->telefono_as ?></p>
                    <p><span>Email:</span> <?php echo $datos['asesoria']->email_as ?></p>
                    <p><span>Domicilio:</span> <?php echo $datos['asesoria']->domicilio_as ?></p>
                </div>
                
            </div>
            <div class="mb-3 col-6">
                <div class="infoCard">
                    <h3>Información de la Asesoria</h3>
                    <p><span>Fecha de Creacion:</span> <?php echo $datos['asesoria']->fecha_inicio ?></p>
                    <p><span>Titulo:</span> <?php echo $datos['asesoria']->titulo_as ?></p>
                    <p><span>Descripcion:</span> <?php echo $datos['asesoria']->descripcion_as ?></p>
                    <?php if($datos['asesoria']->fecha_fin != null):?>
                        <p><span>Fecha de Finalizacion:</span> <?php echo $datos['asesoria']->fecha_fin ?></p>
                    <?php else:?>
                        <p><span>Fecha de Finalizacion:</span> Sin Concluir</p>
                    <?php endif ?>
                    <p><span>Estado:</span> <?php echo $datos['asesoria']->estado ?></p>
                </div>
                
            </div>
        </div>
        
        <h2>Acciones</h2>

        
        
    </div>

    

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>