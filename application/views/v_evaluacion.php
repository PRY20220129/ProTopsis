<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Evaluación</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                                <li class="breadcrumb-item active">Evaluación</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div id="pnl_ofertas_cerradas">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header bg-soft-primary border-dark">
                                <h4 class="card-title"><i class="fas fa-suitcase"></i> Solicitudes Cerradas</h4>
                                <p class="card-title-desc"></p>
                            </div>
                            <div class="card-body">
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
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div>

            <div id="pnl_evaluacion" style="display:none;">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Evaluación de Oferta</h4>
                                <p class="card-title-desc">Realice los pasos siguientes para lograr establecer una recomendación TOPSIS.</p>
                            </div>
                            <div class="card-body">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                                <?php 
                                                    if($tipo_user!=15){
                                                        echo 'Paso #1: Establecer Criterios';
                                                    }else{
                                                        echo 'Paso #1: Criterios Establecidos';
                                                    }
                                                ?>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body text-muted">
                                                Teniendo en cuenta los requerimientos de la oferta, establecer los criterios necesarios para realizar la evaluación a los proveedores.
                                            </div>
                                            <div class="accordion-body text-muted">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <span>Requerimientos</span>
                                                        <div id="panel_lista_requerimientos">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <span>Agregar criterios</span>
                                                        <div class="row mt-2">
                                                            <div class="col-sm-3 col-lg-4">
                                                                <input class="form-control form-control-sm" type="text" id="txt_criterio" placeholder="Detalle Criterio">
                                                            </div>
                                                            <div class="col-sm-3 col-lg-4">
                                                                <input class="form-control form-control-sm" type="number" id="txt_porcentaje" placeholder="Porcentaje en decinal">
                                                            </div>
                                                            <div class="col-sm-3 col-lg-4">
                                                                <button class="btn btn-sm btn-secondary" onclick="agregar_criterio();">Agregar</button>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div id="panel_criterios">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingTwo">
                                            <button class="accordion-button fw-medium collapsed" onclick="armar_matriz_valor();" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                <?php 
                                                    if($tipo_user!=15){
                                                        echo 'Paso #2: Evaluaciòn de proveedores';
                                                    }else{
                                                        echo 'Paso #2: Proveedores evaluados';
                                                    }
                                                ?>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                            <div class="row mt-4 mb-4 text-center">
                                                <div class="col-lg-4 col-sm-6">
                                                </div>
                                                <div class="col-lg-4 col-sm-6">
                                                    <button class="btn btn-sm btn-secondary" onclick="armar_matriz_valor();"> <i class="fas fa-eye"></i> Volver a cargar Matriz Valor</button>
                                                </div>
                                            </div>
                                            <div id="tb_matriz_valores">
                                            </div>

                                            <div class="row mt-4 mb-4">
                                                <div style="margin-top:20px;"><button class="btn btn-sm btn-secondary" onclick="regresar_panel();"> <i class="fas fa-arrow-circle-left"></i> Regresar </button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingThree">
                                            <button class="accordion-button fw-medium collapsed" onclick="armar_matriz_step5();" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                
                                                <?php 
                                                    if($tipo_user!=15){
                                                        echo 'Paso #3: Ejecutar Evaluación de Ponderación Topsis';
                                                    }else{
                                                        echo 'Paso #3: Topsis Ejecutado';
                                                    }
                                                ?>
                                            
                                            </button>
                                        </h2>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                            <div class="row mt-4 mb-4 text-center">
                                                <div class="col-lg-4 col-sm-6">
                                                </div>
                                                <div class="col-lg-4 col-sm-6">
                                                    <button class="btn btn-sm btn-secondary" onclick="ejecutar_topsis();"> <i class="fas fa-eye"></i> Ejecutar Evaluación de Ponderación Topsis </button>
                                                </div>
                                            </div>

                                            <div id="tb_resultado">
                                            </div>

                                            <div class="row mt-4 mb-4">
                                                <div style="margin-top:20px;"><button class="btn btn-sm btn-secondary" onclick="regresar_panel();"> <i class="fas fa-arrow-circle-left"></i> Regresar </button></div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php 
                                        if($tipo_user==15){
                                    ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingFour">
                                            <button class="accordion-button fw-medium collapsed" onclick="cargar_datos_proveedor();" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                            Paso #4: Proveedor Seleccionado
                                            </button>
                                        </h2>
                                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                            <div id="tb_datos_proveedor">
                                            </div>

                                            <div class="row mt-4 mb-4">
                                                <div style="margin-top:20px;"><button class="btn btn-sm btn-secondary" onclick="regresar_panel();"> <i class="fas fa-arrow-circle-left"></i> Regresar </button></div>
                                            </div>
                                        </div>
                                    </div> 
                                    <?php 
                                        }
                                    ?>               

                                </div><!-- end accordion -->
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div>
                </div>            
            </div>

        </div>
    </div>
</div>

    <div class="modal fade" id="modal_editar_criterio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Actualizar Criterio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div style="align-items:center;">
                                    <label for="Descripcion" class="form-label">Criterio</label>
                                    <span class="form-label" id="lbl_criterio_msj_upd">  </span>
                                </div>
                                <input type="text" class="form-control" id="t_criterio_upd" placeholder="Criterio" required>
                            </div>
                            <div class="mb-3">
                                <div style="align-items:center;">
                                    <label for="Descripcion" class="form-label">Criterio</label>
                                    <span class="form-label" id="lbl_porcentaje_msj_upd">  </span>
                                </div>
                                <input type="number" class="form-control" id="t_porcentaje_upd" placeholder="Porcentaje" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger" onclick="actualizar_criterio();">Grabar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_certificados" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Certificados del proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="lst_certificados">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
    let id_oferta; 
    let id_criterio; 
    $(document).ready(function() {
        get_ofertas();
        id_criterio=0; 
        id_oferta=0; 
    });

    function aceptar_recomendacion(id_of,id_pro){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_evaluacion/aceptar_recomendacion',
            data: {
                'id_oferta':id_of,
                'id_proveedor':id_pro
            }, 
            beforeSend:function(){
            },   
            success: function(data){
                alerta_mensaje('¡Recomendación aceptada!','Se realizó la aprobación de la recomendación...','success');
            }
        });
    }


    function cargar_datos_proveedor(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_evaluacion/cargar_datos_proveedor',
            data: {
                'id_oferta':id_oferta
            }, 
            beforeSend:function(){
            },   
            success: function(data){
                $('#tb_datos_proveedor').html(data);
            }
        });
    }

    //enviar notificacion cliente
    function enviar_notificacion_cliente(id_oferta,id_proveedor,id){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_evaluacion/enviar_notificacion_cliente',
            data: {
                'id_oferta':id_oferta,
                'id_proveedor':id_proveedor,
                'id':id
            }, 
            beforeSend:function(){
            },   
            success: function(data){
                if(data=='error'){
                    alerta_mensaje('¡Ocurrió algo!','No se logrò enviar la recomendación, vuelva a intentarlo.','error');
                }else{
                    alerta_mensaje('¡Notificaciòn enviada!','Se enviò correctamente la recomendación.','success');
                    // armar_matriz_normalizada();
                    armar_matriz_step5();
                }
            }
        });
    }

    /* PROMISE */
    function ejecutar_topsis() { 

        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_evaluacion/validador',
            data: {
                'id_oferta':id_oferta
            }, 
            beforeSend:function(){
            },   
            success: function(data){
                if(data=='error_suma'){
                    alerta_mensaje('¡Ocurrió algo!','No puede ejecutar el Topsis. La suma de los pesos de los criterios no suman el 100%. Ir al Paso #1.','error');
                }else if(data=='error_recomendacion'){
                    alerta_mensaje('¡Ocurrió algo!','No puede ejecutar el Topsis. La solicitud de proyecto cuenta con una recomendación pendiente.','error');
                    armar_matriz_step5();
                }else{
                    armar_matriz_normalizada();
                }
            }
        });

        //armar_matriz_normalizada();
        let cadena='';
            cadena+='<div>';
            cadena+='    <div class="spinner-grow text-primary m-1" role="status">';
            cadena+='        <span class="sr-only">Loading...</span>';
            cadena+='    </div>';
            cadena+='    <div class="spinner-grow text-secondary m-1" role="status">';
            cadena+='        <span class="sr-only">Loading...</span>';
            cadena+='    </div>';
            cadena+='    <div class="spinner-grow text-success m-1" role="status">';
            cadena+='        <span class="sr-only">Loading...</span>';
            cadena+='    </div>';
            cadena+='    <div class="spinner-grow text-info m-1" role="status">';
            cadena+='        <span class="sr-only">Loading...</span>';
            cadena+='    </div>';
            cadena+='    <div class="spinner-grow text-warning m-1" role="status">';
            cadena+='        <span class="sr-only">Loading...</span>';
            cadena+='    </div>';
            cadena+='    <div class="spinner-grow text-danger m-1" role="status">';
            cadena+='        <span class="sr-only">Loading...</span>';
            cadena+='    </div>';
            cadena+='    <div class="spinner-grow text-dark m-1" role="status">';
            cadena+='        <span class="sr-only">Loading...</span>';
            cadena+='    </div>';
            cadena+='</div>';
        $('#tb_resultado').html(cadena);
    }

    /*
        GENERAR MATRICES
    */

    function armar_matriz_normalizada(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_evaluacion/armar_matriz_normalizada',
            data: {
                'id_oferta':id_oferta
            }, 
            beforeSend:function(){
            },   
            success: function(data){
                armar_matriz_normalizada_step2();
                //$('#tb_matriz_normalizada').html(data);
            }
        });
    }

    function armar_matriz_normalizada_step2(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_evaluacion/armar_matriz_normalizada_step2',
            data: {
                'id_oferta':id_oferta
            }, 
            beforeSend:function(){
            },   
            success: function(data){
                armar_matriz_step3();
                //$('#tb_matriz_normalizada_step2').html(data);
            }
        });
    }

    function armar_matriz_step3(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_evaluacion/armar_matriz_step3',
            data: {
                'id_oferta':id_oferta
            }, 
            beforeSend:function(){
            },   
            success: function(data){
                armar_matriz_step4();
                //$('#tb_matriz_step3').html(data);
            }
        });
    }

    function armar_matriz_step4(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_evaluacion/armar_matriz_step4',
            data: {
                'id_oferta':id_oferta
            }, 
            beforeSend:function(){
            },   
            success: function(data){
                armar_matriz_step5();
                //$('#tb_matriz_step4').html(data);
            }
        });
    }

    function armar_matriz_step5(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_evaluacion/armar_matriz_step5',
            data: {
                'id_oferta':id_oferta
            }, 
            beforeSend:function(){
            },   
            success: function(data){
                //$('#tb_matriz_step5').html(data);
                //setTimeout(() => {
                    $('#tb_resultado').html(data);
                //}, 6000);
            }
        });
    }


    /*
        ARMAR MATRIZ VALOR
    */
    function agregar_valor(id_proveedor,id_criterio){

        let select = '#select_'+id_proveedor+'_'+id_criterio;
        let valor = $(select).val();

        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_evaluacion/agregar_valor',
            data: {
                'id_proveedor':id_proveedor,
                'id_criterio':id_criterio,
                'id_oferta':id_oferta,
                'valor':valor
            }, 
            beforeSend:function(){
            },   
            success: function(data){
                if(data=='error'){
                    alertify.error('El proveedor ya se encuentra con el criterio evaluado.');
                }if(data=='error_completar'){
                    alerta_mensaje('¡Ocurrió Algo!','No puede realizar la clasificación de proveedores al no tener la suma de los pesos al 100%.','error');
                    $(select).val('');
                }else{
                    alertify.success('Se ingresó correctamente el valor.');
                    //armar_matriz_valor();
                }

                //listar_criterio();
            }
        });
    }

    function armar_matriz_valor(){
        let cadena='';
        cadena+='<div>';
        cadena+='    <div class="spinner-grow text-primary m-1" role="status">';
        cadena+='        <span class="sr-only">Loading...</span>';
        cadena+='    </div>';
        cadena+='    <div class="spinner-grow text-secondary m-1" role="status">';
        cadena+='        <span class="sr-only">Loading...</span>';
        cadena+='    </div>';
        cadena+='    <div class="spinner-grow text-success m-1" role="status">';
        cadena+='        <span class="sr-only">Loading...</span>';
        cadena+='    </div>';
        cadena+='    <div class="spinner-grow text-info m-1" role="status">';
        cadena+='        <span class="sr-only">Loading...</span>';
        cadena+='    </div>';
        cadena+='    <div class="spinner-grow text-warning m-1" role="status">';
        cadena+='        <span class="sr-only">Loading...</span>';
        cadena+='    </div>';
        cadena+='    <div class="spinner-grow text-danger m-1" role="status">';
        cadena+='        <span class="sr-only">Loading...</span>';
        cadena+='    </div>';
        cadena+='    <div class="spinner-grow text-dark m-1" role="status">';
        cadena+='        <span class="sr-only">Loading...</span>';
        cadena+='    </div>';
        cadena+='</div>';
        $('#tb_matriz_valores').html(cadena);
                
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_evaluacion/armar_matriz_valor',
            data: {
                'id_oferta':id_oferta
            }, 
            beforeSend:function(){
            },   
            success: function(data){
                $('#tb_matriz_valores').html(data);
            }
        });
    }

    /*
        REGISTRO DE CRITERIOS
    */

   function agregar_criterio(){
        let descripcion =  $('#txt_criterio').val();
        let porcentaje =  $('#txt_porcentaje').val();
        if(descripcion==''){
            alerta_mensaje('¡Ocurrió Algo!','Ingrese una descripción del criterio.','error');
            return; 
        }else{
            if(porcentaje<=0){
                alerta_mensaje('¡Ocurrió Algo!','Ingrese un porcentaje correcto.','error');
                return; 
            }

            if(porcentaje==''){
                alerta_mensaje('¡Ocurrió Algo!','Ingrese un porcentaje.','error');
                return; 
            }else{
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url();?>C_evaluacion/registrar_criterio',
                    data: {
                        'descripcion':descripcion,
                        'porcentaje':porcentaje,
                        'id_oferta':id_oferta
                    }, 
                    beforeSend:function(){
                    },   
                    success: function(data){ 
                            var json         = eval("(" + data + ")");
                            if(json.valida=='error_limite'){
                                alerta_mensaje('¡Ocurrió Algo!','El porcentaje ingresado supera el límite establecido.','error');
                            }else{
                                alerta_mensaje('¡Criterio registrado!','Criterio registrado correctamente.','success');
                                $('#txt_criterio').val('');
                                $('#txt_porcentaje').val('0');
                                ver_criteriosxservicio();
                            }
                            //$('#valida').html(json.panel_criterios);
                    }
                });
            }
        }

   }

   function ver_criteriosxservicio(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_evaluacion/ver_criteriosxservicio',
            data: {
                'id_oferta':id_oferta
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                var json         = eval("(" + data + ")");
                $('#panel_criterios').html(json.lst_criterios);
            }
        });
    }

    function abrir_editar_criterio(id){
        id_criterio = id; 
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_evaluacion/get_criterio',
            data: {
                'id':id
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                var json         = eval("(" + data + ")");
                $('#t_criterio_upd').val(json.criterio);
                $('#t_porcentaje_upd').val(json.porcentaje);
                $('#modal_editar_criterio').modal('show');
            }
        });
    }

    function eliminar_criterio(id){
        alertify.confirm("¿Està seguro de eliminar el criterio seleccionado?.",
        function(){
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>C_evaluacion/eliminar',
                data: {'id':id,'id_oferta':id_oferta}, 
                beforeSend:function(){
                },   
                success: function(data){
                    if(data=='error'){
                        alerta_mensaje('¡Ocurrió algo!','El criterio a eliminar, no pudo completarse la acción.','error');
                    }else{
                        alerta_mensaje('!Criterio eliminado¡!','El criterio seleccionado ha sido eliminado correctamente.','success');  
                        ver_criteriosxservicio();                      
                    }
                }
            });            
        },
        function(){
            alertify.error('Cancel');
        });        

    }


    function actualizar_criterio(){
        let descripcion =  $('#t_criterio_upd').val();
        let porcentaje =  $('#t_porcentaje_upd').val();
        if(descripcion==''){
            alerta_mensaje('¡Ocurrió Algo!','Ingrese una descripción del criterio.','error');
            return; 
        }else{
            if(porcentaje<=0){
                alerta_mensaje('¡Ocurrió Algo!','Ingrese un porcentaje correcto.','error');
                return; 
            }

            if(porcentaje==''){
                alerta_mensaje('¡Ocurrió Algo!','Ingrese un porcentaje.','error');
                return; 
            }else{
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url();?>C_evaluacion/actualizar_criterio',
                    data: {
                        'descripcion':descripcion,
                        'porcentaje':porcentaje,
                        'id_criterio':id_criterio,
                        'id_oferta':id_oferta,
                    }, 
                    beforeSend:function(){
                    },   
                    success: function(data){ 
                            var json         = eval("(" + data + ")");
                            if(json.valida=='error_limite'){
                                alerta_mensaje('¡Ocurrió Algo!','El porcentaje ingresado supera el límite establecido.','error');
                            }else{
                                alerta_mensaje('¡Criterio actualizado!','El registro se actualizó correctamente.','success');
                                $('#modal_editar_criterio').modal('hide');
                                ver_criteriosxservicio();
                            }
                            //$('#valida').html(json.panel_criterios);
                    }
                });
            }
        }

   }

    /*
    FIN CRITERIOS
   */





    function get_ofertas(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_evaluacion/get_ofertas',
            data: {
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                    var json         = eval("(" + data + ")");
                    $('#lst_ofertas_disponibles').html(json.lst_ofertas_disponibles);
                    $('#lst_ofertas_paginacion').html(json.lst_ofertas_paginacion);
                    $('#total_ofertas').text(' Ofertas ('+json.total_ofertas+')');
                    $('#resultado').text('  Resultado:  '+json.resultado+'');
                    $('#total_postulados').text('  Postulados('+json.total_postulacion+')');
            }
        });
    }
    
    function load_filtro_paginacion(pag){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_evaluacion/load_filtro_paginacion',
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

    //Load requerimientos
    function evaluar_oferta(id){

        //$('.accordion-collapse').addc
        $('#flush-collapseOne').removeClass('show');
        $('#flush-collapseTwo').removeClass('show');
        $('#flush-collapseThree').removeClass('show');
        //$('.accordion-button').attr('aria-expanded','false');

        id_oferta = id; 
        ver_requerimientos(id);
        ver_criteriosxservicio();
        
        $('#pnl_ofertas_cerradas').css('display','none');
        $('#pnl_evaluacion').css('display','block');
    }

    function regresar_panel(){
        $('#pnl_ofertas_cerradas').css('display','block');
        $('#pnl_evaluacion').css('display','none');
    }

    function ver_requerimientos(id){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_evaluacion/ver_requerimientos',
            data: {
                'id':id
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                    var json         = eval("(" + data + ")");
                    $('#panel_lista_requerimientos').html(json.lst_ofertas_requerimiento);
            }
        });
    }

    function abrir_modal_postulacion(id){
        id_oferta = id;
        $('#modal_postular').modal('show');
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
                xhr.open('post', '<?php echo base_url();?>C_evaluacion/registrar_postulacion', true);
                var data = new FormData;
                data.append('file', file);
                data.append('id_oferta', id_oferta);
                xhr.send(data);

                /*$.ajax({
                    type: "POST",
                    url: '<?php //echo base_url();?>C_evaluacion/registrar_postulacion',
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

    function load_certificador(id){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_evaluacion/ver_certificados',
            data: {
                'id':id
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                    var json         = eval("(" + data + ")");
                    $('#modal_certificados').modal('show');
                    $('#lst_certificados').html(json.lst_registros);
            }
            
        }); 
    }
</script>