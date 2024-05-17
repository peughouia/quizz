<?php
    require_once '../config/config.php';
    if (isset($_POST['submit'])) {
        // Récupération de la valeur saisie dans le champ de texte
        $nomMatiere = $_POST['matiere'];
        $res = $insert = $bdd->prepare("INSERT INTO matiere(nom_matiere) VALUES (?)");
        $insert->execute(array($nomMatiere));
    header('Location: edit_matiere.php?reg_err=success');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../output.css" rel="stylesheet">
    <title>Edit matiere</title>
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
        <h1 class="text-black  text-2xl font-bold center">Rubrique D'ajout de matière</h1>
        <div class="bg-gray-200 rounded-md overflow-hidden  shadow-lg w-full flex items-center justify-center py-8">
            <form action="" method="post">
                <div class="my-4">
                    <label for="text" class="block mb-2">Entrez la matiere</label>
                    <input type="text" name="matiere" class="w-full border border-gray-400 rounded px-2 py-1" required>
                    <input type="submit" value="Enregistrer" name="submit" class="bg-blue-500 text-white rounded px-4 py-2 my-4">
                </div>
            </form>
        </div>
        
        <h1 class="text-black  text-2xl font-bold center mt-8">Liste de Matiere</h1>
        
        <div class="bg-gray-200 rounded-md overflow-hidden  shadow-lg w-full flex items-center justify-center py-8 mb-16">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Matières</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            $list_question = "SELECT * FROM `matiere`";
                            $requetteQ = $bdd->query($list_question);
                            while($row = $requetteQ->fetch()){
                        ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?php echo $row["nom_matiere"] ?></td>
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