<?php

$timeOf = time() + (60 * 60 * 24); // 1 jour

//Demarage de la session avant TOUT code HTML
session_start();

setcookie(session_name(), session_id(), $timeOf);

$_SESSION['theme'] = 'dark';
$_SESSION['username'] = 'dada';

//finalement on detruits la sess
session_destroy();
