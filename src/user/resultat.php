<?php
session_start();
include "../config/config.php";
if(isset($_POST['reponse'])){
    $reponses = $_POST['reponse'];
    $nb_question = $_POST['nb_question'];
        foreach ($reponses as $cle => $valeur) {
            //echo ", Valeur : " . $valeur . "<br>";
        }
} else{
    header('Location:home_user.php?err=vide');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resulta</title>
</head>
<body>
    <?php 
        $score = 0;
        foreach ($reponses as $cle => $valeur) {
            //echo $valeur. "<br>";
            $rq = "SELECT * FROM reponse WHERE id_reponse= $valeur";
            $res = $bdd->query($rq);
            $row = $res->fetch();
            echo $row["rcontenu"].":". $row["is_correct"]."<br>";
            if($row["is_correct"] == 1){
                $score++;
            }
        }
        $percentage = ($score / $nb_question ) * 100;
        echo "nous avons ". $nb_question ." question"; 
        echo " et vous avez eu ".$score." sur ". $nb_question;
        echo " Pourcentage de réussite : $percentage%<br>";
    ?>
</body>
</html>