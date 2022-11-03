<meta charset="utf-8"/>
<title>.::Recuperar Clave TOPSIS::.</title>
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

<!-- App Css-->
<link href="public/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<div class="auth-page">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-5" >
                <div class="auth-full-page-content d-flex p-sm-5 p-4">
                    <div class="w-100">
                        <div class="d-flex flex-column h-100">
                            <div class="mb-4 mb-md-5 text-center">
                                <a href="<?php echo base_url();?>" class="d-block auth-logo">
                                    <img src="public/images/topsis.png" alt="" height="50"> <span class="logo-txt"></span>
                                </a>
                            </div>
                            <!--Panel Login--->
                            <div class="auth-content my-auto" id="pnl_login" >
                                <div class="text-center">
                                    <h5 class="mb-0">¡Olvidaste tu contraseña!</h5>
                                    <p class="text-muted mt-2">Ingrese el RUC de registro para obtener una clave temporal que será enviada a su correo electrónico.</p>
                                </div>
                                    <div class="mb-3">
                                        <div style="align-items:center;">
                                            <label for="RUC" class="form-label">RUC</label>
                                            <span class="form-label" id="lbl_ruc">  </span>
                                        </div> 
                                        <input type="text" class="form-control" id="ruc" placeholder="Enter username" name="ruc" value="">
                                    </div>                                
                                    
                                    <div class="mb-3">
                                        <button class="btn btn-danger w-100 waves-effect waves-light" type="button" onclick="upd_recuperar();"> Enviar </button>
                                    </div>

                                    <div class="mt-5 text-center">
                                        <p class="text-muted mb-0">¿Cuentas con accesos? <a href="<?php echo base_url();?>" class="text-primary fw-semibold"> Iniciar Sesiòn</a> </p>
                                    </div>

                            </div>
                            <div class="mt-4 mt-md-5 text-center">
                                <p class="mb-0">© <script>
                                        document.write(new Date().getFullYear())
                                    </script> <i class="mdi mdi-heart text-danger"></i> by TopSis</p>
                            </div>
                        </div>
                    </div>
                </div>
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
                                                <h4 class="mt-4 fw-medium lh-base text-white"></h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <img src="public/images/users/avatar-2.jpg" class="avatar-md img-fluid rounded-circle" alt="...">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">Maribel de la Cruz</h5>
                                                            <p class="mb-0 text-white-50">Excelente, pude calificar a mis proveedores de una forma rápida..</p>
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
    function alerta_mensaje(title,text,icon){
        Swal.fire(
        {
            title: title,
            text: text,
            icon: icon,
            confirmButtonColor: '#fd625e'
        })
    }

    function noti_input(input,texto,tipo){
        switch (tipo) {
            case 'success':
                $('#'+input).text(texto);
                $('#'+input).css('color','green');                        
                break;
            case 'error':
                $('#'+input).text(texto);
                $('#'+input).css('color','red');                         
                break;                        
            default:
                $('#'+input).text('');
                $('#'+input).css('color','black');                        
                break;
        }
    }
    function activa_panel(dato){
        switch (dato) {
            case 0:
                $('#pnl_menu').css('display','block');
                $('#pnl_login').css('display','none');
                $('#pnl_menu_registro').css('display','none');
                break;
            case 1:
                $('#pnl_menu').css('display','none');
                $('#pnl_login').css('display','block');
                $('#pnl_menu_registro').css('display','none');
                break;
            case 2:
                $('#pnl_menu').css('display','none');
                $('#pnl_login').css('display','none');
                $('#pnl_menu_registro').css('display','block');                
                break;
            case 3:
                window.location.href = 'https://protopsis.xyz/sistema/reg_proveedor';
                break;
            case 4:
                window.location.href = 'https://protopsis.xyz/sistema/reg_cliente';
                break;                                                
            default:
                break;
        }
    }

    function get_data(id){
        return $('#'+id).val();
    }

    function upd_recuperar(){
        var data =  new FormData();
        var dat = get_data('ruc');
        if(dat==''){
            $('#lbl_ruc').text(' * Ingrese un RUC.'); 
            $('#lbl_ruc').css('color','red'); 
            return;
        }else{
            $('#lbl_ruc').text(' * Correcto.'); 
            $('#lbl_ruc').css('color','green');            
        }
        data.append('ruc',get_data('ruc'));
        $.ajax({
          type:'post',
          contentType:false,
          url:'<?php echo base_url()?>recuperar_action',
          data: data,
          processData:false,
          beforeSend:function(){
          },
          success: function(response){
            var res = jQuery.parseJSON(response);
                    if (res.error == 0)
                    {
                        alerta_mensaje('Recuperar Cuenta',res.mensaje,'success');
                        setTimeout(function () {
                            window.location.href = '/sistema';
                        },5000);
                    }
                    else
                    {
                        alerta_mensaje('Recuperar Cuenta',res.mensaje,'error');
                        $('#lbl_ruc').text(''); 
                    }

            //console.log(response);
            /*if(response=='0'){
                window.location.href = '/sistema/menu/';
            }else if(response=='1'){
                noti_input('lbl_ruc',' * Vuelva a ingresar el ruc.','error');
                noti_input('lbl_clave',' * Vuelva a ingresar su clave.','error');
                alerta_mensaje('¡Ocurrió Algo!','Los datos ingresados no son correctos, verifique e intente nuevamente.','error');
            }else if(response=='2'){
                noti_input('lbl_ruc','','');
                noti_input('lbl_clave','','');
                alerta_mensaje('¡Ocurrió Algo!','La cuenta del usuario no se encuentra activa.','error');
            }else{
            }*/
          }
        });
    }


    function mostrarModalErrorVar(titulo, mensaje) {
        $('#modalError').modal('show');
        $('#titulomodale').text(titulo);
        $('#mensajemodale').text(mensaje);
    }
</script>