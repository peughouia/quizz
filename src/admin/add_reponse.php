<?php
    require_once '../config/config.php';

    if (isset($_POST['submit'])) {
        // Récupération de la valeur saisie dans le champ de texte
        $idQuestion = $_POST['id_question'];
        $reponse = $_POST['reponse'];
        $isCorrect = $_POST["isCorrect"];

        $res = $insert = $bdd->prepare("INSERT INTO reponse(rcontenu, question_id, is_correct) 
                                    VALUES (?,?,?)");
        $insert->execute(array(
        $reponse,$idQuestion,$isCorrect
    ));
    header('Location: add_reponse.php?reg_err=success');
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
            <label>Selectionner la question</label>
            <select name="id_question">
            <?php
                $listquestion = "SELECT * FROM `question`";
                $requette = $bdd->query($listquestion);
                while($row = $requette->fetch()){
            ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['qcontenu'] ?></option>
            <?php
                }
            ?>
            <input type="text" name="reponse" require>
            <select name="isCorrect">
                <option value=0>Incorrect</option>
                <option value=1>Correct</option>
            </select>
            <input type="submit" value="ajouter" name="submit">
        </div>
        
    </form>
</body>
</html>