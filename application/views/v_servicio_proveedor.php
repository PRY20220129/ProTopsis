<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Categorías TI</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                                <li class="breadcrumb-item active">Categorías</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div id="alert-success" style="display:none;" class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    <label id="mensaje-success"></label>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div id="alert-danger" style="display:none;" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-block-helper me-2"></i>
                    <label id="mensaje-danger"></label>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div><!-- end col -->

            <!-- end page title -->
            <div class="row">
                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-header bg-soft-primary border-dark">
                            <h4 class="card-title">Agregar</h4>
                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div style="align-items:center;">
                                            <label for="Descripcion" class="form-label">Descripción</label>
                                            <span class="form-label" id="lbl_descripcion_msj">  </span>
                                        </div>                                        
                                        <input type="text" class="form-control form-control-sm" id="text_descripcion" placeholder="Ingrese nueva categoría" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                        <button class="btn btn-sm btn-danger form-control" onclick="registrar();">Agregar</button>
                                        <button style="margin-top:10px;" class="btn btn-sm btn-danger form-control" onclick="grabar_todos();">Grabar todos</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9">
                    <div class="card">
                        <div class="card-header bg-soft-primary border-dark">
                            <h4 class="card-title">Lista de registros</h4>
                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body">
                            <!--<table id="tb_table" class="table table-bordered dt-responsive nowrap w-100">-->
                            <table id="tb_table" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Nro</th>
                                        <th>Categoría</th>
                                        <th>Fecha Registro</th>
                                        <th>Opción</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    
</div>

    <!--Modals-->
    <!-- Static Backdrop Modal -->
    <div class="modal fade" id="modal_editar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Editar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div style="align-items:center;">
                                    <label for="Descripcion" class="form-label">Descripción</label>
                                    <span class="form-label" id="lbl_descripcion_upd_msj">  </span>
                                </div> 
                                <input type="text" class="form-control" id="text_descripcion_upd" placeholder="Tipo de servicio" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger" onclick="actualizar();">Grabar</button>
                </div>
            </div>
        </div>
    </div>
    <!---------->

    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true" id="mdl_resumen">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="text_descripcion_titulo">Categorías</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12" style="text-align:center;">
                            <img src="" id="img_modal"><br>
                            <label id="txt_descripcion_detalle">Detalle</label>
                            <label id="txt_descripcion_total">0</label>
                        </div>
                        <div class="col-lg-12 mt-3" style="text-align:center;">
                            <a class="btn btn-danger btn-sm" href="<?php echo base_url();?>menu">Ok !</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
    var id_upd; 
    var table; 
    $(document).ready(function() {
        id_upd=0; 
        //table.ajax.reload(null,false); 
        forDataTables('#tb_table','C_servicio/listar_registros'); 
        //table.buttons().container().appendTo('#tb_table_wrapper .col-md-6:eq(0)');
    });

    function grabar_todos(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_servicio/obtener_resumen',
            data: {
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                $('#text_descripcion_titulo').text('Categoría TI');
                $('#img_modal').attr('src','public/images/iconos/servicios2.png');
                $('#txt_descripcion_detalle').text('Total de categoría registrados: ');
                $('#txt_descripcion_total').text(data);
                $('#mdl_resumen').modal('show');
            }
        });
    }

    function editar(id){
        id_upd=id; 

        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_servicio/obtener_datos',
            data: {
                'id':id
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                if(data=='noexiste'){
                    alertify.error('La descripción no existe.');
                    //alertas('danger','La descripción no existe');
                }else{
                    var json         = eval("(" + data + ")");
                    $('#text_descripcion_upd').val($.trim(json.descripcion));
                }
            }
        });
        $('#modal_editar').modal('show');
    }

    function actualizar(){
        let des = $('#text_descripcion_upd').val();
        if(des!=''){
            $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_servicio/actualizar',
            data: {
                'des':des,
                'id' :id_upd
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                if(data=='duplicado'){
                        noti_input('lbl_descripcion_upd_msj','* Ingrese otra descripción.','error');
                        //editar(id_upd);
                        alerta_mensaje('¡Ocurrió algo!','La categoría ingresado ya se cuenta registrada.','error');
                    //alertas('danger','La descripción ingresada ya se encuentra registrada');
                }else{
                    //table.ajax.reload(null,false); 
                    table.ajax.reload(null,false);                        
                    //alertify.success('La descripción ha sido actualizada correctamente.');

                    noti_input('lbl_descripcion_upd_msj','','');
                    alerta_mensaje('Actualización correcta!','Categoría modificada correctamente.','success');

                    //alertas('success','La descripción ha sido actualizada correctamente');
                    $('#text_descripcion').val('');
                    $('#modal_editar').modal('hide');
                }
            }
            });
        }else{
            noti_input('lbl_descripcion_msj','* Ingrese la descripción de la categoría.','error');
            alerta_mensaje('¡Ocurrió algo!','Ingrese una categoría correcto.','error');
        }

    }

    function alertas(tipo,mensaje){
        switch (tipo) {
            case 'success':
                $('#mensaje-success').text(mensaje);
                $('#alert-success').fadeIn();
                setInterval(() => {
                    $('#alert-success').fadeOut();
                }, 3000);                
                break;
            case 'danger':
                $('#mensaje-danger').text(mensaje);
                $('#alert-danger').fadeIn();
                setInterval(() => {
                    $('#alert-danger').fadeOut();
                }, 3000);                
                break;                
            default:
                break;
        }
    }

    function registrar(){
        let des = $('#text_descripcion').val();
        if(des!=''){
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>C_servicio/registrar',
                data: {'des':des}, 
                beforeSend:function(){
                },   
                success: function(data){ 
                    if(data=='duplicado'){
                        noti_input('lbl_descripcion_msj','* Ingrese una descripción.','error');
                        alerta_mensaje('¡Ocurrió algo!','El servicio ingresado ya se cuenta registrada.','error');
                        //alertify.error('La descripción ingresada no se encuentra disponible.');
                        // alertas('danger','');
                    }else{
                        //table.ajax.reload(null,false); 
                        table.ajax.reload(null,false);          
                        //alertify.success('Registro realizado.');

                        noti_input('lbl_descripcion_msj','','');
                        alerta_mensaje('¡Registro Correcto!','Servicio agregado correctamente.','success');

                        $('#text_total_navbar_servicio').text(data);
                        //alertas('success','La descripción ingresada ha sido registrada correctamente');
                        $('#text_descripcion').val('');
                    }
                }
            });
        }else{
            noti_input('lbl_descripcion_msj','* Ingrese una descripción.','error');
            alerta_mensaje('¡Ocurrió algo!','Ingrese un servicio correcto.','error');
            //alertify.error('Ingrese una descripción correcta.');
            //alertas('danger','Ingrese una descripción');
        }

    }

    function listar(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_servicio/listar',
            data: {}, 
            beforeSend:function(){
            },   
            success: function(data){ 
                $('#table_contenido').html(data);
            }
        });
    }

    function eliminar(id){

        alertify.confirm("¿Està seguro de eliminar el registro?.",
        function(){
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>C_servicio/eliminar',
                data: {'id':id}, 
                beforeSend:function(){
                },   
                success: function(data){
                    if(data=='error'){
                        alerta_mensaje('¡Ocurrió algo!','El servicio a eliminar, no pudo completarse la acción.','error');
                        alertify.error('No se pudo eliminar la descripción.');
                        //alertas('danger','Hubo un error, no se pudo eliminar la descripción seleccionada.');
                    }else{
                        //table.ajax.reload(null,false); 
                        table.ajax.reload(null,false);            
                        alerta_mensaje('¡Servicio Eliminado!','El servicio seleccionado se eliminó correctamente.','error');
                        $('#text_total_navbar_servicio').text(data);
                        //alertas('success','La descripción seleccionada ha sido eliminada.');
                    }
                }
            });            
        },
        function(){
            alertify.error('Cancel');
        });        

    }

    function forDataTables( id, ruta) {
        table = $(id).DataTable({
            "scrollX": false,
            "processing":true,
            "serverSide":true,
            "order":[],
            //"dom": 'Bfrtip',
            //"buttons": ['copy', 'excel', 'pdf', 'colvis'],
            "ajax":{
                url:"<?php echo base_url(); ?>" + ruta,
                type:"POST"
            },          
            "order": [[ 0, "DESC" ]],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Del _START_ al _END_",
                "sInfoEmpty": "Del 0 al 0 ",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
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
            }
        });
    } 
</script>