<?php
    include('conn/conn.php');
    session_start();
    if(isset($_SESSION["nom"])){
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $sql = "SELECT * FROM etablissement WHERE Id=$id";
        $result = mysqli_query($conn , $sql);
        $etab = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
    }

    $errors = array('cap_tot_lit_ox'=>'','cap_tot_lit_rea'=>'','cap_cit_princ'=>'','cap_cit_sec_un'=>'','cap_cit_sec_deux'=>'','niv_remp_cit_princ'=>'','cons_ox_jour'=>'','nbr_tot_concent'=>'','nbr_concent_fonc'=>'','nbr_tot_B05'=>'','nbr_B05_remp'=>'','nbr_tot_B15'=>'','nbr_B15_remp'=>'','nbr_tot_B50'=>'','nbr_B50_remp'=>'','cap_prod_gen'=>'');
    $gen_fonct=$cons_moy_ox=$niv_cit_princ=$dur_auto_ox=$cap_tot_lit_ox=$cap_tot_lit_rea=$cap_cit_princ=$cap_cit_sec_un=$cap_cit_sec_deux=$niv_remp_cit_princ=$cons_ox_jour=$nbr_tot_concent=$nbr_concent_fonc=$nbr_tot_B05=$nbr_B05_remp=$nbr_tot_B15=$nbr_B15_remp=$nbr_tot_B50=$nbr_B50_remp=$cap_prod_gen='';
    if(isset($_POST['submit'])){
        if($_POST["cap_tot_lit_ox"] == ''){
            $errors["cap_tot_lit_ox"] = 'La capacité doit etre valide';
        } else {
            $cap_tot_lit_ox = $_POST["cap_tot_lit_ox"];
            if(!preg_match('/^[0-9]+$/',$cap_tot_lit_ox)){
                $errors["cap_tot_lit_ox"] = 'La capacité doit etre valide';
            }
        }

        if($_POST["cap_tot_lit_rea"] == ''){
            $errors["cap_tot_lit_rea"] = 'La capacité doit etre valide';
        } else {
            $cap_tot_lit_rea = $_POST["cap_tot_lit_rea"];
            if(!preg_match('/^[0-9]+$/',$cap_tot_lit_rea)){
                $errors["cap_tot_lit_rea"] = 'La capacité doit etre valide';
            }
        }


        if($_POST["choice"] == "oui"){
            if($_POST["cap_cit_princ"] == ''){
                $errors["cap_cit_princ"] = 'La capacité doit etre valide';
            } else {
                $cap_cit_princ = $_POST["cap_cit_princ"] ;
                if(!preg_match('/^\d+(\.\d+)?$/',$cap_cit_princ)){
                    $errors["cap_cit_princ"] = 'La capacité doit etre valide';
                }
            }

            if($_POST["cap_cit_sec_un"] == ''){
                $errors["cap_cit_sec_un"] = 'La capacité doit etre valide';
            } else {
                $cap_cit_sec_un = $_POST["cap_cit_sec_un"] ;
                if(!preg_match('/^\d+(\.\d+)?$/',$cap_cit_sec_un)){
                    $errors["cap_cit_sec_un"] = 'La capacité doit etre valide';
                }
            }

            if($_POST["cap_cit_sec_deux"] == ''){
                $errors["cap_cit_sec_deux"] = 'La capacité doit etre valide';
            } else {
                $cap_cit_sec_deux = $_POST["cap_cit_sec_deux"] ;
                if(!preg_match('/^\d+(\.\d+)?$/',$cap_cit_sec_deux)){
                    $errors["cap_cit_sec_deux"] = 'La capacité doit etre valide';
                }
            }

            if($_POST["niv_remp_cit_princ"] == ""){
                $errors["niv_remp_cit_princ"] = 'La capacité doit etre valide';
            } else {
                $niv_remp_cit_princ = $_POST["niv_remp_cit_princ"] ;
                if(!preg_match('/^\d+(\.\d+)?$/',$niv_remp_cit_princ)){
                    $errors["niv_remp_cit_princ"] = 'La capacité doit etre valide';
                }
            }

            if($_POST["cons_ox_jour"] == ''){
                $errors["cons_ox_jour"] = 'La capacité doit etre valide';
            } else {
                $cons_ox_jour = $_POST["cons_ox_jour"] ;
                if(!preg_match('/^\d+(\.\d+)?$/',$cons_ox_jour)){
                    $errors["cons_ox_jour"] = 'La capacité doit etre valide';
                }
            }
        }

        if($_POST["nbr_tot_concent"] == ''){
            $errors["nbr_tot_concent"] = 'La capacité doit etre valide';
        } else {
            $nbr_tot_concent = $_POST["nbr_tot_concent"] ;
            if(!preg_match('/^[0-9]+$/',$nbr_tot_concent)){
                $errors["nbr_tot_concent"] = 'La capacité doit etre valide';
            }
        }

        if($_POST["nbr_concent_fonc"] == '' ){
            $errors["nbr_concent_fonc"] = 'La capacité doit etre valide';
        } else {
            $nbr_concent_fonc = $_POST["nbr_concent_fonc"] ;
            if(!preg_match('/^[0-9]+$/',$nbr_concent_fonc)){
                $errors["nbr_concent_fonc"] = 'La capacité doit etre valide';
            }
        }

        if($_POST["nbr_tot_B05"] == '' ){
            $errors["nbr_tot_B05"] = 'La capacité doit etre valide';
        } else {
            $nbr_tot_B05 = $_POST["nbr_tot_B05"] ;
            if(!preg_match('/^[0-9]+$/',$nbr_tot_B05)){
                $errors["nbr_tot_B05"] = 'La capacité doit etre valide';
            }
        }

        if($_POST["nbr_B05_remp"] == '' ){
            $errors["nbr_B05_remp"] = 'La capacité doit etre valide';
        } else {
            $nbr_B05_remp = $_POST["nbr_B05_remp"] ;
            if(!preg_match('/^[0-9]+$/',$nbr_B05_remp)){
                $errors["nbr_B05_remp"] = 'La capacité doit etre valide';
            }
        }

        if($_POST["nbr_tot_B15"] == '' ) {
            $errors["nbr_tot_B15"] = 'La capacité doit etre valide';
        } else {
            $nbr_tot_B15 = $_POST["nbr_tot_B15"] ;
            if(!preg_match('/^[0-9]+$/',$nbr_tot_B15)){
                $errors["nbr_tot_B15"] = 'La capacité doit etre valide';
            }
        }

        if($_POST["nbr_B15_remp"] == '') {
            $errors["nbr_B15_remp"] = 'La capacité doit etre valide';
        } else {
            $nbr_B15_remp = $_POST["nbr_B15_remp"] ;
            if(!preg_match('/^[0-9]+$/',$nbr_B15_remp)){
                $errors["nbr_B15_remp"] = 'La capacité doit etre valide';
            }
        }


        if($_POST["nbr_tot_B50"] == '') {
            $errors["nbr_tot_B50"] = 'La capacité doit etre valide';
        } else {
            $nbr_tot_B50 = $_POST["nbr_tot_B50"] ;
            if(!preg_match('/^[0-9]+$/',$nbr_tot_B50)){
                $errors["nbr_tot_B50"] = 'La capacité doit etre valide';
            }
        }

        if($_POST["nbr_B50_remp"] == ''){
            $errors["nbr_B50_remp"] = 'La capacité doit etre valide';
        } else {
            $nbr_B50_remp = $_POST["nbr_B50_remp"] ;
            if(!preg_match('/^[0-9]+$/',$nbr_B50_remp)){
                $errors["nbr_B50_remp"] = 'La capacité doit etre valide';
            }
        }

        if($_POST["choice1"] == "oui"){
            if($_POST["cap_prod_gen"] == ''){
                $errors["cap_prod_gen"] = 'La capacité doit etre valide';
            } else {
                $cap_prod_gen = $_POST["cap_prod_gen"] ;
                if(!preg_match('/^\d+(\.\d+)?$/',$cap_prod_gen)){
                    $errors["cap_prod_gen"] = 'La capacité doit etre valide';
                }
            }
        }




        if(array_filter($errors)){} else{
            $cap_tot_lit_ox = $_POST['cap_tot_lit_ox'];
            $cap_tot_lit_rea = $_POST['cap_tot_lit_rea'];
            $citerne = $_POST['choice'];
            if($_POST['choice'] == "oui"){
                $cap_cit_princ = $_POST['cap_cit_princ'];
                $cap_cit_sec_un = $_POST['cap_cit_sec_un'];
                $cap_cit_sec_deux = $_POST['cap_cit_sec_deux'];
                $niv_remp_cit_princ = $_POST['niv_remp_cit_princ'];
                $cons_ox_jour = $_POST['cons_ox_jour'];
                $niv_cit_princ = 100-($cons_ox_jour * (100 / $cap_cit_princ)) ;
                $cons_moy_ox = ($niv_remp_cit_princ - $cons_ox_jour)/24;
                $dur_auto_ox = $niv_remp_cit_princ / $cons_moy_ox;
            }
            $nbr_tot_concent = $_POST['nbr_tot_concent'];
            $nbr_concent_fonc = $_POST['nbr_concent_fonc'];
            $nbr_tot_B05 = $_POST['nbr_tot_B05'];
            $nbr_B05_remp = $_POST['nbr_B05_remp'];
            $nbr_tot_B15 = $_POST['nbr_tot_B15'];
            $nbr_B15_remp = $_POST['nbr_B15_remp'];
            $nbr_tot_B50 = $_POST['nbr_tot_B50'];
            $nbr_B50_remp = $_POST['nbr_B50_remp'];
            $generateur = $_POST['choice1'];
            if($_POST['choice1'] == "oui"){
                $cap_prod_gen = $_POST['cap_prod_gen'];
                $gen_fonct = $_POST['choice2'];

            }
            /*, cap_cit_princ = $cap_cit_princ, cap_cit_sec_un = $cap_cit_sec_un, cap_cit_sec_deux = $cap_cit_sec_deux, niv_remp_cit_princ = $niv_remp_cit_princ, cons_ox_jour = $cons_ox_jour, niv_cit_princ = $niv_cit_princ, cons_moy_ox = $cons_moy_ox, dur_auto_ox = $dur_auto_ox, nbr_tot_concent = $nbr_tot_concent, nbr_concent_fonc = $nbr_concent_fonc, nbr_tot_B05 = $nbr_tot_B05, nbr_B05_remp = $nbr_B05_remp, nbr_tot_B15 = $nbr_tot_B15, nbr_B15_remp = $nbr_B15_remp, nbr_tot_B50 = $nbr_tot_B50, nbr_B50_remp = $nbr_B50_remp, , cap_prod_gen = $cap_prod_gen, gen_fonct = $gen_fonct*/
            $sql = "UPDATE etablissement SET cap_tot_lit_ox = $cap_tot_lit_ox, cap_tot_lit_rea = $cap_tot_lit_rea, nbr_tot_concent = $nbr_tot_concent, nbr_concent_fonc = $nbr_concent_fonc, nbr_tot_B05 = $nbr_tot_B05, nbr_B05_remp = $nbr_B05_remp, nbr_tot_B15 = $nbr_tot_B15, nbr_B15_remp = $nbr_B15_remp, nbr_tot_B50 = $nbr_tot_B50, nbr_B50_remp = $nbr_B50_remp,";
            if($citerne == "oui"){
                $sql1 = "citerne = 1, cap_cit_princ = $cap_cit_princ, cap_cit_sec_un = $cap_cit_sec_un, cap_cit_sec_deux = $cap_cit_sec_deux, niv_remp_cit_princ = $niv_remp_cit_princ, cons_ox_jour = $cons_ox_jour, niv_cit_princ = $niv_cit_princ, cons_moy_ox = $cons_moy_ox, dur_auto_ox = $dur_auto_ox,";
                    } else {
                        $sql1 = "citerne = 0, cap_cit_princ = 0, cap_cit_sec_un = 0, cap_cit_sec_deux = 0, niv_remp_cit_princ = 0, cons_ox_jour = 0, niv_cit_princ = 0, cons_moy_ox = 0, dur_auto_ox = 0,";
                    };
            
            if($generateur == "oui"){
                if($gen_fonct == "oui"){
                    $sql2 = " generateur = 1, cap_prod_gen = $cap_prod_gen, gen_fonct = 1 ";
                } else {
                    $sql2 = " generateur = 1, cap_prod_gen = $cap_prod_gen, gen_fonct = 0 ";
                }
            } else {
                $sql2 = " generateur = 0, cap_prod_gen = 0, gen_fonct = 0 ";
            };

            $sql.= $sql1 ;
            $sql.= $sql2 ;
            $sql.= "WHERE ID=$id";
            if(mysqli_query($conn,$sql)){
                header('location: form.php');
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="citerne.js"></script>
        <script src="generateur.js"></script>


    </head>
    <body class=" w-full h-full bg-[url('assets/bubbles.jpg')] bg-cover bg-center flex flex-col">
        <nav class=" fixed w-full h-[80px] bg-white flex justify-center items-center p-4 shadow-md">
            <a class=" text-blue-400 border-2 p-2 rounded-lg border-blue-400 hover:bg-blue-400 hover:text-white absolute left-4" href="login.php"><?php if(!isset($_SESSION["nom"])){ echo 'Connexion';} else { echo 'Logout';}; ?></a>
            <div class="flex flex-row gap-4 justify-center items-center">
                <img  src="assets/logo-m.png" alt="" width="50px" height="50px">
                <p class="text-xs text-neutral-900 font-bold">République Tunisienne<br>Ministère De La Santé</p>
                <img src="assets/logo-t.png" alt="" width="38px" height="40px">
            </div> 
        </nav>
        <div class=" flex justify-center items-center mt-[80px]">
            <form class=" w-[90%] px-8 bg-white py-4 " action="form.php" method="POST">
                <h2 class=" m-4 text-center font-bold text-neutral-500"><?php if(isset($_SESSION["nom"])) {echo $nom;}; ?></h2>
                <div class=" flex w-5/6 flex-row justify-between items-center gap-10 my-10">
                    <div class="flex flex-col gap-3 items-center justify-center ">
                        <div class=" flex flex-row gap-4 justify-center items-center">
                            <label class="font-normal text-neutral-600" for="">Capacité Totale En Lits Oxygene :</label>
                            <input type="text" name="cap_tot_lit_ox" value="<?php echo $etab["cap_tot_lit_ox"]; ?>" class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md ">
                        </div>
                        <div class=" text-red-500"><?php echo $errors['cap_tot_lit_ox']; ?></div>
                    </div>
                    <div class="flex flex-col gap-3 items-center justify-center">
                        <div class=" flex flex-row gap-4 justify-center items-center">
                            <label class="font-normal text-neutral-600" for="">Capacité Totale En Lits De Réanimation :</label>
                            <input type="text" name="cap_tot_lit_rea" value="<?php echo $etab["cap_tot_lit_rea"]; ?>" class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md ">
                        </div>
                        <div class=" text-red-500"><?php echo $errors['cap_tot_lit_rea']; ?></div>
                    </div>
                </div>
                <div class=" my-10 flex flex-row gap-4">
                    <li class=" font-poppins font-semibold text-neutral-700">Citerne D'Oxygene Liquide : </li>
                    <label>
                        <input type="radio" name="choice" value="oui" <?php if($etab["citerne"] == 1){ echo "checked" ;};?>>
                         Oui
                    </label>
                    <label>
                        <input type="radio" name="choice" value="non" <?php if($etab["citerne"] == 0){ echo "checked" ;}; ?>>
                        Non
                    </label>
                </div>
                <div class=" border-2 rounded-md p-4">
                    
                    <div class=" flex flex-row gap-16 justify-start w-full my-6">

                        <div class=" flex flex-col gap-6 justify-start items-start w-2/4 " >
                 
                            <div class="w-full flex flex-row justify-between items-center">
                                <div class=" flex flex-col justify-center items-center">
                                    <label class="font-normal text-neutral-600" for="">Capacité Citérne Principale D'Oxygene(En Litre)</label>
                                    <div class=" text-red-500"><?php echo $errors['cap_cit_princ']; ?></div>
                                </div>
                                <input type="text" name="cap_cit_princ" id="cap_cit_princ" value="<?php echo $etab["cap_cit_princ"]; ?>" class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md ">
                            </div>
                            <div class="w-full flex flex-row justify-between items-center">
                                <div class=" flex flex-col justify-center items-center">
                                    <label class="font-normal text-neutral-600" for="">Capacité Citérne De Secours 1 D'Oxygene(En Litre)</label>
                                    <div class=" text-red-500"><?php echo $errors['cap_cit_sec_un']; ?></div>
                                </div>
                                <input type="text" name="cap_cit_sec_un" id="cap_cit_sec_un" value="<?php echo $etab["cap_cit_sec_un"]; ?>" class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md ">
                            </div>
                            <div class="w-full flex flex-row justify-between items-center">
                                <div class=" flex flex-col justify-center items-center">
                                    <label class="font-normal text-neutral-600" for="">Capacité Citérne De Secours 2 D'Oxygene(En Litre)</label>
                                    <div class=" text-red-500"><?php echo $errors['cap_cit_sec_deux']; ?></div>
                                </div>
                                <input type="text" name="cap_cit_sec_deux" id="cap_cit_sec_deux" value="<?php echo $etab["cap_cit_sec_deux"]; ?>" class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md ">
                            </div>
                   
                        </div>

                        <div class=" flex flex-col gap-6 justify-start items-start w-1/2">    
                            <div class="w-full flex flex-row justify-between items-center">
                                <div class=" flex flex-col justify-center items-center">
                                    <label class="font-normal text-neutral-600" for="">Le niveau de remplissage de la citérne principale de'Oxygene liquide (En Litre) : </label>
                                    <div class=" text-red-500"><?php echo $errors['niv_remp_cit_princ']; ?></div>
                                </div>
                                <input type="text" name="niv_remp_cit_princ" id="niv_remp_cit_princ" value="<?php echo $etab["niv_remp_cit_princ"]; ?>"  class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md ">
                            </div>
                            <div class="w-full flex flex-row justify-between items-center">
                                <div class=" flex flex-col justify-center items-center">
                                    <label class="font-normal text-neutral-600" for="">Consommation d'oxygene liquide durant les dernieres 24 heures(En Litre) : </label>
                                    <div class=" text-red-500"><?php echo $errors['cons_ox_jour']; ?></div>
                                </div>
                                <input type="text" name="cons_ox_jour" id="cons_ox_jour" value="<?php echo $etab["cons_ox_jour"]; ?>" class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md ">
                            </div>
                        </div>
                    </div>
                    <div class="my-12 flex flex-col gap-3 w-full justify-center items-center">
                        <p class="font-normal text-neutral-600">Le niveau du stock de la citerne principale d'oxygene (%) : <span  class=" font-poppins font-semibold text-neutral-700"><?php echo $etab["niv_cit_princ"]; ?></span></p>
                        <p class="font-normal text-neutral-600">Consommation moyenne d'oxygene en Litre/Heure : <span  class=" font-poppins font-semibold text-neutral-700"><?php echo $etab["cons_moy_ox"]; ?></span></p>
                        <p class="font-normal text-neutral-600">La duree d'autonomie en oxygene liquide (Heure) : <span  class=" font-poppins font-semibold text-neutral-700"><?php echo $etab["dur_auto_ox"]; ?></span></p>
                    </div>
                </div>

                <div class=" my-10">
                    <li class=" font-poppins font-semibold text-neutral-700">Concentrateurs d'oxygene : </li>
                </div>
                
                <div class=" border-2 rounded-md p-4 ">
                    <div class="flex w-full flex-row justify-between items-center gap-6 my-10 ">
                            <div class="w-full flex flex-row gap-3 items-center">
                                <div class=" flex flex-col justify-center items-center">
                                    <label class="font-normal text-neutral-600" for="">Le nombre totale des Concentrateurs d'oxygene : </label>
                                    <div class=" text-red-500"><?php echo $errors['nbr_tot_concent']; ?></div>
                                </div>
                                <input type="text" name="nbr_tot_concent" id="nbr_tot_concent" value="<?php echo $etab["nbr_tot_concent"]; ?>" class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md ">
                            </div>
                            <div class="w-full flex flex-row gap-3 items-center">
                                <div class=" flex flex-col justify-center items-center">
                                    <label class="font-normal text-neutral-600" for="">Le nombre des concentrateurs d'oxygene fonctionnels : </label>
                                    <div class=" text-red-500"><?php echo $errors['nbr_concent_fonc']; ?></div>
                                </div>
                                <input type="text" name="nbr_concent_fonc" id="nbr_concent_fonc" value="<?php echo $etab["nbr_concent_fonc"]; ?>" class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md ">
                            </div>
                    </div>        
                </div>
                <div class=" my-10">
                    <li class=" font-poppins font-semibold text-neutral-700">Bouteilles d'oxygene : </li>
                </div>
                
                <div class=" border-2 rounded-md p-4 flex flex-col ">
                    <div class="flex w-full flex-row justify-center items-center my-8 ">
                            <div class="w-full flex flex-row gap-3 items-center">
                                <div class=" flex flex-col justify-center items-center">
                                    <label class="font-normal text-neutral-600" for="">Le nombre totale des Bouteilles B05 : </label>
                                    <div class=" text-red-500"><?php echo $errors['nbr_tot_B05']; ?></div>
                                </div>
                                <input type="text" name="nbr_tot_B05" id="nbr_tot_B05" value="<?php echo $etab["nbr_tot_B05"]; ?>" class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md ">
                            </div>
                            <div class="w-full flex flex-row gap-3 items-center">
                                <div class=" flex flex-col justify-center items-center">
                                    <label class="font-normal text-neutral-600" for="">Le nombre des Bouteilles B05 en stock (Remplies) : </label>
                                    <div class=" text-red-500"><?php echo $errors['nbr_B05_remp']; ?></div>
                                </div>
                                <input type="text" name="nbr_B05_remp" id="nbr_B05_remp" value="<?php echo $etab["nbr_B05_remp"]; ?>" class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md ">
                            </div>
                    </div> 
                    <div class="flex w-full flex-row justify-between items-center my-8 ">
                            <div class="w-full flex flex-row gap-3 items-center">
                                <div class=" flex flex-col justify-center items-center">
                                    <label class="font-normal text-neutral-600" for="">Le nombre totale des Bouteilles B15 : </label>
                                    <div class=" text-red-500"><?php echo $errors['nbr_concent_fonc']; ?></div>
                                </div>
                                <input type="text" name="nbr_tot_B15" id="nbr_tot_B15" value="<?php echo $etab["nbr_tot_B15"]; ?>" class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md ">
                            </div>
                            <div class="w-full flex flex-row gap-3 items-center">
                                <div class=" flex flex-col justify-center items-center">
                                    <label class="font-normal text-neutral-600" for="">Le nombre des Bouteilles B15 en stock (Remplies) : </label>
                                    <div class=" text-red-500"><?php echo $errors['nbr_B15_remp']; ?></div>
                                </div>
                                <input type="text" name="nbr_B15_remp" id="nbr_B15_remp" value="<?php echo $etab["nbr_B15_remp"]; ?>" class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md ">
                            </div>
                    </div> 
                    <div class="flex w-full flex-row justify-between items-center my-8 ">
                            <div class="w-full flex flex-row gap-3 items-center">
                                <div class=" flex flex-col justify-center items-center">
                                    <label class="font-normal text-neutral-600" for="">Le nombre totale des Bouteilles B50 : </label>
                                    <div class=" text-red-500"><?php echo $errors['nbr_tot_B50']; ?></div>
                                </div>
                                <input type="text" name="nbr_tot_B50" id="nbr_tot_B50" value="<?php echo $etab["nbr_tot_B50"]; ?>" class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md ">
                            </div>
                            <div class="w-full flex flex-row gap-3 items-center">
                                <div class=" flex flex-col justify-center items-center">
                                    <label class="font-normal text-neutral-600" for="">Le nombre des Bouteilles B50 en stock (Remplies) : </label>
                                    <div class=" text-red-500"><?php echo $errors['nbr_B50_remp']; ?></div>
                                </div>
                                <input type="text" name="nbr_B50_remp" id="nbr_B50_remp" value="<?php echo $etab["nbr_B50_remp"]; ?>" class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md ">
                            </div>
                    </div>        
                </div>
                <div class=" my-10 flex flex-row gap-4">
                    <li class=" font-poppins font-semibold text-neutral-700">Generateur D'Oxygene : </li>
                    <label>
                        <input type="radio" name="choice1" value="oui" <?php if($etab["generateur"] == 1){ echo "checked" ;}; ?>>
                         Oui
                    </label>
                    <label>
                        <input type="radio" name="choice1" value="non" <?php if($etab["generateur"] == 0){ echo "checked" ;}; ?>>
                        Non
                    </label>
                </div>
                <div class=" border-2 rounded-md p-4 ">
                    <div class="flex w-full flex-row justify-evenly items-center gap-6 my-10 ">
                            <div class="w-full flex flex-row gap-3 items-center">
                                <div class=" flex flex-col justify-center items-center">
                                    <label class="font-normal text-neutral-600" for="">Capacite de production du generateurs d'oxygene (Nm3/H ) : </label>
                                    <div class=" text-red-500"><?php echo $errors['cap_prod_gen']; ?></div>
                                </div>
                                <input type="text" name="cap_prod_gen" id="cap_prod_gen" value="<?php echo $etab["cap_prod_gen"]; ?>" class=" border-2 border-solid border-neutral-200 py-2 px-4 outline-none rounded-md ">
                            </div>
                            <div class="w-full flex flex-row gap-3 items-center">
                                <label class="font-normal text-neutral-600" for="">Generateur d'oxygene fonctionnels : </label>
                                <label>
                                    <input type="radio" name="choice2" id="c1" value="oui" <?php if($etab["gen_fonct"] == 1){ echo "checked" ;}; ?>>
                                    Oui
                                </label>
                                <label>
                                    <input type="radio" name="choice2" id="c2" value="non" <?php if($etab["gen_fonct"] == 1){ echo "checked" ;} ;?>>
                                    Non
                                </label>
                            </div>
                    </div>        
                </div>
                <div class=" w-full flex justify-center items-center my-6">
                    <input type="submit" value="Submit" name="submit" class=" hover:bg-white hover:text-blue-400 hover:border-blue-400 hover:border-2 hover:border-solid cursor-pointer rounded-md font-semibold text-white bg-blue-400 border-white py-2 px-8">
                </div>
            </form>
        </div>
    </body>
</html>