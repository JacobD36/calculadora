<?php
require_once($_SERVER['DOCUMENT_ROOT']."/calculadora/configuracion/database.php");

class calc_model
{
    private $db;

    public function __construct(){
        $this->db = database::conexion();
    }

    public function get_conversion_2(){
        try{
            $stmt = $this->db->prepare("select * from conversion_2;");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            unset($stmt);
            return $rows;
        }catch(PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function get_factor_value($dato){
        try{
            $stmt = $this->db->prepare("select factor from conversion_2 where plazo='".$dato."' limit 1;");
            $stmt->execute();
            $row = $stmt->fetchAll();
            if($row!=null){
                return $row[0]['factor'];
            } else {
                return 0.00;
            }
        }catch(PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function get_pya_cdd_value($plazo,$monto){
        try{
            $stmt = $this->db->prepare("select factor from pya_cdd where plazo='".$plazo."' limit 1;");
            $stmt->execute();
            $row = $stmt->fetchAll();
            $stmt1 = $this->db->prepare("select factor from pya_cdd where plazo='36' limit 1;");
            $stmt1->execute();
            $row1 = $stmt1->fetchAll();
            unset($stmt);
            unset($stmt1);

            $div = $monto/$row1[0]['factor'];
            $prod = $row[0]['factor']*$div;
            
            return $prod;
        }catch(PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function get_prestamo_senior_value($plazo,$monto){
        try{
            $stmt = $this->db->prepare("select factor from prestamo_senior where plazo='".$plazo."' limit 1;");
            $stmt->execute();
            $row = $stmt->fetchAll();
            $stmt1 = $this->db->prepare("select factor from pya_cdd where plazo='36' limit 1;");
            $stmt1->execute();
            $row1 = $stmt1->fetchAll();
            unset($stmt);
            unset($stmt1);

            $div = $monto/$row1[0]['factor'];
            if ($row!=null) {
                $prod = $row[0]['factor']*$div;
            } else {
                $prod = 0.00;
            }

            return $prod;
        }catch(PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function guarda_log($dato){
        $fp = fopen($_SERVER['DOCUMENT_ROOT']."/logs/querys.txt", "a");
        fputs($fp, $dato."\r\n");
        fclose($fp);
    }
}
?>