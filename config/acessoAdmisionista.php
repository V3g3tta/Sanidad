<?php
if (!empty($_SESSION['rol']) && $_SESSION['rol'] == '3'){
    header('Location: /');
}