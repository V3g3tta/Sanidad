<?php
session_start();

if (!empty($_SESSION['rol']) && $_SESSION['rol'] == '1'){
    header('Location: /');
}