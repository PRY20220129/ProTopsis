<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Usuarios</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                                <li class="breadcrumb-item active">Usuarios</li>
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
                        <div class="card-header">
                            <h4 class="card-title">Registrar</h4>
                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="">Nombres</label>
                                        <input type="text" class="form-control form-control-sm" id="n_nombres" placeholder="Nombres completos" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="">Apellidos</label>
                                        <input type="text" class="form-control form-control-sm" id="n_apellidos" placeholder="Apellidos completos" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="">DNI</label>
                                        <input type="text" class="form-control form-control-sm" id="n_dni" placeholder="Número de documento" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="">Correo</label>
                                        <input type="text" class="form-control form-control-sm" id="n_correo" placeholder="Correo electrónico" required>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="">Celular</label>
                                        <input type="text" class="form-control form-control-sm" id="n_celular" placeholder="Número de celular" required>
                                    </div>
                                </div>                                                                                                                                                                
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="">Usuario</label>
                                        <input type="text" class="form-control form-control-sm" id="n_usuario" placeholder="Usuario" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="">Clave</label>
                                        <input type="password" class="form-control form-control-sm" id="n_clave" placeholder="Clave de acceso" required>
                                    </div>
                                </div>                                
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <button style="margin-top:28px;" class="btn btn-sm btn-danger form-control" onclick="registrar();">Agregar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Lista de registros</h4>
                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body">
                            <!--<table id="tb_table" class="table table-bordered dt-responsive nowrap w-100">-->
                            <table id="tb_table" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Nro</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>DNI</th>
                                        <th>Usuario</th>
                                        <th>Estado</th>
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
                    <div class="col-md-12">
                        <div class="mb-1">
                            <label class="form-label" for="">Nombres</label>
                            <input type="text" class="form-control form-control-sm" id="n_nombres_upd" placeholder="Nombres completos" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-1">
                            <label class="form-label" for="">Apellidos</label>
                            <input type="text" class="form-control form-control-sm" id="n_apellidos_upd" placeholder="Apellidos completos" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-1">
                            <label class="form-label" for="">DNI</label>
                            <input type="text" class="form-control form-control-sm" id="n_dni_upd" placeholder="Número de documento" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-1">
                            <label class="form-label" for="">Correo</label>
                            <input type="text" class="form-control form-control-sm" id="n_correo_upd" placeholder="Correo electrónico" required>
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="mb-1">
                            <label class="form-label" for="">Celular</label>
                            <input type="text" class="form-control form-control-sm" id="n_celular_upd" placeholder="Número de celular" required>
                        </div>
                    </div>                                                                                                                                                                
                    <div class="col-md-12">
                        <div class="mb-1">
                            <label class="form-label" for="">Usuario</label>
                            <input type="text" class="form-control form-control-sm" id="n_usuario_upd" disabled placeholder="Usuario" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-1">
                            <label class="form-label" for="">Clave</label>
                            <input type="password" class="form-control form-control-sm" id="n_clave_upd" placeholder="Clave de acceso" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-1">
                            <label class="form-label" for="">Activación de usuario</label>
                            <select class="form-control form-control-sm" id="n_estado_upd">
                                <option value="">Seleccione</option>
                                <option value="1">Activar</option>
                                <option value="0">Desactivar</option>
                            </select>
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
        forDataTables('#tb_table','C_usuarios_cliente/listar_registros'); 
        //table.buttons().container().appendTo('#tb_table_wrapper .col-md-6:eq(0)');
    });

    /************USO DE SISTEMA************/
    function registrar(){
        let n_nombres = $('#n_nombres').val();
        let n_apellidos = $('#n_apellidos').val();
        let n_dni = $('#n_dni').val();
        let n_correo = $('#n_correo').val();
        let n_celular = $('#n_celular').val();
        let n_usuario = $('#n_usuario').val();
        let n_clave = $('#n_clave').val();

        if(n_nombres!='' || n_apellidos!='' || n_dni!='' || n_correo!='' || n_celular!='' || n_celular!='' || n_usuario!='' ||  n_clave!='' ){
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>C_usuarios_cliente/registrar',
                data: {
                    'n_nombres':n_nombres,
                    'n_apellidos':n_apellidos,
                    'n_dni':n_dni,
                    'n_correo':n_correo,
                    'n_celular':n_celular,
                    'n_usuario':n_usuario,
                    'n_clave':n_clave
                }, 
                beforeSend:function(){
                },   
                success: function(data){ 
                    if(data=='dni_registrado'){
                        alertify.error('El DNI ingresado no se encuentra disponible.');
                        // alertas('danger','');
                    }if(data=='user_no_disponible'){
                        alertify.error('El usuario ingresado no se encuentra disponible.');
                        // alertas('danger','');
                    }else{
                        //table.ajax.reload(null,false); 
                        table.ajax.reload(null,false);          
                        alertify.success('Registro realizado.');
                        $('#text_total_navbar_servicio').text(data);
                        //alertas('success','La descripción ingresada ha sido registrada correctamente');
                        $('#text_descripcion').val('');
                    }
                }
            });
        }else{
            alertify.error('Todo los campos son obligatorios.');
            //alertas('danger','Ingrese una descripción');
        }

    }
    /*************************************/





    function grabar_todos(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_usuarios_cliente/obtener_resumen',
            data: {
            }, 
            beforeSend:function(){
            },   
            success: function(data){ 
                $('#text_descripcion_titulo').text('Servicios TI');
                $('#img_modal').attr('src','public/images/iconos/servicios2.png');
                $('#txt_descripcion_detalle').text('Total de servicios registrados: ');
                $('#txt_descripcion_total').text(data);
                $('#mdl_resumen').modal('show');
            }
        });
    }

    function editar(id){
        id_upd=id; 

        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_usuarios_cliente/obtener_datos',
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
                    $('#n_nombres_upd').val($.trim(json.nombres));
                    $('#n_apellidos_upd').val($.trim(json.apellidos));
                    $('#n_dni_upd').val($.trim(json.dni));
                    $('#n_correo_upd').val($.trim(json.correo));
                    $('#n_celular_upd').val($.trim(json.telefono));
                    $('#n_usuario_upd').val($.trim(json.usuario));
                    $('#n_estado_upd').val($.trim(json.estado));
                    $('#n_clave_upd').val();
                }
            }
        });
        $('#modal_editar').modal('show');
    }

    function actualizar(){
        let n_nombres = $('#n_nombres_upd').val();
        let n_apellidos = $('#n_apellidos_upd').val();
        let n_dni = $('#n_dni_upd').val();
        let n_correo = $('#n_correo_upd').val();
        let n_celular = $('#n_celular_upd').val();
        let n_usuario = $('#n_usuario_upd').val();
        let n_clave = $('#n_clave_upd').val();
        let n_estado = $('#n_estado_upd').val();

        if(n_nombres!='' || n_apellidos!='' || n_dni!='' || n_correo!='' || n_celular!='' || n_celular!='' || n_usuario!='' ||  n_clave!='' ||  n_estado!=''){
                $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>C_usuarios_cliente/actualizar',
                data: {
                    'n_nombres':n_nombres,
                    'n_apellidos':n_apellidos,
                    'n_dni':n_dni,
                    'n_correo':n_correo,
                    'n_celular':n_celular,
                    'n_usuario':n_usuario,
                    'n_clave':n_clave,
                    'n_estado':n_estado,
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
                        alertify.success('Actualización realizada correctamente.');
                        //alertas('success','La descripción ha sido actualizada correctamente');
                        //$('#text_descripcion').val('');
                        $('#modal_editar').modal('hide');
                    }
                }
                });
        }else{
                alertify.error('Todo los campos son obligatorios.');
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



    function listar(){
        $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>C_usuarios_cliente/listar',
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
                url: '<?php echo base_url();?>C_usuarios_cliente/eliminar',
                data: {'id':id}, 
                beforeSend:function(){
                },   
                success: function(data){
                    if(data=='error'){
                        alertify.error('No se pudo eliminar la descripción.');
                        //alertas('danger','Hubo un error, no se pudo eliminar la descripción seleccionada.');
                    }else{
                        //table.ajax.reload(null,false); 
                        table.ajax.reload(null,false);                        
                        alertify.success('La descripción seleccionada ha sido eliminada.');
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