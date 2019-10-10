<?php 
    require_once($_SERVER['DOCUMENT_ROOT']."/calculadora/modelo/calc_model.php");
    $data = new calc_model();
    $plazo = $_GET['plazo'];
    $monto = $_GET['monto'];
    $elem = $data->get_pya_cdd_value($plazo,$monto);
    echo $elem;
?>