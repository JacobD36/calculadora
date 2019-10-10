<!-- Content Header (Page header) -->
<style type="text/css">
    .modal-header {
        background-color: #5c94cc;
        color: white;
    }
</style>
<section class="content-header">
    <h1>FACTORES DE CONVERSION</h1>
    <ol class="breadcrumb">
        <li><a href="./inicio.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Factores de Conversión</li>
    </ol>
</section>
<section class="content">
    <div class="row" id="sys_calc_2">
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
                                    <label class="col-md-2 control-label" for="plazo">Plazo:</label>
                                    <div class="col-md-4">
                                        <input class="form-control" id="plazo" type="number" v-model.number="plazo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="factor">Factor:</label>
                                    <div class="col-md-10">
                                        <p class="form-control-static"><span class="label label-success" style="font-size:100% !important;">{{factor.toFixed(2)}}</span></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="importe">Importe:</label>
                                    <div class="col-md-4">
                                        <input class="form-control" id="importe" type="number" placeholder="0.00" v-model.number="importe">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="cuotas">12 Cuotas:</label>
                                    <div class="col-md-10">
                                        <p class="form-control-static"><span class="label label-success" style="font-size:100% !important;">{{cuota}}</span></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="alert alert-info">
                                Montos <= S/.5,000.00 cualquier plazo minimo 12 meses <br/>
                                Montos <= S/.4,000,00 tasa mínima 1.99%
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="buscar_dato" @click="busca_valor()" style="float:right;">
                            <i class="glyphicon glyphicon-exclamation-sign"></i> Calcular
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-print"></i> Resultado</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="email">Neto:</label>
                                    <div class="col-md-10">
                                        <p class="form-control-static"><span class="label label-primary" style="font-size:100% !important;">{{cuota}}</span></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
    var sys_calc_2 = new Vue({
        el: '#sys_calc_2',
        data: {
            plazo:0,
            factor:0.00,
            importe:0.00,
            neto:0.00,
            cuota:0.00
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

                if(sys_calc_2.plazo!="" && sys_calc_2.importe!=""){
                    if(sys_calc_2.plazo>=12 && sys_calc_2.plazo<=36){
                        let me = this;
                        var url = 'controlador/get_factor_value.php?plazo='+sys_calc_2.plazo;
                        axios.get(url)
                        .then(function (response) {
                            me.factor = response.data;
                            me.neto = me.importe/me.factor;
                            me.cuota = formatNumber.new(me.neto.toFixed(2));
                            sys_calc_2.muestra_tabla(me.neto);
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                        .finally(function () {
                        });
                    } else {
                        swal("¡Error! Por favor, ingrese un plazo válido entre 12 y 36 meses.", { icon: "error", });
                    }
                } else {
                    swal("¡Error! Por favor, ingrese importe y plazo.", { icon: "error", });
                }
            },
            muestra_tabla(valor){
                var columns = [
                    { "title":"PLAZO"},
                    { "title":"FACTOR"},
                    { "title":"IMPORTE"}
                ];
                var table = $('#my-table').DataTable( {
                    "processing": true,
                    "lengthChange": true,
                    "responsive" : true,
                    "searching": false,
                    "ordering": false,
                    "info": true,
                    "autoWidth": false,
                    "destroy": true,
                    "columns": columns,
                    "ajax": "controlador/get_table_values.php?neto="+valor,
                    "deferRender": true,
                    "paging": false,
                    "language": {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ registros",
                        "sZeroRecords": "Sin registros",
                        "sEmptyTable": "Tabla vacía",
                        "sInfo": "_START_ a _END_ de _TOTAL_ reg",
                        "sInfoEmpty": "0 a 0 de 0 REG",
                        "sInfoFiltered": "(_MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    },
                    "bInfo": false,
                    "columnDefs": [
                        {
                            "targets": [0],
                            "render": function(data, type, full) {
                                return '<center>'+data+'</center>';
                            }
                        },
                        {
                            "targets": [1],
                            "render": function(data, type, full) {
                                return '<center>'+data+'</center>';
                            }
                        },
                        {
                            "targets": [2],
                            "render": function(data, type, full) {
                                return '<center>'+data+'</center>';
                            }
                        }
                    ],
                });
                $("th").css("background-color", "#4c88bb");
                $("th").css("color", "white");
            }
        },
        mounted() {
            this.muestra_tabla(this.neto);
        }
    });
</script> 