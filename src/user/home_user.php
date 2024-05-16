<?php
include "../config/config.php";
session_start();
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$userid = $_SESSION['id_user'];
if (!isset($_SESSION['id_user'])) {
  header("Location: ../index.php");
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../output.css" rel="stylesheet">
    <title>QUIZZ App</title>
    <style>
        .vertical-center {
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body class="m-0 p-0">
    <div class="container mx-auto">
        <nav class="w-full bg-green-500 mb-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <a href="#" class="flex items-center text-white text-xl font-bold">
                             myiuc QUIZZ APP 
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <?php
            if(isset($_GET['err'])){

                $err = htmlspecialchars($_GET['err']);
                switch($err){
                    case 'vide':
                        ?>
                        <p class="bg-red-400 text-black"><strong>ATTENTION: </strong> vous n'avez choisir aucune reponse</p>
                        <?php
                    break;
                }
            }
        ?>
        <h1 class=" text-green-800  text-2xl font-bold center mb-4 mt-4">BIENVENUE <?php echo "$nom $prenom"  ?></h1>
        <p class=" text-lg">Cher utilisateur, votre aventure de quiz commence ici ! Veuillez choisir le sujet qui 
            vous inspire le plus afin que nous puissions tester vos connaissances <p>
        <div class="bg-gray-200 rounded-md overflow-hidden  shadow-lg w-full flex items-center justify-center py-16">
        <?php 
            $requete = "SELECT * from matiere";
            $res = $bdd -> query($requete);
            while($row = $res -> fetch()){ 
                echo "<div class=\"bg-blue-300 rounded-md overflow-hidden  shadow-lg mx-4\">
                <div class=\"p-4\">
                    <h3 class=\"text-xl font-bold mb-2\">".$row['nom_matiere']."</h3>
                    <button class=\"btncommencer bg-green-500 hover:bg-blue-300 text-white rounded px-4 py-2\"><a href=\"quizz.php?id=" . $row["id_matiere"] . ";\">COMMENCER LE QUIZZ</a></button>
                </div>
                </div>";
            }
            
        ?> 
        </div>
    </div>
<div>
</body>
</html>