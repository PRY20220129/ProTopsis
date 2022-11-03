<meta charset="utf-8"/>
<title>.::Registro Proveedor TOPSIS::.</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
<meta content="Themesbrand" name="author"/>
<!-- App favicon -->
<link rel="shortcut icon" href="public/images/favicon.ico">

<!-- preloader css -->
<link rel="stylesheet" href="public/css/preloader.min.css" type="text/css" />

<link href="<?php echo base_url();?>public/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- Bootstrap Css -->
<link href="public/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="public/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="public/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<!-- alertifyjs Css -->
<link href="<?php echo base_url();?>public/libs/alertifyjs/build/css/alertify.min.css" rel="stylesheet" type="text/css" />
<!-- alertifyjs default themes  Css -->
<link href="<?php echo base_url();?>public/libs/alertifyjs/build/css/themes/default.min.css" rel="stylesheet" type="text/css" />

<div class="auth-page">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-5">
                <div class="auth-full-page-content d-flex p-sm-5 p-4">
                    <div class="w-100">
                        <div class="d-flex flex-column h-100">
                            <div class="mb-4 mb-md-2 text-center">
                                <a href="<?php echo base_url();?>" class="d-block auth-logo">
                                    <img src="public/images/topsis.png" alt="" height="35"> <span class="logo-txt"></span>
                                </a>
                            </div>
                            <div class="auth-content my-auto">
                                <div class="text-center">
                                    <h5 class="mb-0">Registrar Cuenta</h5>
                                    <p class="text-muted mt-2">Obtenga su cuenta TopSisConsulting gratis ahora.</p>
                                </div>
                                    <!--<div class="mb-3 <?php //echo (!empty($useremail_err)) ? 'has-error' : ''; ?>">
                                        <label for="useremail" class="form-label">Email</label>
                                        <input type="email" class="form-control form-control-sm" id="useremail" placeholder="Ingrese correo electr" required name="useremail" value="<?php echo $useremail; ?>">
                                        <span class="text-danger"><?php //echo $useremail_err; ?></span>
                                    </div>-->

                                    <div class="mb-3">
                                        <div style="align-items:center;">
                                            <label for="useremail" class="form-label">RUC</label>
                                            <img id="img_mensaje_ruc" src="">
                                            <span class="form-label" id="lbl_mensaje_ruc">  </span>
                                        </div>
                                        <div style="display:flex;">
                                            <input type="email" class="form-control form-control-sm" id="add_ruc" placeholder="Ingrese RUC" required name="useremail" value="">
                                            <button style="margin-left:5px;" class="btn btn-danger btn-sm" onclick="validar_sunat();" type="button"> Validar</button>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div style="align-items:center;">
                                            <label for="razonsocial" class="form-label">Razón Social</label>
                                            <span class="form-label" id="lbl_mensaje_razon_social">  </span>
                                        </div>                                        
                                        <input type="text" class="form-control form-control-sm" disabled id="add_razon_social" placeholder="Razón social" required name="useremail" value="">
                                    </div>                                    

                                    <div class="mb-3" style="display:none;">
                                        <label for="username" class="form-label">Usuario</label>
                                        <input type="text" class="form-control form-control-sm" id="add_usuario" placeholder="Ingrese un usuario" required name="username" value="">
                                    </div>

                                    <div class="mb-3">
                                        <div style="align-items:center;">
                                            <label for="userpassword" class="form-label">Contraseña</label>
                                            <span class="form-label" id="lbl_mensaje_clave">  </span>
                                        </div>
                                        <input type="password" class="form-control form-control-sm" id="add_clave" placeholder="Ingrese una contraseña" required name="password" value="">
                                    </div>

                                    <div class="mb-3">
                                        <div style="align-items:center;">
                                            <label for="userpassword" class="form-label">Confirmar Contraseña</label>
                                            <span class="form-label" id="lbl_mensaje_clave2">  </span>
                                        </div>
                                        <input type="password" class="form-control form-control-sm" id="add_clave2" placeholder="Confirma contraseña" name="confirm_password" value="">
                                    </div>
                                    
                                    <div class="mb-4">
                                        <p class="mb-0">Al registrarte aceptas los <a href="javascript::void(0)" class="text-primary">Términos de usuario</a></p>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-danger w-100 waves-effect waves-light" onclick="registrar();" type="button">Registrarse</button>
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-danger w-100 waves-effect waves-light" type="button" onclick="activa_panel(0);"><i class="bx bx-arrow-back"></i> Regresar</button>
                                    </div>

                                <div class="mt-5 text-center">
                                    <p class="text-muted mb-0">¿Ya tienes una cuenta? <a href="<?php echo base_url()?>" class="text-primary fw-semibold"> Login </a> </p>
                                </div>
                            </div>
                            <div class="mt-4 mt-md-5 text-center">
                                <p class="mb-0">© <script>
                                        document.write(new Date().getFullYear())
                                    </script> TopSisConsulting .<i class="mdi mdi-heart text-danger"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end auth full page content -->
            </div>
            <!-- end col -->
            <div class="col-xxl-9 col-lg-8 col-md-7">
                <div class="auth-bg pt-md-5 p-4 d-flex">
                    <div class="bg-overlay bg-danger"></div>
                    <ul class="bg-bubbles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <!-- end bubble effect -->
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-7">
                            <div class="p-0 p-sm-4 px-xl-0">
                                <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators carousel-indicators-rounded justify-content-start ms-0 mb-0">
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <!-- end carouselIndicators -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“Ser proveedor me permite mejorar cada día para lograr cumplir con los requerimientos.”
                                                </h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <img src="public/images/users/avatar-1.jpg" class="avatar-md img-fluid rounded-circle" alt="...">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">Richard Drews
                                                            </h5>
                                                            <p class="mb-0 text-white-50">Vendtech SAC</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“Our task must be to
                                                    free ourselves by widening our circle of compassion to embrace
                                                    all living
                                                    creatures and
                                                    the whole of quis consectetur nunc sit amet semper justo. nature
                                                    and its beauty.”</h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <img src="public/images/users/avatar-2.jpg" class="avatar-md img-fluid rounded-circle" alt="...">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">Rosanna French
                                                            </h5>
                                                            <p class="mb-0 text-white-50">Web Developer</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“I've learned that
                                                    people will forget what you said, people will forget what you
                                                    did,
                                                    but people will never forget
                                                    how donec in efficitur lectus, nec lobortis metus you made them
                                                    feel.”</h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <img src="public/images/users/avatar-3.jpg" class="avatar-md img-fluid rounded-circle" alt="...">
                                                        <div class="flex-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">Ilse R. Eaton</h5>
                                                            <p class="mb-0 text-white-50">Manager
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end carousel-inner -->
                                </div>
                                <!-- end review carousel -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container fluid -->
</div>


<!-- JAVASCRIPT -->
<script src="public/libs/jquery/jquery.min.js"></script>
<script src="public/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="public/libs/metismenu/metisMenu.min.js"></script>
<script src="public/libs/simplebar/simplebar.min.js"></script>
<script src="public/libs/node-waves/waves.min.js"></script>
<script src="public/libs/feather-icons/feather.min.js"></script>
<!-- pace js -->
<script src="public/libs/pace-js/pace.min.js"></script>
<script src="<?php echo base_url();?>public/libs/alertifyjs/build/alertify.min.js"></script>
<!-- Sweet Alerts js -->
<script src="<?php echo base_url();?>public/libs/sweetalert2/sweetalert2.min.js"></script>
<!-- Sweet alert init js-->
<script src="<?php echo base_url();?>js/pages/sweetalert.init.js"></script>

<script>
 

    function notificacion(des,tipo,mensaje,img){
        switch (tipo) {
            case 'error':
                $('#'+des).css('color','red');
                $('#'+img).attr('src','https://protopsis.xyz/sistema/public/images/iconos/incheck.png');
                $('#'+des).text(mensaje);
                break;
            case 'success':
                $('#'+des).css('color','green');
                $('#'+img).attr('src','https://protopsis.xyz/sistema/public/images/iconos/check.png');
                $('#'+des).text(mensaje);
                break;                
            default:
                $('#'+des).css('color','white');
                $('#'+des).text('');
                break;
        }
    }

    function validar_sunat(){
        var data =  new FormData();
        data.append('add_ruc',get_data('add_ruc'));
        $.ajax({
          type:'post',
          contentType:false,
          url:'<?php echo base_url()?>C_proveedor/validar_sunat',
          data: data,
          processData:false,
          beforeSend:function(){
          },
          success: function(response){
            if(response=='error'){
                notificacion('lbl_mensaje_ruc','error',' Incorrecto ','img_mensaje_ruc');
            }else{
                $('#add_razon_social').val(response);
                notificacion('lbl_mensaje_ruc','success',' Correcto ','img_mensaje_ruc');
            }
          }
        });
    }

    function activa_panel(dato){
        window.location.href='https://protopsis.xyz/sistema/';
    }

    function get_data(id){
        return $('#'+id).val();
    }
    function upd_login(){
        var data =  new FormData();
        data.append('ruc',get_data('ruc'));
        data.append('usuario',get_data('usuario'));
        data.append('contra',get_data('contra'));
        $.ajax({
          type:'post',
          contentType:false,
          url:'<?php echo base_url()?>login',
          data: data,
          processData:false,
          beforeSend:function(){
          },
          success: function(response){
            if(response=='si'){
                window.location.href = '/sistema/menu/';
            }else{
            }
          }
        });
    }

    function registrar(){
        var data =  new FormData();
        var dat = get_data('add_ruc');
        if(dat==''){
            $('#lbl_mensaje_ruc').text(' * Ingrese un RUC.'); 
            $('#lbl_mensaje_ruc').css('color','red'); 
            return;
        }else{
            $('#lbl_mensaje_ruc').text(' * Correcto.'); 
            $('#lbl_mensaje_ruc').css('color','green');            
        }

        var dat = get_data('add_razon_social');
        if(dat==''){
            $('#lbl_mensaje_razon_social').text(' * Realice la validaciòn del RUC.');  
            $('#lbl_mensaje_razon_social').css('color','red'); 
            return;
        }else{
            $('#lbl_mensaje_razon_social').text(' * Correcto.'); 
            $('#lbl_mensaje_razon_social').css('color','green');            
        }

        var dat_clave1 = get_data('add_clave');
        if(dat_clave1==''){
            $('#lbl_mensaje_clave').text(' * Ingrese una contraseña.'); 
            $('#lbl_mensaje_clave').css('color','red'); 
            return;
        }else{
            $('#lbl_mensaje_clave').text(' * Correcto.'); 
            $('#lbl_mensaje_clave').css('color','green');            
        }


        var dat_clave2 = get_data('add_clave2');
        if(dat_clave2==''){
            $('#lbl_mensaje_clave2').text(' * Ingrese una contraseña.'); 
            $('#lbl_mensaje_clave2').css('color','red'); 
            return;
        }else{
            $('#lbl_mensaje_clave2').text(' * Correcto.'); 
            $('#lbl_mensaje_clave2').css('color','green');            
        }

        if(dat_clave1!=dat_clave2){
            $('#lbl_mensaje_clave2').text(' * La contraseña ingresada no coincide.'); 
            $('#lbl_mensaje_clave2').css('color','red'); 
            return;
        }else{
            $('#lbl_mensaje_clave2').text(' * Correcto.'); 
            $('#lbl_mensaje_clave2').css('color','green');            
        }


        data.append('add_ruc',get_data('add_ruc'));
        data.append('add_razon_social',get_data('add_razon_social'));
        data.append('add_usuario',get_data('add_usuario'));
        data.append('add_clave',get_data('add_clave'));
        data.append('add_clave2',get_data('add_clave2'));

        $.ajax({
          type:'post',
          contentType:false,
          url:'<?php echo base_url()?>proveedor/registrar',
          data: data,
          processData:false,
          beforeSend:function(){
          },
          success: function(response){
                if(response=='0'){
                    alerta_mensaje('¡Bienvenido!','Ahora eres proveedor, su registro ha sido completado con éxito.','success');
                    setTimeout(() => {
                        window.location.href = '/sistema/menu/';
                    }, 2500);
                }else if(response=='ruc_duplicado'){
                    alerta_mensaje('¡Ocurrió algo!','El RUC ingresado ya cuenta con un registro.','error');
                    $('#lbl_mensaje_ruc').text(' * El RUC ingresado ya existe.'); 
                    $('#lbl_mensaje_ruc').css('color','red'); 
                }else if(response=='user_duplicado'){
                    alertify.error('El usuario ingresado no se encuentra disponible.');
                }else{

                }
            }
        });
    }

    function alerta_mensaje(title,text,icon){
        Swal.fire(
        {
            title: title,
            text: text,
            icon: text,
            confirmButtonColor: '#fd625e'
        })
    }

    function mostrarModalErrorVar(titulo, mensaje) {
        $('#modalError').modal('show');
        $('#titulomodale').text(titulo);
        $('#mensajemodale').text(mensaje);
    }
</script>