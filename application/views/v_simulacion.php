<div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h5 class="mb-sm-0 font-size-18">Simulación</h5>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                                    <li class="breadcrumb-item active">Simulación</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-sm btn-primary" onclick="reiniciar();">Volver a iniciar</button>
                    </div>
                </div>


                <!--******************  PASO 1 *******************--->
                <!--******************  PASO 1 *******************--->
                <!--******************  PASO 1 *******************--->
                <div class="row mt-3">
                    <h5 style="color:blue;">Definición de Criterios</h5>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <label>Criterio</label>
                                <input class="form-control form-control-sm" type="text" id="txt_criterio">
                            </div>
                            <div class="col-lg-1">
                                <label>Peso</label>
                                <input class="form-control form-control-sm" type="text" id="txt_peso">
                            </div>
                            <div class="col-lg-4 mt-4">
                                <button class="btn btn-sm btn-danger" onclick="agregar_criterio();">Agregar</button>
                            </div>
                        </div>                                 
                    </div>


                    <div class="col-12 mt-3">
                        <label>Lista de Criterios</label>
                        <table class="">
                            <tbody id="tb_criterio">
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--******************  FIN PASO 1****************--->
                <!--******************  FIN PASO 1****************--->
                <!--******************  FIN PASO 1****************--->



                <!--******************  PASO 2 *******************--->
                <!--******************  PASO 2 *******************--->
                <!--******************  PASO 2 *******************--->
                <div class="row mt-3">
                    <h5 style="color:blue;">Proveedores</h5>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <label>Proveedor</label>
                                <input class="form-control form-control-sm" type="text" id="txt_proveedor">
                            </div>
                            <div class="col-lg-4 mt-4">
                                <button class="btn btn-sm btn-danger" onclick="agregar_proveedor();">Agregar</button>
                            </div>
                        </div>                                 
                    </div>

                    <div class="col-12 mt-3">
                        <label>Lista de Proveedores</label>
                        <table class="">
                            <tbody id="tb_proveedor">
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--******************  FIN PASO 2****************--->
                <!--******************  FIN PASO 2****************--->
                <!--******************  FIN PASO 2****************--->


                <!--******************  PASO 3 *******************--->
                <!--******************  PASO 3 *******************--->
                <!--******************  PASO 3 *******************--->
                <div class="row mt-3">
                    <h5 style="color:blue;">Establecer Matriz de Valores</h5>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <label>Proveedor</label>
                                <select class="form-control form-control-sm" id="select_proveedor">
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label>Criterio</label>
                                <select class="form-control form-control-sm" id="select_criterio">
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                            <div class="col-lg-1">
                                <label>Valor</label>
                                <input class="form-control form-control-sm" type="text" id="txt_valor">
                            </div>
                            <div class="col-lg-1 mt-4">
                                <button class="btn btn-sm btn-danger" onclick="agregar_valor();">Agregar</button>
                            </div>
                        </div>                                 
                    </div>

                    <div class="col-12 mt-3">
                        <label>Matriz de valores</label>
                        <div id="tb_matriz_valores">
                        </div>

                    </div>
                </div>
                <!--******************  FIN PASO 3****************--->
                <!--******************  FIN PASO 3****************--->
                <!--******************  FIN PASO 3****************--->           
                
                
                <!--******************  PASO 4 *******************--->
                <!--******************  PASO 4 *******************--->
                <!--******************  PASO 4 *******************--->
                <div class="row mt-3">
                    <h5 style="color:red;">Step-1: Calculate Normalised Matrix</h5>
                    <div class="col-12 mt-3">
                        <button class="btn btn-sm btn-danger" onclick="armar_matriz_normalizada();"> Calcular</button><br>
                        <div id="tb_matriz_normalizada" class="mt-3">
                        </div>

                    </div>
                </div>
                <!--******************  FIN PASO 4****************--->
                <!--******************  FIN PASO 4****************--->
                <!--******************  FIN PASO 4****************--->       
                



                
                <!--******************  PASO 5 *******************--->
                <!--******************  PASO 5 *******************--->
                <!--******************  PASO 5 *******************--->
                <div class="row mt-3">
                    <h5 style="color:red;">Step-2: Calculate weighted Normalised Matrix</h5>
                    <div class="col-12 mt-3">
                        <button class="btn btn-sm btn-danger" onclick="armar_matriz_normalizada_step2();"> Calcular</button><br>
                        <div id="tb_matriz_normalizada_step2" class="mt-3">
                        </div>

                    </div>
                </div>
                <!--******************  FIN PASO 5****************--->
                <!--******************  FIN PASO 5****************--->
                <!--******************  FIN PASO 5****************--->     
                

                <!--******************  PASO 6 *******************--->
                <!--******************  PASO 6 *******************--->
                <!--******************  PASO 6 *******************--->
                <div class="row mt-3">
                    <h5 style="color:red;">Step-3: Calculate the ideal best and ideal worst value</h5>
                    <div class="col-12 mt-3">
                        <button class="btn btn-sm btn-danger" onclick="armar_matriz_step3();"> Calcular</button><br>
                        <div id="tb_matriz_step3" class="mt-3">
                        </div>

                    </div>
                </div>
                <!--******************  FIN PASO 6****************--->
                <!--******************  FIN PASO 6****************--->
                <!--******************  FIN PASO 6****************--->                  


                <!--******************  PASO 7 *******************--->
                <!--******************  PASO 7 *******************--->
                <!--******************  PASO 7 *******************--->
                <div class="row mt-3">
                    <h5 style="color:red;">Step-4: Calculate the Euclidean distance from the ideal worst</h5>
                    <div class="col-12 mt-3">
                        <button class="btn btn-sm btn-danger" onclick="armar_matriz_step4();"> Calcular</button><br>
                        <div id="tb_matriz_step4" class="mt-3">
                        </div>

                    </div>
                </div>
                <!--******************  FIN PASO 7****************--->
                <!--******************  FIN PASO 7****************--->
                <!--******************  FIN PASO 7****************--->    
                
                
                <!--******************  PASO 8 *******************--->
                <!--******************  PASO 78 *******************--->
                <!--******************  PASO 8 *******************--->
                <div class="row mt-3">
                    <h5 style="color:red;">Step-5: Calculate Performance Score</h5>
                    <div class="col-12 mt-3">
                        <button class="btn btn-sm btn-danger" onclick="armar_matriz_step5();"> Calcular</button><br>
                        <div id="tb_matriz_step5" class="mt-3">
                        </div>

                    </div>
                </div>
                <!--******************  FIN PASO 8****************--->
                <!--******************  FIN PASO 8****************--->
                <!--******************  FIN PASO 8****************--->                   
            </div>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            listar_criterio();
            listar_proveedor();
            armar_matriz_valor();
        });

        
        function agregar_criterio(){
            if($('#txt_criterio').val()==''){alertify.error('Ingrese un criterio correcto.');return;}
            if($('#txt_peso').val()==''){alertify.error('Establesca el peso correcto.');return;}
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>C_simulacion/agregar_criterio',
                data: {
                    'peso':$('#txt_peso').val(),
                    'criterio':$('#txt_criterio').val()
                }, 
                beforeSend:function(){
                },   
                success: function(data){
                    alertify.success('Se ingresó correctamente el criterio.');
                    listar_criterio();
                }
            });
        }

        function listar_criterio(){
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: '<?php echo base_url();?>C_simulacion/listar_criterio',
                data: {
                }, 
                beforeSend:function(){
                },   
                success: function(data){
                    let cadena=''; 
                    let cadena_s='<option value="">Seleccione</option>'; 
                    let total=0; 
                    if(data!='error'){
                        for (let index = 0; index < data.length; index++) {
                            cadena+='<tr><td>'+data[index]['criterio']+' -> </td><td>'+data[index]['peso']+'</td></tr>'; 
                            cadena_s+='<option value="'+data[index]['id']+'">'+data[index]['criterio']+'</option>'; 
                            total += parseFloat(data[index]['peso']);
                        }
                    }
                    cadena+='<tr><td>Total</td><td>'+total+'</td></tr>';
                    $('#tb_criterio').html(cadena);
                    $('#select_criterio').html(cadena_s);
                }
            });
        }


        function agregar_proveedor(){
            if($('#txt_proveedor').val()==''){alertify.error('Ingrese un proveedor correcto.');return;}
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>C_simulacion/agregar_proveedor',
                data: {
                    'proveedor':$('#txt_proveedor').val()
                }, 
                beforeSend:function(){
                },   
                success: function(data){
                    alertify.success('Se ingresó correctamente el proveedor.');
                    listar_proveedor();
                }
            });
        }

        function listar_proveedor(){
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: '<?php echo base_url();?>C_simulacion/listar_proveedor',
                data: {
                }, 
                beforeSend:function(){
                },   
                success: function(data){
                    if(data!='error'){
                        let cadena=''; 
                        let cadena_s='<option value="">Seleccione</option>'; 
                        for (let index = 0; index < data.length; index++) {
                            cadena_s+='<option value="'+data[index]['id']+'">'+data[index]['proveedor']+'</option>'; 
                            cadena+='<tr><td>'+data[index]['proveedor']+'</td></tr>'; 
                        }
                        $('#tb_proveedor').html(cadena);
                        $('#select_proveedor').html(cadena_s);
                    }

                }
            });
        }


        function agregar_valor(){

            if($('#select_proveedor').val()==''){alertify.error('Seleccione un proveedor.');return;}
            if($('#select_criterio').val()==''){alertify.error('Seleccione un criterio de evaluación.');return;}
            if($('#txt_valor').val()==''){alertify.error('Ingrese un valor correo.');return;}

            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>C_simulacion/agregar_valor',
                data: {
                    'id_proveedor':$('#select_proveedor').val(),
                    'id_criterio':$('#select_criterio').val(),
                    'valor':$('#txt_valor').val()
                }, 
                beforeSend:function(){
                },   
                success: function(data){
                    if(data=='error'){
                        alertify.error('El proveedor ya se encuentra con el criterio evaluado.');
                    }else{
                        alertify.success('Se ingresó correctamente el valor.');
                        armar_matriz_valor();
                    }

                    //listar_criterio();
                }
            });
        }

        function armar_matriz_valor(){
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>C_simulacion/armar_matriz_valor',
                data: {
                }, 
                beforeSend:function(){
                },   
                success: function(data){
                    $('#tb_matriz_valores').html(data);
                }
            });
        }

        function armar_matriz_normalizada(){
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>C_simulacion/armar_matriz_normalizada',
                data: {
                }, 
                beforeSend:function(){
                },   
                success: function(data){
                    $('#tb_matriz_normalizada').html(data);
                }
            });
        }

        function armar_matriz_normalizada_step2(){
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>C_simulacion/armar_matriz_normalizada_step2',
                data: {
                }, 
                beforeSend:function(){
                },   
                success: function(data){
                    $('#tb_matriz_normalizada_step2').html(data);
                }
            });
        }

        function armar_matriz_step3(){
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>C_simulacion/armar_matriz_step3',
                data: {
                }, 
                beforeSend:function(){
                },   
                success: function(data){
                    $('#tb_matriz_step3').html(data);
                }
            });
        }

        function armar_matriz_step4(){
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>C_simulacion/armar_matriz_step4',
                data: {
                }, 
                beforeSend:function(){
                },   
                success: function(data){
                    $('#tb_matriz_step4').html(data);
                }
            });
        }

        function armar_matriz_step5(){
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>C_simulacion/armar_matriz_step5',
                data: {
                }, 
                beforeSend:function(){
                },   
                success: function(data){
                    $('#tb_matriz_step5').html(data);
                }
            });
        }

        function reiniciar(){
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>C_simulacion/reiniciar',
                data: {
                }, 
                beforeSend:function(){
                },   
                success: function(data){
                    $('#tb_matriz_step5').html('');
                    $('#tb_matriz_step4').html('');
                    $('#tb_matriz_step3').html('');
                    $('#tb_matriz_normalizada_step2').html('');
                    $('#tb_matriz_normalizada').html('');
                    $('#tb_matriz_valores').html('');
                    $('#tb_criterio').html('');
                    $('#tb_proveedor').html('');
                    alertify.success('Se reestableciò los valores.');
                }
            });
        }


        
    </script>

