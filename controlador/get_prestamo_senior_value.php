<?php 
    require_once($_SERVER['DOCUMENT_ROOT']."/calculadora/modelo/calc_model.php");
    $data = new calc_model();
    $plazo = $_GET['plazo'];
    $monto = $_GET['monto'];
    $elem = $data->get_prestamo_senior_value($plazo,$monto);
    echo $elem;
?>