<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <title>Quizz APP</title>
    <style>
        .vertical-center {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100vh;
        }
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
<div>
    <?php
        if(isset($_GET['reg_err'])){
            $err = htmlspecialchars($_GET['reg_err']);

            switch($err){
                case 'success':
                    ?>
                    <p class="bg-green-600 text-white"><strong>SUCCESS:</strong> inscription reussie!</p>
                    <?php
                break;

                case 'password':
                    ?>
                    <p class="bg-red-400 text-black"><strong>ERREUR:</strong> Mot de passe different!</p>
                    <?php
                break;

                case 'email':
                    ?>
                    <p class="bg-red-400 text-black"><strong>ERREUR:</strong> email non valide!</p>
                    <?php
                break;

                case 'email_length':
                    ?>
                    <p class="bg-red-400 text-black"><strong>ERREUR:</strong> email trop long!</p>
                    <?php
                break;

                case 'nom_length':
                    ?>
                    <p class="bg-red-400 text-black"><strong>ERREUR:</strong> Nom trop long!</p>
                    <?php
                break;

                case 'already':
                    ?>
                    <p class="bg-red-400 text-black"><strong>ERREUR:</strong> Compte deja existant!</p>
                    <?php
                break;
            }
        }
    ?>
</div>

<div class="container mx-auto">
<h1 class=" text-green-800  text-5xl font-bold center">Inscrivez-vous</h1>
    <div class="flex">
        <div class="w-1/2 vertical-center">
            <img src="./image/quizz.png" alt="Image" class="img-fluid">
        </div>
        <div class="w-1/2 vertical-center" >
        <form action="./auth/inscription_traitement.php" method="post">
            <div class="mb-1">
                <label for="nom" class="block mb-1">Votre Nom</label>
                <span id="nom_manquant"></span>
                <input type="text" id="nom" name="nom" class="w-full border border-gray-400 rounded px-2 py-1" required>
            </div>

            <div class="mb-1">
                <label for="prenom" class="block mb-1">Votre Prenom</label>
                <span id="prenom_manquant"></span>
                <input type="text" id="prenom" name="prenom" class="w-full border border-gray-400 rounded px-2 py-1" required>
            </div>

            <div class="mb-1">
                <label for="date" class="block mb-1">Date de naissance</label>
                <span id="date_manquant"></span>
                <input type="date" id="date" name="date" class="w-full border border-gray-400 rounded px-2 py-1" required>
            </div>
            
            <div class="mb-1">
                <label for="niveau" class="block mb-1">Niveau</label>
                <select name="niveau" class="w-full border border-gray-400 rounded px-2 py-1" required >
                    <option>Niveau 1</option>
                    <option>Niveau 2</option>
                    <option>Niveau 3</option>
                </select>
            </div>

            <div class="mb-1">
                <label for="email" class="block mb-1">Adresse mail</label>
                <span id="email_manquant"></span>
                <input type="email" id="email" name="email" class="w-full border border-gray-400 rounded px-2 py-1" required>
            </div>

            <div class="mb-1">
                <label for="password" class="block mb-1">Mot de passe</label>
                <span id="password_manquant"></span>
                <input type="password" id="password" name="password" class="w-full border border-gray-400 rounded px-2 py-1" required>
            </div>
            
            <div class="mb-2">
                <label for="cpassword" class="block mb-1">Confirmer le mot de passe</label>
                <span id="cpassword_manquant"></span>
                <input type="password" id="password_retype" name="password_retype" class="w-full border border-gray-400 rounded px-2 py-1" required>
            </div>

            <div class="mb-2">
                <button type="submit" id="bouton_send" name="submit" class="bg-blue-500 text-white rounded px-4 py-2">S'inscrire</button>
                <a href="./auth/connexion.php" class="bg-green-600 text-white rounded px-4 py-2"> Se connecter </a>
            </div>
        </form>
    </div>
    </div>
    
    <script>    
        var validation = document.getElementById("bouton_send");
        var nom = document.getElementById("nom");
        var nom_m = document.getElementById("nom_manquant");

        var prenom = document.getElementById("prenom");
        var prenom_m = document.getElementById("prenom_manquant");

        var date = document.getElementById("date");
        var date_m = document.getElementById("date_manquant");

        var email = document.getElementById("email");
        var email_m = document.getElementById("email_manquant");


        validation.addEventListener("click", valid);

        function valid(e){
            if(nom.validity.valueMissing){
                e.preventDefault();
                nom_m.textContent = "veuillez remplir ce champ";
                nom_m.style.color = "red"
            }else{
                nom_m.textContent = "";
            }

            if(prenom.validity.valueMissing){
                e.preventDefault();
                prenom_m.textContent = "veuillez remplir ce champ";
                prenom_m.style.color = "red"

            }else{
                prenom_m.textContent ="";
            }

            if(date.validity.valueMissing){
                e.preventDefault();
                date_m.textContent = "veuillez remplir ce champ";
                date_m.style.color = "red"

            }else{
                date_m.textContent = "";
            }

            if(email.validity.valueMissing){
                e.preventDefault();
                email_m.textContent = "email invalid(@)";
                email_m.style.color = "red"

            }else{
                email_m.textContent = "";
            }
        }
    </script>

</div>
</body>
</html>