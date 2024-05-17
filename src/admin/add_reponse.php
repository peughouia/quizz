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
    <link href="../output.css" rel="stylesheet">
    <title>Edit question</title>
</head>
<body>
    <div class="container mx-auto">
        <?php
        include "./header.php"
        ?>
        <?php
            if(isset($_GET['reg_err'])){
                $err = htmlspecialchars($_GET['reg_err']);

                switch($err){
                    case 'success':
                        ?>
                        <p class="bg-green-500 text-white"><strong>SUCCESS:</strong> Enregistrement reussi!</p>
                        <?php
                    break;
                }
            }
        ?>
        <h1 class="text-black  text-2xl font-bold center">Rubrique D'ajout des Reponse au quiz</h1>
        <div class="bg-gray-200 rounded-md overflow-hidden  shadow-lg w-full flex items-center justify-center py-8">
            <form action="" method="post">
                <div class="my-4">
                    <label for="text" class="block mb-1">Selectionnez la Question</label>
                    <select name="id_question" class="w-full border border-gray-400 rounded px-2 py-1 " required>
                    <?php
                        $listquestion = "SELECT * FROM `question`";
                        $requette = $bdd->query($listquestion);
                        while($row = $requette->fetch()){
                    ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['qcontenu'] ?></option>
                    <?php
                        }
                    ?>
                    </select>
                </div>
                <div class="my-4">
                    <label for="text" class="block mb-1">Entrez une reponse a la question</label>
                    <input type="text" name="reponse" class="w-full border border-gray-400 rounded px-2 py-1" required>
                </div>  
                <div class="my-4"> 
                    <label for="text" class="block mb-1">Status de la reponse</label>
                    <select name="isCorrect" class="w-full border border-gray-400 rounded px-2 py-1" required>
                        <option value=0>Incorrect</option>
                        <option value=1>Correct</option>
                    </select>
                </div>
                <div class="my-4">
                    <input type="submit" value="Enregistrer" name="submit" class="bg-blue-500 text-white rounded px-4 py-2">
                </div>
            </form>
        </div>

        <h1 class="text-black  text-2xl font-bold center mt-8">Liste de Reponses</h1>
    </div>
</body>
</html>