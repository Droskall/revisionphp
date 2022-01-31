<?php

require __DIR__ . '/../helpers/forms-utils.php';

// Checking if form was submitted.
if(!isset($_POST['submit-contact'])) {
    header('Location: /contact.php?f=1');
    exit();
}

// Checking all required inputs were completed.
if(!issetMandatoryPostValues('username', 'mail', 'password', 'password-repeat', 'message', 'age')) {
    // Traitement des données
    header('Location: /contact.php?f=1');
    exit();
}

passwordCheck('password');

// Récupération de données sécurisées (hors contexte database bien sûr).
$username = getSecuredStringPostData('username');
$mail = getSecuredStringPostData('mail');
$message = getSecuredStringPostData('message');
$age = getSecuredIntPostData('age');

$password = getSecuredStringPostData('password');
$passwordRepeat = getSecuredStringPostData('password-repeat');

// Gestion des password.
validateRange(4, 25,'password', '/contact.php?f=5');
validateRange(4, 25,'password-repeat', '/contact.php?f=5');

if($password !== $passwordRepeat) {
    header('Location: /contact.php?f=6');
    exit();
}

// Checking input ranges validity.
validateRange(4, 20, 'username', '/contact.php?f=2');
validateRange(7, 50, 'mail', '/contact.php?f=3');
validateRange(20, 255, 'message', '/contact.php?f=7');


// On teste maintenant les différentes valeurs.
// age
if ($age < 18 || $age > 120){
    header('Location: /contact.php?f=4');
    exit();
}

header('Location : /contact.php?f=0');


// Vérifier:
//   -> le pattern du $password
//   -> le pattern du $mail



