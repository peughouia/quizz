<?php
    require_once '../config/config.php';

    if (isset($_POST['submit'])) {
        // Récupération de la valeur saisie dans le champ de texte
        $nomMatiere = $_POST['matiere'];

        $res = $insert = $bdd->prepare("INSERT INTO matiere(nom_matiere) 
                                    VALUES (?)");
        $insert->execute(array(
        $nomMatiere
    ));
    header('Location: edit_matiere.php?reg_err=success');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit matiere</title>
</head>
<body>
    <div>
    <?php
        if(isset($_GET['reg_err'])){
            $err = htmlspecialchars($_GET['reg_err']);

            switch($err){
                case 'success':
                    ?>
                    <p><strong>SUCCESS:</strong> Enregistrement reussi!</p>
                    <?php
                break;

                case 'fail':
                    ?>
                    <p><strong>ERREUR:</strong> Matière non ennregistrer!</p>
                    <?php
                break;
            }
        }
    ?>
    </div>
    <form action="" method="post">
        <div>
            <label>matiere</label>
            <input type="text" name="matiere" required>
            <span></span>
            <input type="submit" value="S'inscrire" name="submit">
        </div>
        
    </form>
</body>
</html>