<?php
    require_once '../config/config.php';
    if(isset($_POST['nom']) && isset($_POST['prenom'])
        && isset($_POST['date']) && isset($_POST['niveau']) 
        && isset($_POST['email']) && isset($_POST['password']) 
        && isset($_POST['password_retype'])
       )
    {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $date = $_POST['date'];
        $niveau = $_POST['niveau'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_retype = $_POST['password_retype'];


        $check = $bdd->prepare("SELECT nom,prenom,date_naiss,niveau,email,password 
                                FROM user WHERE email = ?");
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
            if($row == 0){
                if(strlen($nom) <= 30){
                    if(strlen($prenom) <= 30){
                        if(strlen($email) <= 100){
                            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                                if($password == $password_retype){
                                    $pw = md5($password);
                                    $res = $insert = $bdd->prepare("INSERT INTO user(nom,prenom,date_naiss,niveau,email,password) 
                                                                    VALUES (?, ?, ?, ?, ?, ?)");
                                    $insert->execute(array(
                                        $nom,
                                        $prenom,
                                        $date,
                                        $niveau,
                                        $email, 
                                        $pw,
                                    ));
                                    
                                    header('Location: ../index.php?reg_err=success');
                                }else header('Location: ../index.php?reg_err=password');
                            }else header('Location: ../index.php?reg_err=email');
                        }else header('Location: ../index.php?reg_err=email_length');
                    }else header('Location: ../index.php?reg_err=prenom_length');
                }else header('Location: ../index.php?reg_err=nom_length');
            }else header('Location: ../index.php?reg_err=already');
        echo "Enregistrer avec success";
    }