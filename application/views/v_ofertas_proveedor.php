<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Ofertas</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                                <li class="breadcrumb-item active">Ofertas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#ofertas" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block" id="total_ofertas">Solicitudes de Proyecto (0)</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" onclick="get_postulacion();">
                                        <a class="nav-link" data-bs-toggle="tab" href="#proceso" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block" id="total_postulados">Postulados (0) </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#seleccionado" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Seleccionado (0)</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="ofertas" role="tabpanel">
                                        <div id="panel_ofertas">
                                            <div style="text-align:right;">
                                                <span id="resultado">Resultado:  </span>
                                            </div>
                                            <div class="px-3" data-simplebar style="max-height: 352px;">
                                                <table class="table align-middle table-nowrap table-borderless">
                                                    <tbody id="lst_ofertas_disponibles">
                                                    </tbody>
                                                </table>                                    
                                            </div>      
                                            <nav aria-label="...">
                                                <ul class="pagination pagination-sm mb-0" id="lst_ofertas_paginacion">                                                
                                                </ul>
                                                <!--
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">Next</a>
                                                    </li>
                                                -->
                                            </nav> 
                                        </div>
                                        <div id="lst_ofertas_requerimiento" style="display:none;">
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="proceso" role="tabpanel">
                                        <div id="panel_postulados">
                                            <div style="text-align:right;">
                                                <span id="resultado_postulados">Resultado:  </span>
                                            </div>
                                            <div class="px-3" data-simplebar style="max-height: 352px;">
                                                <table class="table align-middle table-nowrap table-borderless">
                                                    <tbody id="lst_ofertas_postulados_disponibles">
                                                    </tbody>
                                                </table>                                    
                                            </div>      
                                            <nav aria-label="...">
                                                <ul class="pagination pagination-sm mb-0" id="lst_ofertas_postulados_paginacion">                                                
                                                </ul>
                                                <!--
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">Next</a>
                                                    </li>
                                                -->
                                            </nav> 
                                        </div>
                                        <div id="lst_ofertas_postulados_requerimiento" style="display:none;">
                                        </div>                                    
                                    </div>
                                    <div class="tab-pane" id="seleccionado" role="tabpanel">
                                    </div>
                                </div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div><!-- end row -->

        </div>
    </div>
</div>

    <!--Modal Postulad-->
    <div class="modal fade" id="modal_postular" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Adjunte una Propuesta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <span>Adjunque una propuesta para la oferta seleccionada. </span>
                        </div>
                        <div class="col-md-12">
                            <div class="mt-3 mb-3">
                                <div style="align-items:center;">
                                    <label for="Descripcion" class="form-label">Adjunto</label>
                                    <span class="form-label" id="lbl_adjunto_msj">  </span>
                                </div> 
                                <input type="file" class="form-control form-control-sm" name="file" id="file">
                            </div>
                        </div>                                
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger" onclick="registrar_postulacion();">Postular</button>
                </div>
            </div>
        </div>
    </div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
    let id_oferta; 
    $(document).ready(function() {
        get_ofertas();
        id_oferta=0; 
    });

    function get_ofertas(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_ofertas_proveedor/get_ofertas',
            data: {
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                    var json         = eval("(" + data + ")");
                    $('#lst_ofertas_disponibles').html(json.lst_ofertas_disponibles);
                    $('#lst_ofertas_paginacion').html(json.lst_ofertas_paginacion);
                    $('#total_ofertas').text(' Solicitudes de Proyecto ('+json.total_ofertas+')');
                    $('#resultado').text('  Resultado:  '+json.resultado+'');
                    $('#total_postulados').text('  Postulados('+json.total_postulacion+')');
            }
        });
    }
    
    function load_filtro_paginacion(pag){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_ofertas_proveedor/load_filtro_paginacion',
            data: {
                'pag':pag
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                if(data=='si'){
                    get_ofertas();
                }
            }
        }); 
    }

    function ver_requerimientos(id){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_ofertas_proveedor/ver_requerimientos',
            data: {
                'id':id
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                    var json         = eval("(" + data + ")");
                    $('#lst_ofertas_requerimiento').html(json.lst_ofertas_requerimiento);
                    $('#lst_ofertas_requerimiento').css('display','block');
                    $('#panel_ofertas').css('display','none');
            }
        });
    }

    function regresar_panel(pnl){
        switch (pnl) {
            case 1:
                $('#panel_ofertas').css('display','block');
                $('#lst_ofertas_requerimiento').css('display','none');
                break;
            case 1:
                $('#panel_postulados').css('display','block');
                $('#lst_ofertas_postulados_requerimiento').css('display','none');
                break;                
            default:
                break;
        }
    }

    function abrir_modal_postulacion(id){
        id_oferta = id;
        $('#modal_postular').modal('show');
        $('#lbl_adjunto_msj').text('');
    }

    function registrar_postulacion(){
        var inputfile = document.getElementById('file');

        if(inputfile.files.length==0){
            //$('#modal_postular').modal('hide');
            noti_input('lbl_adjunto_msj',' * Seleccione un archivo.','error');
            alerta_mensaje('¡Ocurrió Algo!','No seleccionó un archivo.','error');
            return; 
        }else{
            noti_input('lbl_adjunto_msj',' *Correcto. ','success');
        }

        if(id_oferta!=''){

            $('#modal_postular').modal('hide');
            alertify.confirm("¿Está seguro de postular a la opción seleccionada?.",
            function(){

                var file      = inputfile.files[0];
                var xhr = new XMLHttpRequest();
                (xhr.upload || xhr).addEventListener('progress', function(e) {
                });
                xhr.addEventListener('load', function(e) {
                        var json         = eval("(" + this.responseText + ")");
                        if(json.valida=='error_vacio'){
                            alerta_mensaje('¡Ocurrió algo!','Ocurrió un problema al postular al registro seleccionado.','error');
                        }else if(json.valida=='error_usuario'){
                            alerta_mensaje('¡Ocurrió algo!','Ocurrió un problema al postular, vuelva a iniciar sesión.','error');
                        }else if(json.valida=='error_registro'){
                            alerta_mensaje('¡Ocurrió algo!','Ocurrió un problema al postular, vuelva a intentarlo.','error');
                        }else{
                            alerta_mensaje('!Gracias por postular¡!','Se registrò correctamente a la oferta seleccionada.','success');    
                            get_ofertas();                    
                        }           
                });
                xhr.addEventListener('error', function(e) {
                    alerta_mensaje('!Ocurriò un error¡!','Vuelva a intentarlo.','error');    
                });  
                xhr.addEventListener('abort', function(e) {
                    alerta_mensaje('!Ocurriò un error¡!','Vuelva a intentarlo.','error');    
                });     
                xhr.open('post', '<?php echo base_url();?>C_ofertas_proveedor/registrar_postulacion', true);
                var data = new FormData;
                data.append('file', file);
                data.append('id_oferta', id_oferta);
                xhr.send(data);

                /*$.ajax({
                    type: "POST",
                    url: '<?php //echo base_url();?>C_ofertas_proveedor/registrar_postulacion',
                    data: {'id_oferta':id_oferta}, 
                    beforeSend:function(){
                    },   
                    success: function(data){
                        if(data=='error_vacio'){
                            alerta_mensaje('¡Ocurrió algo!','Ocurrió un problema al postular al registro seleccionado.','error');
                        }else if(data=='error_usuario'){
                            alerta_mensaje('¡Ocurrió algo!','Ocurrió un problema al postular, vuelva a iniciar sesión.','error');
                        }else if(data=='error_registro'){
                            alerta_mensaje('¡Ocurrió algo!','Ocurrió un problema al postular, vuelva a intentarlo.','error');
                        }else{
                            alerta_mensaje('!Gracias por postular¡!','Se registrò correctamente a la oferta seleccionada.','success');    
                            get_ofertas();                    
                        }
                    }
                });*/          
            },
            function(){
                alerta_mensaje('¡Ocurrió Algo!','La postulación a la oferta ha sido cancelada.','warning');
            });

        }else{
            alerta_mensaje('¡Ocurrió Algo!','Seleccione el registro a postular.','error');
        }
    }

    /*---------------- POSTULACION  ----------------*/
    function get_postulacion(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_ofertas_proveedor/get_postulacion',
            data: {
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                    var json         = eval("(" + data + ")");
                    $('#lst_ofertas_postulados_disponibles').html(json.lst_ofertas_disponibles_postulacion);
                    $('#lst_ofertas_postulados_paginacion').html(json.lst_ofertas_paginacion_postulacion);
                    //$('#total_ofertas_postulados').text(' Ofertas ('+json.total_ofertas+')');
                    $('#resultado_postulados').text('  Resultado:  '+json.resultado+'');
                    $('#total_postulados').text('  Postulados('+json.total_postulacion+')');
            }
        });
    }

    function load_filtro_paginacion_postulados(pag){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_ofertas_proveedor/load_filtro_paginacion_postulados',
            data: {
                'pag':pag
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                if(data=='si'){
                    get_postulacion();
                }
            }
        }); 
    }

    function ver_requerimientos_postulados(id){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_ofertas_proveedor/ver_requerimientos_postulados',
            data: {
                'id':id
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                    var json         = eval("(" + data + ")");
                    $('#lst_ofertas_postulados_requerimiento').html(json.lst_ofertas_requerimiento);
                    $('#lst_ofertas_postulados_requerimiento').css('display','block');
                    $('#panel_postulados').css('display','none');
            }
        });
    }
</script>