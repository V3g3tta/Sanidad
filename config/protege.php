<?php
function protege($texto){
    $texto = str_replace("'", "\'", $texto);
    $texto = htmlspecialchars ($texto);
    $texto = htmlentities ($texto);
    $texto = trim ($texto);
    $texto = stripslashes($texto);
    return $texto;
}