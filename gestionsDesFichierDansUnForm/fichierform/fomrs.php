<?php

/*
 * Premiere methode
 */
//if (isset($_FILES["fichierUser"]) && $_FILES['fichierUser']['error'] === 0){
    // On récupère le nom temporaire du fichier
    //$tmp_name = $_FILES["fichierUser"]["tmp_name"];
    // On recupere le nom du réel du fichier
    //$name = $_FILES["fichierUser"]["name"];
    // On déplace le fichier
    //move_uploaded_file($tmp_name, $name);
    //echo "Fichier Envoyer";
//}

//else {
    //echo "Echec";
//}

/*
 * Deuxieme Methode pour les types de fichiers
 */

//if (isset($_FILES["fichierUser"]) && $_FILES['fichierUser']['error'] === 0){

  //  $allowedMimeType = [ 'image/jpeg', 'application/pdf'];

    //if (in_array($_FILES['fichierUser']['type'], $allowedMimeType)){

      //  $tmp_name = $_FILES['fichierUser']['tmp_name'];

        //$name = $_FILES['fichierUser']['name'];

        //move_uploaded_file($tmp_name, $name);
    //}

    //else{
      //  echo "Vous avez fourni un mauvais type de fichier";
    //}
//}
//else {
  //  echo "Erreur";
//}

/**
 * @param String $regularName
 * @return string
 */
function getRandomName(String $regularName): string {
    $info = pathinfo($regularName);
    try {
        $byte = random_bytes(15);
    }
    catch (Exception $e){
        $byte = openssl_random_pseudo_bytes(15);
    }

    return bin2hex($byte). '.' . $info['extension'];
}

if (isset($_FILES["fichierUser"]) && $_FILES['fichierUser']['error'] === 0){

    $allowedMimeType = [ 'image/jpeg', 'application/pdf'];
    if (in_array($_FILES['fichierUser']['type'], $allowedMimeType)){

        $maxSize = 2 * 1024 *1024; // = 2 MO
        if ((int)$_FILES['fichierUser']['size'] <= $maxSize){

            // on recupere le nom temporaire du fichier
            $tmp_name = $_FILES['fichierUser']['tmp_name'];
            // On récupère un nom de ficheir aléatoires grace a la fonction "getRandomName"
            $name = getRandomName($_FILES["fichierUser"]["name"]);
            // On verifie que le dossier existe si pas on le crée
            if (!is_dir('uploads')){
                mkdir('uploads', '0755');
            }

            //on deplaceh le fichier
            move_uploaded_file($tmp_name, 'uploads/' . $name);
        }
        else{
            echo "le poids est trop lourd";
        }
    }
    else{
        echo "Vous avez fourni un mauvais type de fichier";
    }
}
else {
    echo "Erreur";
}

?>
