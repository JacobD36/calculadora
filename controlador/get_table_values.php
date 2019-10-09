<?php 
    require_once($_SERVER['DOCUMENT_ROOT']."/calculadora/modelo/calc_model.php");
    $data = new calc_model();
    $neto = $_GET['neto'];
    $elem = $data->get_conversion_2();
    if ($elem!=null) {
        foreach ($elem as $lista) {
            $n_val = number_format($neto*$lista['factor'],2,'.',',');
            $arreglo["data"][] = array($lista['plazo'],$lista['factor'],$n_val);
        }
    } else {
        $arreglo["data"][] = array('','SIN REGISTROS','');
    }
    echo json_encode($arreglo,JSON_UNESCAPED_UNICODE|JSON_PARTIAL_OUTPUT_ON_ERROR|JSON_ERROR_UTF8|JSON_ERROR_RECURSION);
?>