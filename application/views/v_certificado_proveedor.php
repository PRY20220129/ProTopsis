<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Mis Certificados</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                                <li class="breadcrumb-item active">Certificados</li>
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
                <div class="col-xl-4">
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
                                        <input type="text" class="form-control form-control-sm" id="text_descripcion" placeholder="Ingrese nuevo servicio" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div style="align-items:center;">
                                            <label for="Descripcion" class="form-label">Adjunto</label>
                                            <span class="form-label" id="lbl_adjunto_msj">  </span>
                                        </div> 
                                        <input type="file" class="form-control form-control-sm" name="file" id="file">
                                    </div>
                                </div>                                

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <button style="margin-top:10px;" class="btn btn-sm btn-danger form-control" onclick="registrar_con_doc();">Agregar</button>
                                    </div>
                                </div>                            
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <button style="margin-top:0px;" class="btn btn-sm btn-danger form-control" onclick="grabar_todos();">Grabar todos</button>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header bg-soft-primary border-dark">                             
                            <h4 class="card-title">Certificados</h4>
                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body">
                            <!--<table id="tb_table" class="table table-bordered dt-responsive nowrap w-100">-->
                            <table id="tb_table" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Nro</th>
                                        <th>Certificado</th>
                                        <th>Archivo</th>
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
                                    <span class="form-label" id="lbl_descripcion_msj_upd">  </span>
                                </div>
                                <input type="text" class="form-control" id="text_descripcion_upd" placeholder="Tipo de servicio" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
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
                    <h5 class="modal-title" id="text_descripcion_titulo">Servicios</h5>
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
        forDataTables('#tb_table','C_certificado/listar_registros'); 
        //table.buttons().container().appendTo('#tb_table_wrapper .col-md-6:eq(0)');
    });

    function grabar_todos(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_certificado/obtener_resumen',
            data: {
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                $('#text_descripcion_titulo').text('Certificados Proveedor');
                $('#img_modal').attr('src','public/images/iconos/certificado.png');
                $('#txt_descripcion_detalle').text('Total de certificados registrados: ');
                $('#txt_descripcion_total').text(data);
                $('#mdl_resumen').modal('show');
            }
        });
    }

    function editar(id){
        id_upd=id; 

        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_certificado/obtener_datos',
            data: {
                'id':id
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                if(data=='noexiste'){
                    noti_input('lbl_descripcion_msj_upd',' * Descripciòn no encontrada.','error');
                    alerta_mensaje('¡Ocurrió Algo!','El certificado seleccionado no existe.','error');
                    alertify.error('La descripción no existe.');
                    //alertas('danger','La descripción no existe');
                }else{
                    var json         = eval("(" + data + ")");
                    $('#text_descripcion_upd').val($.trim(json.descripcion));
                    $('#modal_editar').modal('show');
                }
            }
        });

        
    }

    function actualizar(){
        let des = $('#text_descripcion_upd').val();
        if(des!=''){
            $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_certificado/actualizar',
            data: {
                'des':des,
                'id' :id_upd
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                if(data=='duplicado'){
                    alertify.error('La descripción ingresada no se encuentra disponible.');
                    //alertas('danger','La descripción ingresada ya se encuentra registrada');
                }else{
                    //table.ajax.reload(null,false); 
                    table.ajax.reload(null,false);                        
                    //alertify.success('La descripción ha sido actualizada correctamente.');

                    noti_input('lbl_descripcion_msj_upd','','');
                    alerta_mensaje('¡Actualización correcta!','La descripción se actualizó correctamente.','success');

                    //alertas('success','La descripción ha sido actualizada correctamente');
                    $('#text_descripcion_upd').val('');
                    $('#modal_editar').modal('hide');
                }
            }
            });
        }else{
                noti_input('lbl_descripcion_msj_upd',' * Ingrese una descripción obligatoria.','error');
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


    function registrar_con_doc(){
            var inputfile = document.getElementById('file');
            let des = $('#text_descripcion').val();

            if(des==''){
                noti_input('lbl_descripcion_msj',' * Ingrese una descripción.','error');
                alerta_mensaje('¡Ocurrió Algo!','Ingrese una descripción del certificado.','error');
                return; 
            }else{
                noti_input('lbl_descripcion_msj',' *Correcto. ','success');
            }

            if(inputfile.files.length==0){
                noti_input('lbl_adjunto_msj',' * Seleccione un archivo.','error');
                alerta_mensaje('¡Ocurrió Algo!','No seleccionó un archivo.','error');
                return; 
            }else{
                noti_input('lbl_adjunto_msj',' *Correcto. ','success');
            }
            
            var file      = inputfile.files[0];
            var xhr = new XMLHttpRequest();
            (xhr.upload || xhr).addEventListener('progress', function(e) {
                //var done = e.position || e.loaded;
                //var total = e.totalSize || e.total;
                //var carg = Math.round(done/total*100);
                //$("#progressBar_img").val(carg);
                //$('#loaded_n_total_img').text(carg + ' % ');
            });

            xhr.addEventListener('load', function(e) {
                    var json         = eval("(" + this.responseText + ")");
                    if($.trim(json.valida)=='extension'){            
                        noti_input('lbl_adjunto_msj',' * Formato Incorrecto','error');
                        alerta_mensaje('¡Vuelva a intentarlo!','El formato de los archivos admitidos: PDF, DOC, DOCX..','error');
                    }else if($.trim(json.valida)=='no'){            
                        //alertify.success('error','Hubo un error, vuelva a intentarlo.');
                        noti_input('lbl_adjunto_msj','','');
                        noti_input('lbl_descripcion_msj','','');
                        $('#file').val('');
                        alerta_mensaje('¡Vuelva a intentarlo!','Tuvimos un inconveniente, vuelve a intentarlo.','error');
                    }else{
                        //table.ajax.reload(null,false); 
                        table.ajax.reload(null,false);          
                        alertify.success('Registro realizado.');
                        $('#text_total_navbar_certificado').text(json.total);
                        
                        noti_input('lbl_adjunto_msj','','');
                        noti_input('lbl_descripcion_msj','','');
                        alerta_mensaje('¡Certificado correcto!','Certificado agregado correctamente.','success');

                        //alertas('success','La descripción ingresada ha sido registrada correctamente');
                        $('#text_descripcion').val('');
                    }
            });
            xhr.addEventListener('error', function(e) {
                alertify.error('error','Ocurrio un error, vuelva a intentarlo','Error');
            });  
            
            xhr.addEventListener('abort', function(e) {
                alertify.error('error','Ocurrio un error, vuelva a intentarlo','Error');
            });     
            xhr.open('post', '<?php echo base_url();?>C_certificado/registrar_doc', true);
            
            var data = new FormData;
            data.append('file', file);
            data.append('des', des);
            xhr.send(data);
    }

    function registrar(){
        let des = $('#text_descripcion').val();

        if(des!=''){
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>C_certificado/registrar',
                data: {'des':des}, 
                beforeSend:function(){
                },   
                success: function(data){ 
                    if(data=='duplicado'){
                        alertify.error('La descripción ingresada no se encuentra disponible.');
                        // alertas('danger','');
                    }else{
                        //table.ajax.reload(null,false); 
                        table.ajax.reload(null,false);          
                        alertify.success('Registro realizado.');
                        $('#text_total_navbar_certificado').text(data);
                        //alertas('success','La descripción ingresada ha sido registrada correctamente');
                        $('#text_descripcion').val('');
                    }
                }
            });
        }else{
            alertify.error('Ingrese una descripción correcta.');
            //alertas('danger','Ingrese una descripción');
        }

    }

    function listar(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_certificado/listar',
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
                url: '<?php echo base_url();?>C_certificado/eliminar',
                data: {'id':id}, 
                beforeSend:function(){
                },   
                success: function(data){
                    if(data=='error'){
                        //alertify.error('No se pudo eliminar la descripción.');
                        alerta_mensaje('¡Ocurrió algo!','El certificado a eliminar, no pudo completarse la acción.','error');
                        //alertas('danger','Hubo un error, no se pudo eliminar la descripción seleccionada.');
                    }else{
                        //table.ajax.reload(null,false); 
                        table.ajax.reload(null,false);
                        alerta_mensaje('!Certificado eliminado¡!','El certificado seleccionado ha sido eliminado correctamente.','error');                        
                        //alertify.success('El certificado seleccionado ha sido eliminado.');
                        $('#text_total_navbar_certificado').text(data);
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