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
            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-calculator"></i> Operaciones</h3>
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
                                    <label class="col-md-4 control-label" for="f_pago">Fecha de Pago:</label>
                                    <div class="col-md-8">
                                        <select class="form-control" id="f_pago" style="width: 100%;" v-model="fec_pago">
                                            <option value="0">SELECCIONE UN DÍA</option>
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
                                            <?php for($i=12;$i<=48;$i++){?>
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
                    <legend></legend>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="tea">TEA(%):</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static"><span class="label label-success" style="font-size:100% !important;">{{tea.toFixed(2)}}%</span></p>
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
                                        <p class="form-control-static"><span class="label label-success" style="font-size:100% !important;">Día {{plazo_final}}</span></p>
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
                                        <p class="form-control-static"><span class="label label-success" style="font-size:100% !important;">{{monto_a_llevar.toFixed(2)}}</span></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="calcular" @click="calcular()" style="float:right;">
                            <i class="glyphicon glyphicon-exclamation-sign"></i> Calcular
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-print"></i> Resultados</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="seg_desg">Seguro de Desgravamen:</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static"><span class="label label-warning" style="font-size:100% !important;">{{seg_desg.toFixed(2)}}</span></p>
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
                                        <p class="form-control-static"><span class="label label-warning" style="font-size:100% !important;">{{seg_protec.toFixed(2)}}</span></p>
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
                                        <p class="form-control-static"><span class="label label-warning" style="font-size:100% !important;">S/. {{cuota.toFixed(2)}}</span></p>
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
                                        <p class="form-control-static"><span class="label label-warning" style="font-size:100% !important;">{{tcea.toFixed(2)}}%</span></p>
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
                                        <p class="form-control-static"><span class="label label-warning" style="font-size:100% !important;">{{tot_interes.toFixed(2)}}</span></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xs-12">
            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-pie-chart"></i> Detalle de Cuotas</h3>
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
            fec_pago:0,
            monto_oferta:0.00,
            plazo:"",
            tem:0.00,
            tea:0.00,
            plazo_final:0,
            monto_a_llevar:0.00,
            monto_a_llevar_total:0.00,
            seg_protec:0.00,
            cuota:0.00,
            tcea:0.00,
            tot_interes:0.00
        },
        created: function () {
        },
        methods:{
            calcular(){
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

                var sumaFecha = function(d, fecha) {
                    var Fecha = new Date();
                    var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() +1) + "/" + Fecha.getFullYear());
                    var sep = sFecha.indexOf('/') != -1 ? '/' : '-';
                    var aFecha = sFecha.split(sep);
                    var fecha = aFecha[2]+'/'+aFecha[1]+'/'+aFecha[0];
                    fecha= new Date(fecha);
                    fecha.setDate(fecha.getDate()+parseInt(d));
                    var anno=fecha.getFullYear();
                    var mes= fecha.getMonth()+1;
                    var dia= fecha.getDate();
                    mes = (mes < 10) ? ("0" + mes) : mes;
                    dia = (dia < 10) ? ("0" + dia) : dia;
                    var fechaFinal = anno+sep+mes+sep+dia;
                    return (fechaFinal);
                }

                this.tea = (Math.pow(1+this.tem/100,12)-1)*100;
                this.plazo_final = this.plazo;

                //validacion campo Monto a llevar
                if(this.plazo<='23'){
                    this.monto_a_llevar = this.monto_oferta;
                }else{
                    var url = "";
                    if(this.monto_oferta<=5000){
                        this.monto_a_llevar = 5000;
                    }else{
                        if(this.producto=="1"){
                            var url = 'controlador/get_pya_cdd_value.php?plazo='+sys_calc_3.plazo_final+'&monto='+sys_calc_3.monto_oferta;
                        } else {
                            if(this.producto=="2"){
                                var url = 'controlador/get_pya_cdd_value.php?plazo='+sys_calc_3.plazo_final+'&monto='+sys_calc_3.monto_oferta;
                            } else {
                                if(this.producto=="3"){
                                    var url = 'controlador/get_pya_cdd_value.php?plazo='+sys_calc_3.plazo_final+'&monto='+sys_calc_3.monto_oferta;
                                }
                            }
                        }
                        
                        let me = this;
                        axios.get(url)
                        .then(function (response) {
                            me.monto_a_llevar = response.data;

                            //======================================================================
                            var f_hoy = moment(me.hoy,"YYYY-MM-DD");
                            var tabla_capital = [];
                            var mes = moment(me.hoy,"YYYY-MM-DD").get("month")+1;
                            var dias_p = 0;
                            var fech_ant = "";
                            var capital_ant = "";
                            var cuota = "";
                            var factor = "";
                            var ted = Math.pow(1+me.tea,(1/360))-1;

                            if(mes==1 || mes==3 || mes==5 || mes==7 || mes==8 || mes==10 || mes==12){dias_p=31;}
                            if(mes==2){dias_p=28;}
                            if(mes==4 || mes==6 || mes==9 || mes==11){dias_p=30;}

                            var dias_t = (dias_p - moment(me.hoy,"YYYY-MM-DD").get('date'))+parseInt(me.fec_pago,10);

                            f_fin = moment(me.hoy,"YYYY-MM-DD").add(dias_t,'days');
                            f_hoy_value = moment(me.hoy,"YYYY-MM-DD").get('year')+"-"+(moment(me.hoy,"YYYY-MM-DD").get('month')+1)+"-"+moment(me.hoy,"YYYY-MM-DD").get('date');
                            f_fin_value = moment(me.hoy,"YYYY-MM-DD").add(dias_t,'days').get('year')+"-"+(moment(me.hoy,"YYYY-MM-DD").add(dias_t,'days').get('month')+1)+"-"+moment(me.hoy,"YYYY-MM-DD").add(dias_t,'days').get('date');

                            var diferencia = f_fin.diff(f_hoy,'days');

                            for(var i=1;i<=48;i++){
                                var inicio = "";
                                var fin = "";
                                var nro_dias = "";
                                var capital = "";
                                var desgravamen = "";
                                var pp = "";

                                if(me.producto=="1"){
                                    desgravamen = "10.00";
                                    pp = "5";
                                } else {
                                    if(me.producto=="2"){
                                        desgravamen = "20.00";
                                        pp = "0";
                                    } else {
                                        if(me.producto = "3"){
                                            desgravamen = "20.00";
                                            pp = "0";
                                        }
                                    }
                                }

                                if(i==1){
                                    if(i<=me.plazo_final){
                                        inicio=me.hoy;
                                        if(diferencia>31){
                                            fin = moment(me.hoy,"YYYY-MM-DD").add(dias_t,'days').get('year')+"-"+(moment(me.hoy,"YYYY-MM-DD").add(dias_t,'days').get('month')+1)+"-"+moment(me.hoy,"YYYY-MM-DD").add(dias_t,'days').get('date');
                                            fech_ant = fin;
                                        }else{
                                            mes_n = moment(me.hoy,"YYYY-MM-DD").get('month')+2;
                                            if(mes_n==1 || mes_n==3 || mes_n==5 || mes_n==7 || mes_n==8 || mes_n==10 || mes_n==12){dias_p_n=31;}
                                            if(mes_n==2){dias_p_n=28;}
                                            if(mes_n==4 || mes_n==6 || mes_n==9 || mes_n==11){dias_p_n=30;}
                                            fin = moment(me.hoy,"YYYY-MM-DD").add((dias_t+dias_p_n),'days').get('year')+"-"+(moment(me.hoy,"YYYY-MM-DD").add((dias_t+dias_p_n),'days').get('month')+1)+"-"+moment(me.hoy,"YYYY-MM-DD").add((dias_t+dias_p_n),'days').get('date');
                                            fech_ant = fin;
                                        }
                                    }

                                    if(i<=me.monto_a_llevar){
                                        capital = me.monto_a_llevar;
                                        capital_ant = capital;
                                    }
                                } else {
                                    if(i<=me.plazo_final){
                                        inicio = fech_ant;
                                        var mes_x = moment(fech_ant,"YYYY-MM-DD").get("month")+1;
                                        if(mes_x==1 || mes_x==3 || mes_x==5 || mes_x==7 || mes_x==8 || mes_x==10 || mes_x==12){dias_p_x=31;}
                                        if(mes_x==2){dias_p_x=28;}
                                        if(mes_x==4 || mes_x==6 || mes_x==9 || mes_x==11){dias_p_x=30;}

                                        var dias_t_x = (dias_p_x - moment(fech_ant,"YYYY-MM-DD").get('date'))+parseInt(me.fec_pago,10);

                                        fin = moment(fech_ant,"YYYY-MM-DD").add(dias_t_x,'days').get('year')+"-"+(moment(fech_ant,"YYYY-MM-DD").add(dias_t_x,'days').get('month')+1)+"-"+moment(fech_ant,"YYYY-MM-DD").add(dias_t_x,'days').get('date');

                                        fech_ant = fin;

                                        capital = capital_ant;
                                        capital_ant = capital;
                                    }
                                }

                                if(inicio!="" && fin!=""){
                                    nro_dias = moment(fin,"YYYY-MM-DD").diff(moment(inicio,"YYYY-MM-DD"),'days');
                                }

                                if(i<=me.plazo_final){
                                    if(nro_dias!=""){
                                        factor = 1/(Math.pow(1+me.ted/100,nro_dias));
                                    }
                                }

                                tabla_capital.push({
                                    "inicio":inicio,
                                    "fin":fin,
                                    "nro_dias":nro_dias,
                                    "capital":capital,
                                    "desgravamen":desgravamen,
                                    "pp":pp,
                                    "eecc":"",
                                    "amortizacion":"",
                                    "interes":"",
                                    "cuota":""
                                });
                            }

                            console.log(tabla_capital);
                            //======================================================================
                            
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                        .finally(function () {
                        });
                    }
                }
            }
        },
        mounted() {
    
        }
    });
</script> 