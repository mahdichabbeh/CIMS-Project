<?php

include('conn/conn.php');

$errors = array('id'=>'','nom'=>'','region'=>'','mdp'=>'');
$id=$nom=$region=$mdp='';
if(isset($_POST['submit'])){
    if(empty($_POST['id'])){
        $errors['id'] = 'id doit être valide';
    } else {
        $id = $_POST['id'];
        if(!preg_match('/^[0-9]+$/',$id)){
            $errors['id'] = 'id doit être valide';
        }
    }

    if(empty($_POST['nom'])){
        $errors['nom'] = 'nom doit être valide';
    } else {
        $nom = $_POST['nom'];
        if(!preg_match('/^[a-zA-Z\s]+$/',$nom)){
            $errors['nom'] = 'nom doit être valide';
        }
    }

    if(empty($_POST['region'])){
        $errors['region'] = 'region doit être valide';
    } else {
        $region = $_POST['region'];
        if(!preg_match('/^[a-zA-Z0-9\s]+$/',$region)){
            $errors['region'] = 'region doit être valide';
        }
    }

    if(empty($_POST['mdp'])){
        $errors['mdp'] = 'mot de passe doit être valide';
    } else {
        $mdp = $_POST['mdp'];
        if(!preg_match('/^[a-zA-Z0-9\s]+$/',$mdp)){
            $errors['mdp'] = 'mot de passe doit être valide';
        }
    }

     if(array_filter($errors)){} else {
        $id = mysqli_real_escape_string($conn , $_POST['id']);
        $nom = mysqli_real_escape_string($conn , $_POST['nom']);
        $region = mysqli_real_escape_string($conn , $_POST['region']);
        $mdp = mysqli_real_escape_string($conn , $_POST['mdp']);
        
        $sql = "INSERT INTO etablissement(ID,Nom,Région,Mot_de_passe) VALUES('$id','$nom','$region','$mdp')";
        if(mysqli_query($conn,$sql)){
            header('location: login.php');
        } else {
            echo 'query error:' . mysqli_error($conn);
        }
        
    }

}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="index.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body >
        <div class="h-screen flex justify-center items-center bg-[url('assets/bubbles.jpg')] bg-cover bg-center">    
        <div class="w-[40%] flex flex-col p-4">   
           
            <form class="flex flex-col gap-2 bg-white rounded-md px-10 py-8 " method="POST" action="signin.php">
                <div class="flex flex-row gap-4 justify-center items-center">
                    <img  src="assets/logo-m.png" alt="" width="50px" height="50px">
                    <p class="text-xs text-neutral-900 font-bold">République Tunisienne<br>Ministère De La Santé</p>
                    <img src="assets/logo-t.png" alt="" width="38px" height="40px">
                </div> 
                <label class=" font-semibold text-neutral-700" for="">Id-Etablissement:</label>
                <input type="text" name="id" value="<?php echo htmlspecialchars($id) ?>" class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md ">
                <div class=" text-red-500"><?php echo $errors['id']; ?></div>
                <label class="font-semibold text-neutral-700" for="">Nom-Etablissement:</label>
                <input type="text" name="nom" value="<?php echo htmlspecialchars($nom) ?>" class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md">
                <div class=" text-red-500"><?php echo $errors['nom']; ?></div>
                <label class="font-semibold text-neutral-700" for="">Région:</label>
                <input type="text" name="region" value="<?php echo htmlspecialchars($region) ?>" class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md ">
                <div class=" text-red-500"><?php echo $errors['region']; ?></div>
                <label class="font-semibold text-neutral-700" for="">Mot De Passe:</label>
                <input type="password" name="mdp" value='<?php echo htmlspecialchars($mdp) ?>'  class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md">
                <div class=" text-red-500"><?php echo $errors['mdp']; ?></div>
                <div class="flex flex-row justify-between">
                    <a href="" class=" underline text-neutral-700 hover:text-blue-400">Mot de passe oublié</a>
                    <a href="login.php" class=" underline text-neutral-700 hover:text-blue-400">connexion</a>
                </div>
                <div class=" flex justify-center mt-6">
                    <input type="submit" value="s'inscrire" name="submit" class=" rounded-md font-semibold text-white bg-blue-400 border-none py-2 px-8 ">
                </div>
            </form>
        </div> 
        </div>
    </body>
</html>