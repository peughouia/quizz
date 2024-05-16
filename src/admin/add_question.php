<?php
    require_once '../config/config.php';

    if (isset($_POST['submit'])) {
        // Récupération de la valeur saisie dans le champ de texte
        $idMatiere = $_POST['id_matiere'];
        $qestion = $_POST['question'];

        $res = $insert = $bdd->prepare("INSERT INTO question(qcontenu, matiere_id) 
                                    VALUES (?,?)");
        $insert->execute(array(
        $qestion,$idMatiere
    ));
    header('Location: add_question.php?reg_err=success');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit question</title>
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
            }
        }
    ?>
    </div>
    <form action="" method="post">
        <div>
            <label>Selectionner la matiere</label>
            <select name="id_matiere">
            <?php
                $listMatiere = "SELECT * FROM `matiere`";
                $requette = $bdd->query($listMatiere);
                while($row = $requette->fetch()){
            ?>
                <option value="<?php echo $row['id_matiere'] ?>"><?php echo $row['nom_matiere'] ?></option>
            <?php
                }
            ?>
            <input type="text" name="question" require>
            <input type="submit" value="S'inscrire" name="submit">
        </div>
        
    </form>
</body>
</html>