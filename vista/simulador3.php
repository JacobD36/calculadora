<?php 
    date_default_timezone_set("America/Lima");
    $fecha_actual = date("Y-m-d");
?>
<!-- Content Header (Page header) -->
<style type="text/css">
    .modal-header {
        background-color: #5c94cc;
        color: white;
    }
</style>
<section class="content-header">
    <h1>SIMULADOR PRÉSTAMO EFECTIVO - CONSOLIDACIÓN DE DEUDA</h1>
    <ol class="breadcrumb">
        <li><a href="./inicio.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">PyA Nuevo</li>
    </ol>
</section>
<section class="content">
    <div class="row" id="sys_calc_3">
        <div class="col-md-6 col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Operaciones</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="producto">Producto:</label>
                                    <div class="col-md-8">
                                        <select class="form-control" id="producto" style="width: 100%;" v-model="producto">
                                            <option value="">SELECCIONE UN PRODUCTO</option>
                                            <option value="1">Préstamo Efectivo</option>
                                            <option value="2">Préstamo Senior</option>
                                            <option value="3">Consolidación de Deuda</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="fec_desem">Fecha de Desembolso:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="fec_desem" type="date" v-model="hoy">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="fec_pago">Fecha de Pago:</label>
                                    <div class="col-md-8">
                                        <select class="form-control" id="fec_pago" style="width: 100%;" v-model="fec_pago">
                                            <option value="">SELECCIONE UN DÍA</option>
                                            <option value="1">1</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="25">25</option>
                                            <option value="30">30</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="monto_oferta">Monto Oferta:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="monto_oferta" type="number" placeholder="0.00" v-model.number="monto_oferta">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                <label class="col-md-4 control-label" for="plazo">Plazo:</label>
                                    <div class="col-md-8">
                                        <select class="form-control" id="plazo" style="width: 100%;" v-model="plazo">
                                            <option value="">SELECCIONE UN PLAZO</option>
                                            <?php for($i=1;$i<=48;$i++){?>
                                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="tem">TEM(%):</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="tem" type="number" placeholder="0.00" v-model.number="tem">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="tea">TEA(%):</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static">{{tea.toFixed(2)}}%</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="plazo_final">Plazo final elegido por el cliente (meses):</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static"><strong>{{plazo_final}} meses</strong></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="monto_a_llevar">Monto a llevar:</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static"><strong>{{monto_a_llevar.toFixed(2)}}</strong></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="buscar_dato" style="float:right;">
                            <i class="glyphicon glyphicon-exclamation-sign"></i> Calcular
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Resultados</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="seg_desg">Seguro de Desgravamen:</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static">{{seg_desg.toFixed(2)}}</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="seg_protec">Seguro de Protección de Pagos:</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static">{{seg_protec.toFixed(2)}}</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="cuota">Cuota (S/.):</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static">S/. {{cuota.toFixed(2)}}</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="tcea">TCEA:</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static">{{tcea.toFixed(2)}}%</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="tot_interes">Total de Interés Compensatorio:</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static">{{tot_interes.toFixed(2)}}</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Detalle de Cuotas</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                <table class="table table-bordered table-striped display responsive nowrap" width="100%" cellspacing="0" id="my-table" >
                                    <thead>
                                        <tr role="row" class="col_heading"></tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal" data-backdrop="static" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="contenido_modal">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    </div>  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var sys_calc_3 = new Vue({
        el: '#sys_calc_3',
        data: {
            producto:"",
            seg_desg:0.00,
            hoy: '<?php echo $fecha_actual;?>',
            fec_pago:"",
            monto_oferta:0.00,
            plazo:"",
            tem:0.00,
            tea:0.00,
            plazo_final:0,
            monto_a_llevar:0.00,
            seg_protec:0.00,
            cuota:0.00,
            tcea:0.00,
            tot_interes:0.00
        },
        created: function () {
        },
        methods:{
            busca_valor(){
                var formatNumber = {
                    separador: ",", 
                    sepDecimal: '.',
                    formatear:function (num){
                        num +='';
                        var splitStr = num.split('.');
                        var splitLeft = splitStr[0];
                        var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
                        var regx = /(\d+)(\d{3})/;
                        while (regx.test(splitLeft)) {
                            splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
                        }
                        return this.simbol + splitLeft +splitRight;
                    },
                    new:function(num, simbol){
                        this.simbol = simbol ||'';
                        return this.formatear(num);
                    }
                }
            },
        },
        mounted() {
    
        }
    });
</script> 