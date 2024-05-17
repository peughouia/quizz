<?php
session_start();
include "../config/config.php";
if (!isset($_SESSION['id_user'])) {
    header("Location: ../index.php");
    exit();
  }
$idMatiere =  $_GET['id'];
$index = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../output.css" rel="stylesheet">
    <title>Quizz App</title>
</head>
<body>
    <div class="container mx-auto py-8">
        <nav class="w-full bg-green-500 mb-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <a href="#" class="flex items-center text-white text-xl font-bold">
                            QUIZZ numero <?php echo $idMatiere ?>
                        </a>
                    </div>
                    <div class="flex items-center">
                        <a href="#" id="countdown" class="text-white px-3 py-2 rounded-md font-bold"></a>
                    </div>
                </div>
            </div>
        </nav>
        
        <form id="myForm" method="POST" action="resultat.php">
        <div class="bg-gray-300 rounded-md overflow-hidden shadow-lg items-center mx-4 px-4 py-4 ">
            <?php
                $requete = "SELECT question.id, question.qcontenu,question.matiere_id,
                                    reponse.id_reponse,reponse.rcontenu,reponse.question_id
                            FROM reponse
                            JOIN question ON reponse.question_id = question.id
                            WHERE question.matiere_id = $idMatiere";
                $res = $bdd->query($requete);
                $currentQuestionId = null;
                
                $ii = 0;
                while($row = $res->fetch()){ 
                    if ($row['question_id'] !== $currentQuestionId) {
                    echo"<br>";
                    echo "<h2 class=\"text-lg font-semibold\">
                    ".$row["qcontenu"]."</h2>";
                    $currentQuestionId = $row['question_id'];
                    $index++;
                    }
                    echo "<input type='radio' name='reponse[" . $row['id'] . "]' value='" . $row['id_reponse'] . "'> " . $row['rcontenu'] . "<br>";
            
                }
                echo"<input type=\"hidden\" name=\"nb_question\" value=\"$index\">";
                echo"<input type=\"hidden\" name=\"id_matiere\" value=\"$idMatiere\">";
                echo "</div>"
            ?>
        </div> 
        <div class="flex items-center justify-center">
            <?php if($index<1){?>
            <input class="bg-gray-300 text-black font-bold py-2 px-4 mb-10 mx-4 rounded"
            type="submit" name="submit" value="Soumettre" disabled>
            <a href="../user/home_user.php" class="bg-red-400 hover:bg-blue-700 text-white px-3 py-2 mb-10 mx-4 rounded-md">Retour</a>
            <?php }else{?>
                <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-10 rounded"
                type="submit" name="submit" value="Soumettre">
                <a href="../user/home_user.php" class="bg-red-400 hover:bg-blue-700 text-white px-3 py-2 mb-10 mx-4 rounded-md">Retour</a>
            <?php }?>
        </div>
        </form> 
    </div> 
       
    <script>
        var countdownElement = document.getElementById("countdown");
        var remainingTime = 30; // Temps restant en secondes

        function updateCountdown() {
            countdownElement.innerHTML = "Temps restant : " + remainingTime + "s";
            remainingTime--;

            if (remainingTime < 0) {
                countdownElement.innerHTML = "Décompte terminé!";
            } else {
                setTimeout(updateCountdown, 1000); // Mise à jour du décompte toutes les secondes
            }
        }

        // Démarrer le décompte
        updateCountdown();
    </script>  
</body>
</html>




  
   