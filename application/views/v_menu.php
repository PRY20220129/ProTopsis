<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Mi Menú</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url();?>agenda">Inicio</a></li>
                                <li class="breadcrumb-item active">Menú</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <?php if($tipo_user==10){ ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body" style="text-align:center;">
                                <h3 class="card-title">Agregar o editar servicios</h3>
                                <p class="card-text"></p>
                                <img src="<?php echo base_url();?>public/images/iconos/servicios2.png"><br>
                                <a href="<?php echo base_url();?>servicio" class="btn btn-danger mt-3 btn-sm waves-effect waves-light"> Ir</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body" style="text-align:center;" >
                                <h3 class="card-title">Agregar o editar certificado</h3>
                                <p class="card-text"></p>
                                <img src="<?php echo base_url();?>public/images/iconos/certificado.png"><br>
                                <a href="<?php echo base_url();?>certificado" class="btn btn-danger mt-3 btn-sm waves-effect waves-light"> Ir</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body" style="text-align:center;" >
                                <h3 class="card-title">Ofertas</h3>
                                <p class="card-text"></p>
                                <img src="<?php echo base_url();?>public/images/iconos/certificado.png"><br>
                                <a href="<?php echo base_url();?>ofertas_proveedor" class="btn btn-danger mt-3 btn-sm waves-effect waves-light"> Ir</a>
                            </div>
                        </div>
                    </div>                                    
                </div>
            <?php }else if($tipo_user==15){ ?>
                <div class="row">
                    <!--<div class="col-md-4">
                        <div class="card">
                            <div class="card-body" style="text-align:center;">
                                <h3 class="card-title">Registrar usuarios</h3>
                                <p class="card-text"></p>
                                <img src="<?php // echo base_url();?>public/images/iconos/users.png"><br>
                                <a href="<?php // echo base_url();?>usuariosxcliente" class="btn btn-danger mt-3 btn-sm waves-effect waves-light"> Ir</a>
                            </div>
                        </div>
                    </div>-->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body" style="text-align:center;">
                                <h3 class="card-title">Registrar Solicitudes</h3>
                                <p class="card-text"></p>
                                <img src="<?php echo base_url();?>public/images/iconos/oferta_132.png"><br>
                                <a href="<?php echo base_url();?>ofertas_cliente" class="btn btn-danger mt-3 btn-sm waves-effect waves-light"> Ir</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body" style="text-align:center;">
                                <h3 class="card-title">Solicitudes Cerradas</h3>
                                <p class="card-text"></p>
                                <img src="<?php echo base_url();?>public/images/iconos/oferta_132.png"><br>
                                <a href="<?php echo base_url();?>evaluacion" class="btn btn-danger mt-3 btn-sm waves-effect waves-light"> Ir</a>
                            </div>
                        </div>
                    </div>

                </div>                                
            <?php }else if($tipo_user==20){ ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body" style="text-align:center;">
                                <h3 class="card-title">Evaluación Proveedores<h3>
                                <p class="card-text"></p>
                                <img src="<?php echo base_url();?>public/images/iconos/oferta_132.png"><br>
                                <a href="<?php echo base_url();?>evaluacion" class="btn btn-danger mt-3 btn-sm waves-effect waves-light"> Ir</a>
                            </div>
                        </div>
                    </div>
                </div>                                
            <?php } ?>
        </div>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
    });
</script>