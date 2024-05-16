<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../output.css" rel="stylesheet">
    <title>CONNECTION</title>
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
            if(isset($_GET['login_err'])){

                $err = htmlspecialchars($_GET['login_err']);
                switch($err){
                    case 'password':
                        ?>
                        <p class="bg-red-400 text-black"><strong>ERREUR: </strong> mot de passe incorrect</p>
                        <?php
                    break;

                    case 'email':
                        ?>
                        <p class="bg-red-400 text-black"><strong>ERREUR: </strong> email incorrect</p>
                        <?php
                    break;

                    case 'already':
                        ?>
                        <p class="bg-red-400 text-black"><strong>ERREUR: </strong> compte non existant</p>
                        <?php
                    break;
                }
            }
        ?>
    </div>

    <div class="container mx-auto">
        <h1 class=" text-green-800  text-5xl font-bold center">Connectez-vous</h1>
        <div class="flex">
            <div class="w-1/2 vertical-center">
                <img src="../image/login.png" alt="Image" class="img-fluid">
            </div>
            <div class="w-1/2 vertical-center">
                <form action="./connexion_traitement.php" method="post">
                    <div class="mb-1">
                        <label for="email" class="block mb-1">Votre Email</label>
                        <input type="email" name="email" class="w-full border border-gray-400 rounded px-2 py-1" required>
                    </div>

                    <div class="mb-1">
                        <label for="password" class="block mb-1">Votre Mot de passe</label>
                        <input type="password" name="password" class="w-full border border-gray-400 rounded px-2 py-1" required>
                    </div>

                    <div class=" text-red-500">mot de passe oublié?</div>
                    
                    <div class="mb-1">
                        <button type="submit" name="submit" class="bg-blue-500 text-white rounded px-4 py-2 mr-4">Connexion</button>
                        <a href="../index.php" class="bg-green-600 text-white rounded px-4 py-2"> S'inscrire </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
       
    </div>
</body>
</html>