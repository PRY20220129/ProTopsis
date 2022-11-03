<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Solicitudes de Proyecto</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                                <li class="breadcrumb-item active">Solicitudes</li>
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

            <div class="row">

                <div class="col-xl-2 col-md-6" style="">
                    <div class="card card-h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-1 lh-1 d-block text-truncate">Total</span>
                                    <h4 class="mb-1">
                                        <span class="counter-value" data-target="0" id="txt_indicador1">0</span>
                                    </h4>
                                </div>
                                <div class="col-6">
                                    <img  class="mt-1" width="80%" src="https://protopsis.xyz/sistema/public/images/iconos_control/oferta_64.png">
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">Solicitud de proyecto</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-6" style="">
                    <div class="card card-h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-1 lh-1 d-block text-truncate">Solicitud de proyecto</span>
                                    <h4 class="mb-1">
                                        <span class="counter-value" data-target="0" id="txt_indicador2">0</span>
                                    </h4>
                                </div>
                                <div class="col-6">
                                    <img  class="mt-1" width="80%" src="https://protopsis.xyz/sistema/public/images/iconos_control/oferta_64.png">
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">Disponibles</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-6" style="">
                    <div class="card card-h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-1 lh-1 d-block text-truncate">Solicitud de proyecto</span>
                                    <h4 class="mb-1">
                                        <span class="counter-value" data-target="0" id="txt_indicador3">0</span>
                                    </h4>
                                </div>
                                <div class="col-6">
                                    <img  class="mt-1" width="80%" src="https://protopsis.xyz/sistema/public/images/iconos_control/oferta_cerrada_64.png">
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-danger text-danger">Finalizadas</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-6" style="display:none;">
                    <div class="card card-h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-1 lh-1 d-block text-truncate">Req.</span>
                                    <h4 class="mb-1">
                                        <span class="counter-value" data-target="0" id="txt_indicador4">0</span>
                                    </h4>
                                </div>
                                <div class="col-6">
                                    <img  class="mt-1" width="80%" src="https://protopsis.xyz/sistema/public/images/iconos_control/requerimiento_64.png">
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-info text-info">Registros</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- end page title -->
            <div id="pnl_registro" style="display:block;">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="card">
                            <div class="card-header bg-soft-primary border-dark">
                                <h4 class="card-title"> <i class="fas fa-plus-circle"></i> Agregar</h4>
                                <p class="card-title-desc"></p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div style="align-items:center;">
                                                <label for="" class="form-label">Nombre</label>
                                                <span class="form-label" id="lbl_nombre_msj">  </span>
                                            </div>                                        
                                            <input type="text" class="form-control form-control-sm" id="t_nombre" placeholder="Nombre de la solicitud de proyecto" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div style="align-items:center;">
                                                <label for="" class="form-label">Inicio de Solicitud</label>
                                                <span class="form-label" id="lbl_f_inicio_msj">  </span>
                                            </div>                                        
                                            <input type="date" class="form-control form-control-sm" id="t_f_inicio" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div style="align-items:center;">
                                                <label for="" class="form-label">Fin de Solicitud</label>
                                                <span class="form-label" id="lbl_f_fin_msj">  </span>
                                            </div>                                        
                                            <input type="date" class="form-control form-control-sm" id="t_f_fin" placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                            <button class="btn btn-sm btn-danger form-control" onclick="registrar();"><i class="fas fa-plus-circle"></i> Agregar</button>
                                            <!--<button style="margin-top:10px;" class="btn btn-sm btn-danger form-control" onclick="grabar_todos();"> <i class="fas fa-save"></i> Grabar todos</button>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="card">
                            <div class="card-header bg-soft-primary border-dark">
                                <h4 class="card-title"><i class=" fas fa-clipboard-list"></i> Registros</h4>
                                <p class="card-title-desc"></p>
                            </div>
                            <div class="card-body">
                                <!--<table id="tb_table" class="table table-bordered dt-responsive nowrap w-100">-->
                                <table id="tb_table" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Nro</th>
                                            <th>Solicitud</th>
                                            <th>Requerimientos</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Opción</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="pnl_editar" style="display:none;">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="card">
                            <div class="card-header bg-soft-primary border-dark">
                                <h4 class="card-title"><i class=" fas fa-clipboard-list"></i> Detalle</h4>
                                <p class="card-title-desc"></p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div style="align-items:center;">
                                                <label for="" class="form-label">Nombre</label>
                                                <span class="form-label" id="lbl_nombre_msj_upd">  </span>
                                            </div>                                        
                                            <input type="text" class="form-control form-control-sm" id="t_nombre_upd" placeholder="Nombre de la oferta" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div style="align-items:center;">
                                                <label for="" class="form-label">Inicio de Solicitud</label>
                                                <span class="form-label" id="lbl_f_inicio_msj_upd">  </span>
                                            </div>                                        
                                            <input type="date" class="form-control form-control-sm" id="t_f_inicio_upd" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div style="align-items:center;">
                                                <label for="" class="form-label">Fin de Solicitud</label>
                                                <span class="form-label" id="lbl_f_fin_msj_upd">  </span>
                                            </div>                                        
                                            <input type="date" class="form-control form-control-sm" id="t_f_fin_upd" placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                            <button class="btn btn-sm btn-danger form-control" onclick="actualizar();"> Actualizar</button>
                                            <button style="margin-top:10px;" class="btn btn-sm btn-danger form-control" onclick="regresar();"> <i class="fas fa-long-arrow-alt-left"></i> Regresar</button>
                                            <button style="margin-top:10px;" class="btn btn-sm btn-danger form-control" onclick="grabar_todos();"> <i class="fas fa-save"></i> Grabar todos</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-9">
                        <div class="card">
                            <div class="card-header bg-soft-primary border-dark d-sm-flex align-items-center justify-content-between">
                                <h4 class="card-title"><i class="fas fa-clipboard-list"></i> Requerimientos</h4>
                                <div class="page-title-right">
                                    <button class="btn btn-sm btn-danger" onclick="modal_requerimiento();"> <i class="fas fa-plus-circle"></i> Agregar</button>
                                </div>                                
                            </div>
                            <div class="card-body">
                                <!--<table id="tb_table" class="table table-bordered dt-responsive nowrap w-100">-->
                                <table id="tb_table2" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Nro</th>
                                            <th>Descripción</th>
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
    
</div>

    <div class="modal fade" id="modal_agregar_requerimiento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-plus-circle"></i> Agregar requerimiento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div style="align-items:center;">
                                    <label for="Descripcion" class="form-label">Descripción</label>
                                    <span class="form-label" id="lbl_requerimiento">  </span>
                                </div> 
                                <input type="text" class="form-control" id="t_requerimiento" placeholder="Descripción del requerimiento" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger" onclick="registrar_requerimiento();"> <i class="fas fa-save"></i> Grabar</button>
                </div>
            </div>
        </div>
    </div>  
    
    <div class="modal fade" id="modal_editar_requerimiento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Editar requerimiento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div style="align-items:center;">
                                    <label for="Descripcion" class="form-label">Descripción</label>
                                    <span class="form-label" id="lbl_requerimiento_upd">  </span>
                                </div> 
                                <input type="text" class="form-control" id="t_requerimiento_upd" placeholder="Descripción del requerimiento" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger" onclick="actualizar_requerimiento();"> <i class="fas fa-save"></i> Grabar</button>
                </div>
            </div>
        </div>
    </div>  
    <!---------->

    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true" id="mdl_resumen">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="text_descripcion_titulo">Proyectos Registrados</h5>
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
    var id_upd_requerimiento;

    var table; 
    var table2; 
    $(document).ready(function() {
        id_upd=0; 
        //table.ajax.reload(null,false); 
        forDataTables('#tb_table','C_ofertas_cliente/listar_registros'); 
        forDataTables2('#tb_table2','C_requerimiento/listar_registros'); 
        obtener_indicadores();
        //table.buttons().container().appendTo('#tb_table_wrapper .col-md-6:eq(0)');
    });

    function obtener_indicadores(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_ofertas_cliente/obtener_indicadores',
            data: {
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                if(data=='noexiste'){
                    alertify.error('La descripción no existe.');
                    //alertas('danger','La descripción no existe');
                }else{
                    var json         = eval("(" + data + ")");
                    $('#txt_indicador1').text($.trim(json.total));
                    $('#txt_indicador2').text($.trim(json.total_finalizadas));
                    $('#txt_indicador3').text($.trim(json.total_disponibles));
                    $('#txt_indicador4').text($.trim(json.total_requerimientos));
                }
            }
        });
    }

    function modal_requerimiento(){
        $('#modal_agregar_requerimiento').modal('show');
    }

    function registrar_requerimiento(){
        let t_requerimiento = $('#t_requerimiento').val();
        if(t_requerimiento==''){noti_input('lbl_requerimiento',' * Ingrese el detalle del requerimiento','error');return;}
        if(t_requerimiento!=''){
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>C_requerimiento/registrar',
                data: {
                    't_requerimiento':t_requerimiento
                }, 
                beforeSend:function(){
                },   
                success: function(data){ 
                    if(data=='duplicado'){
                        noti_input('lbl_requerimiento',' * Ingrese otra descripción.','error');
                        alerta_mensaje('¡Ocurrió algo!','La descripción del requerimiento ingresado ya existe.','error');
                    }else{
                        noti_input('t_requerimiento','','');
                        $('#t_requerimiento').val('');
                        alerta_mensaje('¡Registro Correcto!','Requerimiento agregado correctamente.','success');
                        $('#modal_agregar_requerimiento').modal('hide');
                        table2.ajax.reload(null,false);
                        //$('#text_total_navbar_servicio').text(data);
                    }
                }
            });
        }else{
            alerta_mensaje('¡Ocurrió algo!',' * Todo los campos son obligatorios.','error');
            //alertify.error('Ingrese una descripción correcta.');
            //alertas('danger','Ingrese una descripción');
        }        
    }

    function regresar(){
        $('#pnl_registro').css('display','block');
        $('#pnl_editar').css('display','none');
        table2.ajax.reload(null,false);
    }

    function grabar_todos(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_ofertas_cliente/obtener_resumen',
            data: {
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                $('#text_descripcion_titulo').text('Proyectos Registrados');
                $('#img_modal').attr('src','public/images/iconos/servicios2.png');
                $('#txt_descripcion_detalle').text('Total de proyectos registrados: ');
                $('#txt_descripcion_total').text(data);
                $('#mdl_resumen').modal('show');
            }
        });
    }

    function editar(id){
        $('#pnl_registro').css('display','none');
        $('#pnl_editar').css('display','block');
        id_upd=id; 

        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_ofertas_cliente/obtener_datos',
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
                    $('#t_nombre_upd').val($.trim(json.descripcion));
                    $('#t_f_inicio_upd').val($.trim(json.f_inicio));
                    $('#t_f_fin_upd').val($.trim(json.f_fin));
                    table2.ajax.reload(null,false);
                }
            }
        });
    }

    function editar_requerimiento(id){
        id_upd_requerimiento=id; 

        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_requerimiento/obtener_datos',
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
                    $('#t_requerimiento_upd').val($.trim(json.descripcion));
                    $('#modal_editar_requerimiento').modal('show');
                }
            }
        });
    }

    function actualizar_requerimiento(){
        let des = $('#t_requerimiento_upd').val();
        if(des!=''){
            $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_requerimiento/actualizar',
            data: {
                'des':des,
                'id' :id_upd_requerimiento
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                if(data=='duplicado'){
                        noti_input('lbl_requerimiento_upd_msj','* Ingrese otra descripción.','error');
                        alerta_mensaje('¡Ocurrió algo!','El requerimiento ingresado ya se cuenta registrada.','error');
                }else{
                    noti_input('lbl_requerimiento_upd','','');
                    alerta_mensaje('Actualización correcta!','Requerimiento modificado correctamente.','success');
                    $('#modal_editar_requerimiento').modal('hide');
                    table2.ajax.reload(null,false);                        
                }
            }
            });
        }else{
            noti_input('lbl_requerimiento_upd','* Ingrese la descripción del requerimiento.','error');
            alerta_mensaje('¡Ocurrió algo!','Ingrese un requerimiento correcto.','error');
        }

    }

    function eliminar_requerimiento(id){
        alertify.confirm("¿Està seguro de eliminar el registro?.",
        function(){
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>C_requerimiento/eliminar',
                data: {'id':id}, 
                beforeSend:function(){
                },   
                success: function(data){
                    if(data=='error'){
                        alerta_mensaje('¡Ocurrió algo!','El requerimiento a eliminar, no pudo completarse la acción.','error');
                        //alertify.error('No se pudo eliminar la descripción.');
                        //alertas('danger','Hubo un error, no se pudo eliminar la descripción seleccionada.');
                    }else{
                        //table.ajax.reload(null,false); 
                        table2.ajax.reload(null,false); 
                        obtener_indicadores();           
                        alerta_mensaje('Requerimiento eliminado!','El requerimiento seleccionado se eliminó correctamente.','error');
                        //$('#text_total_navbar_servicio').text(data);
                        //alertas('success','La descripción seleccionada ha sido eliminada.');
                    }
                }
            });            
        },
        function(){
            alertify.error('Cancel');
        });        
    }

    function actualizar(){
        let t_nombre = $('#t_nombre_upd').val();
        let t_f_inicio = $('#t_f_inicio_upd').val();
        let t_f_fin = $('#t_f_fin_upd').val();

        if(t_nombre==''){noti_input('lbl_nombre_msj_upd','Ingrese un nombre de la solicitud de proyecto','error');return;}
        if(t_f_inicio==''){noti_input('lbl_f_inicio_msj_upd','Ingrese la fecha inicio de la solicitud de proyecto','error');return;}
        if(t_f_fin==''){noti_input('lbl_f_fin_msj_upd','Ingrese la fecha fin de la solicitud de proyecto','error');return;}

        if(t_nombre!='' || t_f_inicio!='' || t_f_fin!='' ){
            $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_ofertas_cliente/actualizar',
            data: {
                't_nombre':t_nombre,
                't_f_inicio':t_f_inicio,
                't_f_fin':t_f_fin
            },
            beforeSend:function(){
            },   
            success: function(data){ 
                if(data=='duplicado'){
                        noti_input('lbl_nombre_msj_upd','* Ingrese otra descripción.','error');
                        //editar(id_upd);
                        alerta_mensaje('¡Ocurrió algo!','El requerimiento ingresado ya se cuenta registrado.','error');
                    //alertas('danger','La descripción ingresada ya se encuentra registrada');
                }else{
                    //table.ajax.reload(null,false); 
                    table.ajax.reload(null,false);        
                    obtener_indicadores();       
                    //alertify.success('La descripción ha sido actualizada correctamente.');

                    noti_input('lbl_nombre_msj_upd','','');
                    alerta_mensaje('Actualización correcta!','Oferta modificada correctamente.','success');

                    //alertas('success','La descripción ha sido actualizada correctamente');
                    $('#text_descripcion').val('');
                    $('#modal_editar').modal('hide');
                }
            }
            });
        }else{
            noti_input('lbl_descripcion_msj','* Ingrese la descripción del servicio.','error');
            alerta_mensaje('¡Ocurrió algo!','Ingrese un oferta correcta.','error');
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
        let t_nombre = $('#t_nombre').val();
        let t_f_inicio = $('#t_f_inicio').val();
        let t_f_fin = $('#t_f_fin').val();

        if(t_nombre==''){noti_input('lbl_nombre_msj','Ingrese un nombre de la oferta','error');return;}
        if(t_f_inicio==''){noti_input('lbl_f_inicio_msj','Ingrese la fecha inicio de la oferta','error');return;}
        if(t_f_fin==''){noti_input('lbl_f_fin_msj','Ingrese la fecha fin de la oferta','error');return;}

        if(t_nombre!='' || t_f_inicio!='' || t_f_fin!=''){
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>C_ofertas_cliente/registrar',
                data: {
                    't_nombre':t_nombre,
                    't_f_inicio':t_f_inicio,
                    't_f_fin':t_f_fin
                }, 
                beforeSend:function(){
                },   
                success: function(data){ 
                    if(data=='duplicado'){
                        noti_input('lbl_nombre_msj','* Ingrese otra descripción.','error');
                        alerta_mensaje('¡Ocurrió algo!','La descripción de la oferta ingresada ya existe.','error');
                        //alertify.error('La descripción ingresada no se encuentra disponible.');
                        // alertas('danger','');
                    }else{
                        table.ajax.reload(null,false);   
                        obtener_indicadores();       
                        noti_input('t_nombre','','');
                        noti_input('t_f_inicio','','');
                        noti_input('t_f_fin','','');

                        $('#t_nombre').val('');
                        $('#t_f_inicio').val('');
                        $('#t_f_fin').val('');

                        alerta_mensaje('¡Registro Correcto!','Oferta agregada correctamente.','success');

                        $('#text_total_navbar_servicio').text(data);
                    }
                }
            });
        }else{
            alerta_mensaje('¡Ocurrió algo!','Todo los campos son obligatorios.','error');
            //alertify.error('Ingrese una descripción correcta.');
            //alertas('danger','Ingrese una descripción');
        }

    }

    function listar(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_ofertas_cliente/listar',
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
                url: '<?php echo base_url();?>C_ofertas_cliente/eliminar',
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
                        obtener_indicadores();         
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
    
    function forDataTables2( id, ruta) {
        table2 = $(id).DataTable({
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