<?php 
    require_once($_SERVER['DOCUMENT_ROOT']."/calculadora/modelo/calc_model.php");
    $plazo = $_GET['plazo'];
    $datos = new calc_model();
    $factor = $datos->get_factor_value($plazo);
    echo $factor;
?>