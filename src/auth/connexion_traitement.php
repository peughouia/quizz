<?php 
    session_start();
    require_once '../config/config.php';

    if(isset($_POST['email']) && isset($_POST['password']))
    {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            
            $check = $bdd->prepare("SELECT * FROM user WHERE email = ?");
            $check->execute(array($email));
            $data = $check->fetch();
            $row = $check->rowCount();

            

       if($row == 1)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $pw = md5($password);
                
                if($data['password'] === $pw)
                {
                        $_SESSION['nom'] = $data['nom'];
                        $_SESSION['prenom'] = $data['prenom'];
                        $_SESSION['admin'] = $data['isAdmin'];
                        $_SESSION['id_user'] = $data['id'];

                        if($data['isAdmin'] == 1){
                            header('Location: ../admin/home_admin.php');
                            exit();
                        }else{
                            header('Location: ../user/home_user.php');
                            exit();
                        }
                }
                else header('Location:connexion.php?login_err=password');
            }else header('Location:connexion.php?login_err=email');
        }else header('Location:connexion.php?login_err=already');
    }else header('Location:connexion.php');
?>