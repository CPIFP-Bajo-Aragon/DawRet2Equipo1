<?php require_once RUTA_APP.'/vistas/inc/header_no_login.php';?>


<div class="container">
    <br>
    <br>

    <h1 class="h3 mb-3 fw-normal">Log In</h1>

    <form method="post" class="card-body">
        <div class=" form-floating mb-3">
            <input type="text" name="usuario" class="form-control" placeholder="" required >
            <label for="floatingInput">Usuario </label>
        </div>
        <br>
        <div class=" form-floating mb-3">
            <input type="password" name="pass" class="form-control"  placeholder="" required>
           <label for="floatingPassword">Contraseña</label>
        </div>
        <br>
        <br>
        <input type="submit" class="btn btn-success" value="Login"></input>
    </form>

    <?php if(isset($datos['error']) && $datos['error'] == "error_1"): ?>
    
       
            <div class="alert alert-danger" role="alert">
               Usuario o contraseña incorrecto!!
            </div>
    <?php endif ?>

</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>