<?php 
require_once "../Clases/config.php";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        header("Content-Type: application/json");
        $array_devolver = [];
        $email = strtolower($_POST['email']);
        
        // Comprobar si el usuario existe
        $buscar_user = $con->prepare("SELECT * FROM usuarios WHERE email = :email LIMIT 1");
        $buscar_user->bindParam(':email', $email, PDO::PARAM_STR);
        $buscar_user->execute();
        
        if($buscar_user->rowCount() == 1){
                // Existe                
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $empresa = $_POST['empresa'];
                
                    // Modificamos el usuario
                    $nuevo_user = $con->prepare("UPDATE usuarios SET password = :password, empresa = :empresa WHERE email = :email");
                    $nuevo_user->bindParam(':password', $password, PDO::PARAM_STR);
                    $nuevo_user->bindParam(':empresa', $empresa, PDO::PARAM_STR);
                    $nuevo_user->bindParam(':email', $email, PDO::PARAM_STR);
                    $nuevo_user->execute();
                
                    // Recuperamos el último registro
                    $userID = $con->lastInsertId();
                    $_SESSION['userID'] = (int) $userID;
                    $array_devolver['redirect'] = 'http://localhost/LoginWeb/usuario.php';
                    $array_devolver['is_login'] = true;
                    
            } else {
                    // No existe
                    // Hash password
                    $array_devolver['error'] = "Usuario no Registrado. <a href='http://localhost/LoginWeb/registro.php'>Crear Cuenta</a>";
                    $array_devolver['is_login'] = false;
            }
        
            echo json_encode($array_devolver);
         
        } else {
            exit("Usted no es bienvenido");
    }
?>
