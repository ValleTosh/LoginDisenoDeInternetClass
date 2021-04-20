<?php 
require_once "../Clases/config.php";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        header("Content-Type: application/json");
        $array_devolver = [];
        $email = strtolower($_POST['email']);
        $password = $_POST['password'];
        
        // Comprobar si el usuario existe
        $buscar_user = $con->prepare("SELECT * FROM usuarios WHERE email = :email LIMIT 1");
        $buscar_user->bindParam(':email', $email, PDO::PARAM_STR);
        $buscar_user->execute();
        
        if($buscar_user->rowCount() == 1){
                // Existe
                $user = $buscar_user->fetch(PDO::FETCH_ASSOC);
                $userID = (int) $user['userID'];
                $hash = (string) $user['password'];
                if(password_verify($password, $hash)){
                    $_SESSION['user_id'] = $userID;
                    $array_devolver['redirect'] = 'http://localhost/LoginWeb/usuario.php';
                }else {
                    $array_devolver['error'] = "Datos Inválidos. <a href='http://localhost/LoginWeb/modificar.php'>¿No recuerda su usuario/contraseña?</a>";
                }
        }else {
                 $array_devolver['error'] = "Usuario no Registrado. <a href='http://localhost/LoginWeb/registro.php'>Crear Cuenta</a>";
        }
        
            echo json_encode($array_devolver);
         
        } else {
            exit("Usted no es bienvenido");
    }
    
?>
