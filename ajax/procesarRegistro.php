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
                $array_devolver['error'] = "Este email ya existe";
                $array_devolver['is_login'] = false;
            }else {
                    // No existe
                    // Hash password
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $empresa = $_POST['empresa'];
                
                    // Añadir nuevo usuario
                    $nuevo_user = $con->prepare("INSERT INTO usuarios (email, password, empresa) VALUES (:email, :password, :empresa)");
                    $nuevo_user->bindParam(':email', $email, PDO::PARAM_STR);
                    $nuevo_user->bindParam(':password', $password, PDO::PARAM_STR);
                    $nuevo_user->bindParam(':empresa', $empresa, PDO::PARAM_STR);
                    $nuevo_user->execute();
                
                    // Recuperamos el último registro
                    $userID = $con->lastInsertId();
                    $_SESSION['userID'] = (int) $userID;
                    $array_devolver['redirect'] = 'http://localhost/LoginWeb/usuario.php';
                    $array_devolver['is_login'] = true;
            }
        
            echo json_encode($array_devolver);
         
        } else {
            exit("Usted no es bienvenido");
    }
    
?>
