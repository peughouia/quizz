<?php
    require_once '../config/config.php';
    if (isset($_POST['submit'])) {
        // Récupération de la valeur saisie dans le champ de texte
        $idMatiere = $_POST['id_matiere'];
        $qestion = $_POST['question'];
        $res = $insert = $bdd->prepare("INSERT INTO question(qcontenu, matiere_id) VALUES (?,?)");
        $insert->execute(array($qestion,$idMatiere));

        header('Location: add_question.php?reg_err=success');
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
        <h1 class="text-black  text-2xl font-bold center">Rubrique D'ajout de Question</h1>
        <div class="bg-gray-200 rounded-md overflow-hidden  shadow-lg w-full flex items-center justify-center py-16">
            <form action="" method="post">
                <div class="my-4">
                    <label for="text" class="block mb-2">Selectionnez la matiere</label>
                    <select name="id_matiere" class="w-full border border-gray-400 rounded px-2 py-1 mb-8" required >
                    <?php
                        $listMatiere = "SELECT * FROM `matiere`";
                        $requette = $bdd->query($listMatiere);
                        while($row = $requette->fetch()){
                    ?>
                        <option value="<?php echo $row['id_matiere'] ?>"><?php echo $row['nom_matiere'] ?></option>
                    <?php
                        }
                    ?>
                    </select>
                </div> 
                <div class="my-4">
                    <label for="question" class="block mb-1">Entrez une question pour cette Matière</label>
                    <input type="text" name="question" class="w-full border border-gray-400 rounded px-2 py-1" required>
                    <input type="submit" value="Enregistrer" name="submit" class="bg-blue-500 text-white rounded px-4 py-2 my-4">
                </div> 
            </form>
        </div>
        
        <h1 class="text-black  text-2xl font-bold center mt-8">Liste de Question</h1>
        
        <div class="bg-gray-200 rounded-md overflow-hidden  shadow-lg w-full flex items-center justify-center py-8 mb-16">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Question</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                        $list_question = "SELECT * FROM `question`";
                        $requetteQ = $bdd->query($list_question);
                        while($row = $requetteQ->fetch()){
                    ?>
                    <tr>
                        <td class="py-2 px-4 border-b"><?php echo $row["qcontenu"] ?></td>
                    </tr>
                <?php
                        }
                ?>
                <!-- Ajoutez d'autres lignes selon vos besoins -->
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>