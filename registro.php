<?php 
    include_once 'Clases/config.php';
 ?>
 
 <!DOCTYPE html>
<html lang="es">

<?php include_once 'Plantillas/head.php'; ?>
<head><title>Registro Usuario</title></head>
<body>
	<div class="container">
        <div class="row d-flex justify-content-around mt-5">
            <div class="card col-md-6 col-md-offset-6">
                <article class="card-body">
                    <h4 class="card-title mb-4 mt-1 text-center">Registro</h4>
                    <form action="POST" class="form_registro">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="email" require>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" placeholder="*******" require>
                        </div>
                        <div class="form-group">
                            <label>Empresa</label>
                            <input type="text" class="form-control" placeholder="Empresa" require>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                        </div>
                    </form>
                    <div id="msg_error" class="alert alert-danger" role="alert" style="display: none">Error</div>
                </article>
            </div>
        </div>
	</div>
       
<?php include_once 'Plantillas/footer.php'; ?>
</body>
</html>
