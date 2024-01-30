<?php
session_start();
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session
session_start();
include('conn/conn.php');
$error='';
if(isset($_POST['submit'])){
    if(empty($_POST['id']) || empty($_POST['mdp'])){
        $error='Mot de passe ou identifiant incorrecte';
    } else {
    $id = $_POST["id"];
    if(!preg_match('/^[0-9]+$/',$id)){
        $error='Mot de passe ou identifiant incorrecte';
    } else {
        $mdp = $_POST["mdp"];
        $sql = "SELECT id,mot_de_passe,nom FROM etablissement WHERE id=$id";
        $result = mysqli_query($conn , $sql);
        $coordonne = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        if (empty($coordonne)) {
            $error='Mot de passe ou identifiant incorrecte';
        } else {
            if ($mdp== $coordonne["mot_de_passe"]) {
                $_SESSION['id'] = $id;
                $_SESSION['nom'] = $coordonne["nom"];
                header("Location:form.php");
                exit();
            } else {
                $error='Mot de passe ou identifiant incorrecte';
            }
        }
        }
    }

}

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
        <div class="w-[40%] flex flex-col gap-14 p-4">   
            <form class="flex flex-col gap-6 bg-white rounded-md px-10 py-8 " method="POST" action="login.php">
                <div class="flex flex-row gap-4 justify-center items-center">
                    <img  src="assets/logo-m.png" alt="" width="50px" height="50px">
                    <p class="text-xs text-neutral-900 font-bold">République Tunisienne<br>Ministère De La Santé</p>
                    <img src="assets/logo-t.png" alt="" width="38px" height="40px">
                </div> 
                <label class="font-semibold text-neutral-700" for="">Id-Etablissement:</label>
                <input type="text" name="id" value="" class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md">
                <label class="font-semibold text-neutral-700" for="">Mot De Passe:</label>
                <input type="password" name="mdp" value=''  class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md">
                <div class=" text-red-500 flex justify-center"><?php echo $error; ?></div>
                <div class="flex flex-row justify-between">
                    <a href="" class="underline text-neutral-700 hover:text-blue-400">Mot de passe oublié</a>
                    <a href="signin.php" class="underline text-neutral-700 hover:text-blue-400">Créer un compte</a>
                </div>
                <div class=" flex justify-center mt-6">
                    <input type="submit" value="connexion" name="submit" class=" hover:bg-white hover:text-blue-400 hover:border-blue-400 hover:border-2 hover:border-solid cursor-pointer rounded-md font-semibold text-white bg-blue-400 border-white py-2 px-8">
                </div>
            </form>
        </div> 
        </div>
    </body>
</html>