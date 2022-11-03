<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class C_evaluacion extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
        $this->load->model('Mdl_compartido');
        $this->load->model('M_evaluacion');
        $this->load->model('M_simulacion');
        $this->load->model('M_servicio');
        date_default_timezone_set('America/Lima');
    }

    public function index(){
        $permiso = $this->Mdl_compartido->permisos_controlador('evaluacion');
        if (!$permiso)
            redirect('');
        
        if(!isset($_SESSION['_SESSIONUSER'])){
            redirect('login');
        }

        $header['menu'] = $this->Mdl_compartido->permisos_menu();
        $header['menu_activo'] = 'evaluacion';
        $tipo_user = $this->Mdl_compartido->retornarcampo($_SESSION['_SESSIONUSER'],'coduser','tb_usuarios2','tipo_user');
        $data['tipo_user'] = $tipo_user;
        $header['tipo_user'] = $tipo_user;

        $header['total_certificado'] = $this->Mdl_compartido->get_all_data('tb_certificado_proveedor','id_proveedor');
        $header['total_servicio'] = $this->Mdl_compartido->get_all_data('tb_servicio_proveedor','id_proveedor');

        $data['datos']='';
        $header['datos_header']='';
        $header['lang']='en';
        $this->load->view('layouts/v_head',$header);
        //$this->load->view('layouts/menu.php',$header);
        $this->load->view('layouts/horizontal-menu',$header);
        $this->load->view('v_evaluacion', $data);
        $this->load->view('layouts/v_footer');

    }

    //Lo uso
    function cargar_datos_proveedor(){
        $id_oferta = trim($this->input->post('id_oferta',false));
        $id_proveedor = $this->M_evaluacion->retornarcampo_recomend($id_oferta,'id_oferta','simu_cxproveedor_step4','id_proveedor');
        if($id_proveedor==''){
            $id_proveedor = $this->M_evaluacion->retornarcampo_accept($id_oferta,'id_oferta','simu_cxproveedor_step4','id_proveedor');
        }
        $propuesta_doc = $this->M_evaluacion->retornarcampo_archivo($id_oferta,'id_oferta','tb_postulacion','archivo',$id_proveedor);

        $resul_datos_proveedor = $this->M_evaluacion->get_data_proveedor($id_proveedor);
        $resul_datos_servicios = $this->M_servicio->list('tb_servicio_proveedor',$id_proveedor);

        $cadena.='
            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Datos Proveedor</h4>
                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body">';
                        foreach($resul_datos_proveedor as $key){
                            $cadena.='
                                <div class="mb-2">
                                    <label class="form-label" for="default-input">RUC</label>
                                    <input class="form-control form-control-sm" disabled type="text" value="'.$key->dni.'">
                                </div>                            
                                <div class="mb-2">
                                    <label class="form-label" for="default-input">Razon Social</label>
                                    <input class="form-control form-control-sm" disabled type="text" value="'.$key->razon_social.'">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="default-input">Teléfono</label>
                                    <input class="form-control form-control-sm" disabled type="text" value="'.$key->telefono.'">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="default-input">Dirección</label>
                                    <input class="form-control form-control-sm" disabled type="text" value="'.$key->direccion.'">
                                </div>                                                                
                                <div class="mb-2">
                                    <label class="form-label" for="default-input">Correo</label>
                                    <input class="form-control form-control-sm" disabled type="text" value="'.$key->correo.'">
                                </div>
                            ';
                        }
        $cadena.='
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Categorías Proveedor</h4>
                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body">';


                        foreach($resul_datos_servicios as $key){
        $cadena.='
                                <div class="mb-2">
                                    <label class="form-label" for="default-input">'.$key->descripcion.'</label>
                                </div>                            
                            ';
                        }

        $cadena.='
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Propuesta</h4>
                            <p class="card-title-desc"></p>
                        </div>      
                        <div class="card-body">  
        ';

        $cadena.='      <a title="Descargar propuesta enviada" class="btn btn-sm btn-info" href="'.base_url().'uploads/propuestas/'.$propuesta_doc.'" download="PROPUESTA_PROVEEDOR"><i class="bx bx-file"></i> Descargar Propuesta</a>';
        
        $cadena.='
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Aceptar Recomendación</h4>
                            <p class="card-title-desc"></p>
                        </div>      
                        <div class="card-body">'; 

                        $cadena.='<button class="btn btn-sm btn-success" onclick="aceptar_recomendacion('.$id_oferta.','.$id_proveedor.');"> <i class="fas fa-check" ></i> Aceptar Recomendación</button>';
        $cadena.='
                        </div>
                    </div>
                </div>

                <!-- end col -->
            </div>
        '; 

        echo $cadena;

    }

    function get_ofertas(){
        $t_vista = 10; // total por visita
        if(isset($_SESSION['_SESSION_PAG'])){
            $pag = $_SESSION['_SESSION_PAG']; 
        }else{
            $pag = 1; 
        }

        $limite = $t_vista * $pag;
        $inicio = ($pag-1)*$t_vista; 

        $ar['limite']=$limite;
        $ar['inicio']=$inicio;

        $tipo_user = $this->Mdl_compartido->retornarcampo($_SESSION['_SESSIONUSER'],'coduser','tb_usuarios2','tipo_user');

        // Obtenemos los estados cierre 5 de la oferta seleccionada 
        $arr_of_fase_rec = $this->M_evaluacion->get_casos_step_fase_recomendacion();
        //Armar listado
        //Separamos los casos postulados
        $resultado = $this->M_evaluacion->get_ofertas($inicio,$limite,$tipo_user);
        $res_postu_x_oferta = $this->M_evaluacion->get_postulantesxoferta();
        $cadena = '';
        $cont_ofertas=0; 
        if($resultado!='error'){
            foreach ($resultado as $key) {
                $cont_ofertas++; 
                $cadena.='
                    <tr>
                        <td style="width: 50px;">
                            <div class="font-size-22 text-success">
                                <i class="far fa-hand-point-right"></i>
                            </div>
                        </td>                                                        
                        <td>
                            <div>
                                <h5 class="font-size-14 mb-1">'.$key->razon_social.'</h5>
                                <p class="text-muted mb-0 font-size-12">Solicitud: '.$key->descripcion.'</p>
                            </div>
                        </td>
                        <td>
                            <div>
                                <p class="text-muted mb-0 font-size-12">Fecha Inicio: '.$key->f_inicio.'</p>
                                <p class="text-muted mb-0 font-size-12">Fecha Fin: '.$key->f_fin.'</p>
                            </div>
                        </td>
                        <td>
                            <div>
                                <h5 class="font-size-14 mb-1">Postulantes</h5>';
                                $c = 0 ;
                                $prove=0;
                                foreach ($res_postu_x_oferta as $k){
                                    if($k->id_oferta==$key->id){
                                        $prove=$k->total; 
                                        $cadena.='
                                            <p class="text-muted mb-0 font-size-12">'.$k->total.' Proveedores</p>
                                        ';
                                        $c++; 
                                        break;
                                    }
                                }
                                if($c==0){
                                    $cadena.='
                                        <p class="text-muted mb-0 font-size-12"> 0 Proveedores</p>
                                    ';                                    
                                }
                $cadena.='
                            </div>
                        </td>  
                        <td>
                            <div>';
                                $cont = 0; 
                                foreach ($arr_of_fase_rec as $kzz) {
                                    if($kzz->id_oferta==$key->id){
                                        if($kzz->estado_cierre==5){
                                            $cadena.='
                                                <button title="Recomendación establecida, click para visualizar." class="btn btn-sm btn-warning" onclick="evaluar_oferta('.$key->id.');"> <i class="fas fa-gavel"></i> Recomendación Enviada</button>
                                            '; 
                                        }
                                        if($kzz->estado_cierre==1){
                                            $cadena.='
                                                <button title="Recomendación aceptada, click para visualizar." class="btn btn-sm btn-success" onclick="evaluar_oferta('.$key->id.');"> <i class="fas fa-gavel"></i> Recomendación Aceptada</button>
                                            '; 
                                        }
                                        $cont++; 
                                    }
                                }
                                if($cont==0){
                                    if($tipo_user==15){
                                        if($prove<=1){
                                            $cadena.='
                                                <a href="'.base_url().'ofertas_cliente" class="btn btn-sm btn-warning" title="Amplicar fecha de cierre, no cuenta con proveedores postulantes."> <i class="fas fa-gavel"></i> Ampliar Fecha Cierre.</a>
                                            ';
                                        }else{
                                            $cadena.='
                                                <button class="btn btn-sm btn-secondary" disabled onclick="evaluar_oferta('.$key->id.');"> <i class="fas fa-gavel"></i> Pendiente de revisión por experto TI</button>
                                            ';
                                        }
                                    }else{
                                        if($prove<=1){
                                            $cadena.='
                                                <button class="btn btn-sm btn-secondary"  onclick="evaluar_oferta('.$key->id.');"> <i class="fas fa-gavel"></i> En espera de postulaciones</button>
                                            ';
                                        }else{
                                            $cadena.='
                                                <button class="btn btn-sm btn-secondary"  onclick="evaluar_oferta('.$key->id.');"> <i class="fas fa-gavel"></i> Pendiente de revisión por experto TI</button>
                                            ';
                                        }

                                    }

                                }
                $cadena.='  </div>
                        </td>                                                                                                                                                                                                                                
                    </tr>                
                '; 
            }
        }

        //Armar paginación
            //Obtenemos totales de registros
        $total = $this->M_evaluacion->get_all_ofertas($tipo_user);
        $division = $total / $t_vista;
        $cadena2='';  
        for ($i=0; $i < $division; $i++) { 
            $p = $i+1; 
            if($p==$pag){
                $cadena2 .= '
                    <li class="page-item active"><a class="page-link" href="javascript::void(0);" onclick="load_filtro_paginacion('.$p.');">'.$p.'</a></li>
                ';
            }else{
                $cadena2 .= '
                    <li class="page-item"><a class="page-link" href="javascript::void(0);" onclick="load_filtro_paginacion('.$p.');">'.$p.'</a></li>
                ';                
            }
        }

        //Resultados
        $cont_ofertas = ($t_vista * ($pag-1)) + ($cont_ofertas); 
        $resultado = ' Viendo '.$cont_ofertas.' de '.$total.' solicitudes';


        $ar['total_postulacion']=count($arr_ids);
        $ar['lst_ofertas_disponibles']=$cadena;
        $ar['lst_ofertas_paginacion']=$cadena2;
        $ar['total_ofertas']=$total;
        $ar['resultado']=$resultado;
        echo json_encode($ar);
    }

    function ver_requerimientos(){
        $id = trim($this->input->post('id',false));
        $resultado = $this->M_evaluacion->get_requerimientos($id);
        $cadena=''; 
        $cadena1=''; 
        $cadena2='<table><tr><td colspan="3">Registros</td></tr>'; 
        if($resultado!='error'){
            $contador=0;
            foreach ($resultado as $key) {
                $contador++;

                if($contador==1){
                    $cadena1.='
                    <table class="table align-middle table-nowrap table-borderless">
                        <tr>
                            <td style="width: 50px;">
                                <div class="font-size-12 text-success">
                                    <i class="fas fa-hospital-user"></i>
                                </div>
                            </td>                                                        
                            <td>
                                <div>
                                    <h5 class="font-size-14 mb-1">'.$key->razon_social.'</h5>
                                    <p class="text-muted mb-0 font-size-12">Oferta: '.$key->proyecto.'</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <p class="text-muted mb-0 font-size-12">Fecha Inicio: '.$key->f_inicio.'</p>
                                    <p class="text-muted mb-0 font-size-12">Fecha Fin: '.$key->f_fin.'</p>
                                </div>
                            </td>
                        </tr>      
                    </table>           
                    ';
                }

                $cadena2.='
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm m-auto">
                                    <span class="avatar-title rounded-circle bg-soft-light text-dark font-size-10">
                                        '.$contador.'
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span class="text-muted mb-0 font-size-12">'.$key->descripcion.'</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="text-muted mb-0 font-size-12">'.$key->porcentaje.'</span>
                            </div>
                        </td>
                    </tr>                 
                ';
            }

            $cadena2.='</table>'; 
            $cadena3='<div style="margin-top:20px;"><button class="btn btn-sm btn-secondary" onclick="regresar_panel(1);"> <i class="fas fa-arrow-circle-left"></i> Regresar </button></div>';

            $ar['lst_ofertas_requerimiento']=$cadena1.$cadena2.$cadena3;
            echo json_encode($ar);
        }else{
            $cadena.='<div style="margin-top:20px;"><button class="btn btn-sm btn-secondary" onclick="regresar_panel(1);"> <i class="fas fa-arrow-circle-left"></i> Regresar </button></div>';
            $ar['lst_ofertas_requerimiento']=$cadena;
            echo json_encode($ar);
        }
    }

    function ver_certificados(){
        $id = trim($this->input->post('id',false));
        $resultado = $this->M_evaluacion->get_certificados($id);
        if($resultado!='error'){
            $cadena='<table class="table align-middle table-nowrap table-borderless">'; 
            foreach ($resultado as $key) {
                $cadena.='
                    <tr style="border: 1px solid #dfdfdf;">
                        <td>
                            <div>
                                <h5 class="font-size-14 mb-1">'.$key->descripcion.'</h5>
                            </div>
                        </td>
                        <td>
                            <div>
                                <a title="Descargar certificado Proveedor" class="btn btn-sm btn-info" href="'.base_url().'uploads/documentos/'.$key->archivo.'" download="Certificado_Proveedor"><i class="bx bx-file"></i> Descargar Certificado</a>
                            </div>
                        </td>
                    </tr>      
                ';
            }
            $cadena.='</table>'; 

            $ar['lst_registros']=$cadena;
            echo json_encode($ar);
        }else{
            $cadena='<label>Sin Certificados publicados</label>';
            $ar['lst_registros']=$cadena;
            echo json_encode($ar);
        }
    }

    /*
        REGISTRO DE CRITERIOS
    */

    function ver_criteriosxservicio(){
        $id = trim($this->input->post('id_oferta',false));
        $resultado = $this->M_evaluacion->get_criteriosxoferta($id);
        if($resultado!='error'){
            $tot = 0; 
            $cadena='
                <table class="table">
                    <tr>
                        <td class="bg-soft-primary">
                            <span class="text-muted mb-0 font-size-12"><strong>Criterio</strong></span>
                        </td>
                        <td class="bg-soft-primary">
                            <span class="text-muted mb-0 font-size-12"><strong>Porcentaje</strong></span>
                        </td>
                        <td class="bg-soft-primary">
                            <span class="text-muted mb-0 font-size-12"><strong>Opción</strong></span>
                        </td>                        
                    </tr>
            '; 
            foreach ($resultado as $key) {
                $tot += $key->porcentaje;
                $totd = $key->porcentaje*100;
                $cadena.='
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="text-muted mb-0 font-size-12">'.$key->descripcion.'</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="text-muted mb-0 font-size-12">'.$totd.' %</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <button class="btn btn-sm btn-secondary" onclick="abrir_editar_criterio('.$key->id.');"> <i class="fas fa-edit"></i> </button>
                                <button class="btn btn-sm btn-secondary" style="margin-left:3px;" onclick="eliminar_criterio('.$key->id.');"> <i class="fas fa-trash"></i> </button>
                            </div>
                        </td>                        
                    </tr>                
                ';
            }
            $tot=$tot*100;
            $cadena.='
                <tr>
                    <td>Total</td>
                    <td>'.$tot.' %</td>
                </tr>
            ';
            $cadena.='</table>'; 
            $ar['lst_criterios']=$cadena;
            echo json_encode($ar);
        }else{
            $cadena='<span> Sin Resultado</span>';
            $ar['lst_criterios']=$cadena;
            echo json_encode($ar);
        }
    }   

    function eliminar(){
        $id = trim($this->input->post('id',true));
        $id_oferta = trim($this->input->post('id_oferta',true));
        
        $resultado = $this->M_evaluacion->delete_criterio('tb_criteriosxoferta',$id);
        if($resultado<=0){
            echo 'error';
        }else{
            $this->M_evaluacion->delete_tables($id_oferta);
            echo $resultado;
        }
    }
     
    function registrar_criterio(){
        $descripcion = trim($this->input->post('descripcion',false));
        $porcentaje = trim($this->input->post('porcentaje',false));
        $id_oferta = trim($this->input->post('id_oferta',false));
        
        $res = $this->M_evaluacion->verificar_suma_criterios($id_oferta,0);
        $tt = $res+$porcentaje; 

        if($tt>1){
            $valida = 'error_limite';
        }else{
            if($descripcion!=''){
                if($porcentaje!=''){
                    $arr = array(
                        'id_oferta'=>$id_oferta,
                        'descripcion'=>$descripcion,
                        'porcentaje'=>$porcentaje,
                        'f_registro'=>date('Y-m-d H:i:s')
                    );
                    $res = $this->M_evaluacion->insert('tb_criteriosxoferta',$arr);
                    if($res){
                        //Eliminamos historial de casos 
                        $this->M_evaluacion->delete_tables($id_oferta);
                        $valida = 'ok';
                    }else{
                        $valida = 'error';
                    }
                }
            }
        }
        $ar['valida']=$valida;
        echo json_encode($ar);
    }

    function actualizar_criterio(){
        $descripcion = trim($this->input->post('descripcion',false));
        $porcentaje = trim($this->input->post('porcentaje',false));
        $id_oferta = trim($this->input->post('id_oferta',false));
        $id_criterio = trim($this->input->post('id_criterio',false));
        
        $res = $this->M_evaluacion->verificar_suma_criterios($id_oferta,$id_criterio);
        $tt = $res+$porcentaje; 

        if($tt>1){
            $valida = 'error_limite';
        }else{
            if($descripcion!=''){
                if($porcentaje!=''){
                    $arr = array(
                        'descripcion'=>$descripcion,
                        'porcentaje'=>$porcentaje
                    );
                    $res = $this->M_evaluacion->update('tb_criteriosxoferta',$arr,$id_criterio);
                    if($res){
                        $this->M_evaluacion->delete_tables($id_oferta);
                        $valida = 'ok';
                    }else{
                        $valida = 'error';
                    }
                }
            }
        }
        $ar['valida']=$valida;
        echo json_encode($ar);
    }

    function get_criterio(){
        $id = trim($this->input->post('id',false));
        if($id!=''){
            $res = $this->M_evaluacion->get_criterio($id);
            if($res!='error'){
                foreach ($res as $key) {
                    $ar['criterio']=$key->descripcion;
                    $ar['porcentaje']=$key->porcentaje;
                    $ar['valida']='success';
                }
            }else{
                $ar['criterio']='';
                $ar['porcentaje']='';
                $ar['valida']='success';
            }
        }else{
            $ar['valida']='error';
            $ar['criterio']='';
            $ar['porcentaje']='';
        }
        echo json_encode($ar);
    }


    function armar_matriz_valor(){
        $id_oferta = trim($this->input->post('id_oferta',false));

        $array_proveedores = $this->M_evaluacion->datos_tabla('tb_postulacion',$id_oferta,'id_oferta');
        $array_datos_proveedor = $this->M_evaluacion->datos_proveedorxoferta($id_oferta);
        $array_pesos = $this->M_evaluacion->datos_tabla('tb_criteriosxoferta',$id_oferta,'id_oferta');
        $array_datos = $this->M_evaluacion->datos_tabla_cxproveedor($id_oferta);

        $escala=9; 

        $tb='';
        $cen='style=" text-align:center;"';
        $cd = '<table '.$tb.' class="table">';
        $cd.='<tr '.$cen.'>';
        $cd.='<td></td>';
        //Cabecera peso
        foreach ($array_pesos as $key) {
            $cd.='<td width="200px;" >'.$key['descripcion'].'</td>';
        }
        $cd.='</tr>';
        foreach ($array_proveedores as $key) {
            $id_proveedor     = $key['id_proveedor'];
            $n_proveedor      = $key['id_proveedor'];//nOMBRE DEL PROVEEDOR
            foreach ($array_datos_proveedor as $k) {
                if($id_proveedor==$k['id_proveedor']){
                    $cd.='<tr>
                            <td>
                                <div> 
                                    <button  title="Certificados del proveedor" onclick="load_certificador('.$id_proveedor.');" class="btn btn-sm btn-primary"> <i class="dripicons-star"></i> </button> 
                                    <a class="btn btn-sm btn-primary" title="Propuesta del proveedor" href="'.base_url().'uploads/propuestas/'.$key['archivo'].'" download="PRUPUESTA_'.$k['razon_social'].'">
                                    <i class="bx bx-file"></i>
                                    </a> '.$k['razon_social'].'
                                </div> 
                            </td>';
                }
            }
            foreach ($array_pesos as $keyy) {
                $id_criterio     = $keyy['id'];
                $n_criterio      = $keyy['descripcion']; 
                $con = 0; 
                foreach ($array_datos as $keyz) {
                    if($id_criterio==$keyz['id_criterio'] && $id_proveedor==$keyz['id_proveedor']){

                        $cd.='
                        <td>
                                <select class="form-control form-control-sm border-warning bg-soft-light" style="text-align:center" id="select_'.$id_proveedor.'_'.$id_criterio.'" onchange="agregar_valor('.$id_proveedor.','.$id_criterio.');">
                                    <option value="">--Seleccione--</option>
                        ';
                                for ($i=0; $i <= $escala ; $i++) { 
                                    if($i==$keyz['valor']){
                                        $cd.='<option  selected data-criterio="'.$id_criterio.'" data-proveedor="'.$id_proveedor.'" value="'.$i.'">'.$i.'</option>';
                                    }else{
                                        $cd.='<option data-criterio="'.$id_criterio.'" data-proveedor="'.$id_proveedor.'" value="'.$i.'">'.$i.'</option>';
                                    }
                                }
                        $cd.='
                                    </select>
                            </td>
                        ';
                                                
                        $con++; 
                        break;
                    }
                }
                if($con==0){
                    $cd.='
                        <td>
                            <select class="form-control form-control-sm border-warning bg-soft-light" style="text-align:center" id="select_'.$id_proveedor.'_'.$id_criterio.'" onchange="agregar_valor('.$id_proveedor.','.$id_criterio.');">
                                <option value="">--Seleccione--</option>
                    ';
                            for ($i=0; $i <= $escala ; $i++) { 
                                $cd.='<option data-criterio="'.$id_criterio.'" data-proveedor="'.$id_proveedor.'" value="'.$i.'">'.$i.'</option>';
                            }
                    $cd.='
                                </select>
                        </td>
                    ';
                }
            }
            $cd .= '</tr>';
        }
        $cd .= '</table>';
        echo $cd; 
    }

    function validador(){
        $id_oferta = trim($this->input->post('id_oferta',true));
        $total = $this->M_evaluacion->verificar_suma_criterios($id_oferta,0);
        if($total<1){
            echo 'error_suma';
        }else{
            //validamos que el status de la oferta no sea 5 
            $total = $this->M_evaluacion->valida_step5_envio_recomendacion($id_oferta);
            if($total>=1){
                echo 'error_recomendacion';
            }else{
                echo 'ok'; 
            }
        }
    }

    function agregar_valor(){
        $id_proveedor = trim($this->input->post('id_proveedor',true));
        $id_criterio = trim($this->input->post('id_criterio',true));
        $id_oferta = trim($this->input->post('id_oferta',true));
        $valor = trim($this->input->post('valor',true));

        //validacion de que los criterios sumen 1
        $total = $this->M_evaluacion->verificar_suma_criterios($id_oferta,0);
        if($total<1){
            echo 'error_completar';
        }else{
            $result = $this->M_evaluacion->valida_criterio_x_proveedor('simu_cxproveedor',$id_criterio,$id_proveedor);
            if($result<=0){
                $array = array(
                    'id_proveedor'=>$id_proveedor,
                    'id_criterio'=>$id_criterio,
                    'valor'=>$valor,
                    'id_oferta'=>$id_oferta,
                );
                $result = $this->M_evaluacion->insert('simu_cxproveedor',$array);
                echo $result;
            }else{
                $array = array(
                    'valor'=>$valor
                );
                $result = $this->M_evaluacion->update_x_ids('simu_cxproveedor',$array,$id_proveedor,$id_criterio);
                echo $result;
            }
        }
    }

    /*
        MATRIZ NORMALIZADA
    */
    
    function armar_matriz_normalizada(){

        $id_oferta = trim($this->input->post('id_oferta',false));
        $this->M_evaluacion->delete_datos_oferta('simu_cxproveedor_step1',$id_oferta);

        $array_proveedores = $this->M_evaluacion->datos_tabla('tb_postulacion',$id_oferta,'id_oferta');
        $array_datos_proveedor = $this->M_evaluacion->datos_proveedorxoferta($id_oferta);
        $array_pesos = $this->M_evaluacion->datos_tabla('tb_criteriosxoferta',$id_oferta,'id_oferta');
        $array_datos = $this->M_evaluacion->datos_tabla_cxproveedor($id_oferta);

        $arr_result =array();
        foreach ($array_proveedores as $key1) {
            $id_proveedor      = $key1['id_proveedor'];
            $n_proveedor       = $key1['id_proveedor']; // nombre proveedor
            $numerador         = 0;  
            foreach ($array_pesos as $key2) {
                $id_peso       = $key2['id'];
                $detalle       = $key2['descripcion']; // nombre criterio
                $peso          = $key2['porcentaje'];
                $denominador       = 0 ;
                foreach ($array_datos as $key3) {
                    if($id_peso==$key3['id_criterio']){
                        if($id_proveedor==$key3['id_proveedor']){
                            $numerador=$key3['valor'];
                        }
                        $denominador+=pow(floatval($key3['valor']),2);
                    }
                }
                $denominador = round($numerador/(pow($denominador,0.5)),6);
                //break;
                //guardamos datos
                $x = array(
                    'id_proveedor'=>$id_proveedor,
                    'id_criterio'=>$id_peso,
                    'valor'=>$denominador,
                    'id_oferta'=>$id_oferta
                ); 
                $result = $this->M_simulacion->insert('simu_cxproveedor_step1',$x);
                array_push($arr_result,$x);
            }
            //break;
        }

        //Para impresión de tabla normalizada
        $cen = 'style="text-align:center;"';
        $tb = 'style=""';
        $cd = '<table '.$tb.'>';
        $cd.='<tr '.$cen.'>';
        $cd.='<td></td>';
        //Cabecera peso
        foreach ($array_pesos as $key) {
            $n_criterio      = $key['descripcion'];
            $cd.='<td>***** '.$n_criterio.' *****</td>';
        }
        $cd.='</tr>';
        foreach ($array_proveedores as $key) {
            $id_proveedor     = $key['id_proveedor'];
            $n_proveedor      = $key['id_proveedor'];
            $cd.='<tr '.$cen.'><td>'.$n_proveedor.'</td>';
            foreach ($array_pesos as $keyx) {
                $id_criterio     = $keyx['id'];
                $n_criterio      = $keyx['descripcion']; 
                foreach ($arr_result as $keyz) {
                    if($id_criterio==$keyz['id_criterio'] && $id_proveedor==$keyz['id_proveedor']){
                        $cd.='<td>'.$keyz['valor'].'</td>';
                    }
                }
            }
            $cd .= '</tr>';
        }
        $cd .= '</table>';
        echo $cd; 
    }

    function armar_matriz_normalizada_step2(){
        $id_oferta = trim($this->input->post('id_oferta',false));
        $this->M_evaluacion->delete_datos_oferta('simu_cxproveedor_step2',$id_oferta);


        $array_proveedores = $this->M_evaluacion->datos_tabla('tb_postulacion',$id_oferta,'id_oferta');
        $array_datos_proveedor = $this->M_evaluacion->datos_proveedorxoferta($id_oferta);
        $array_pesos = $this->M_evaluacion->datos_tabla('tb_criteriosxoferta',$id_oferta,'id_oferta');
        $array_datos = $this->M_simulacion->datos_tabla('simu_cxproveedor_step1');
        

        $arr_result2 =array();
        foreach ($array_proveedores as $key1) {
            $id_proveedor      = $key1['id_proveedor'];
            $n_proveedor       = $key1['id_proveedor'];
            foreach ($array_pesos as $key2) {
                $id_peso       = $key2['id'];
                $detalle       = $key2['descripcion'];
                $peso          = $key2['porcentaje'];
                $valor_       = 0 ;
                foreach ($array_datos as $key3) {
                    if($id_peso==$key3['id_criterio'] && $id_proveedor==$key3['id_proveedor']){
                        $valor_=$key3['valor']*$peso;
                    }
                }
                //guardamos datos
                $x = array(
                    'id_proveedor'=>$id_proveedor,
                    'id_criterio'=>$id_peso,
                    'valor'=>$valor_,
                    'id_oferta'=>$id_oferta
                ); 
                $result = $this->M_simulacion->insert('simu_cxproveedor_step2',$x);
                array_push($arr_result2,$x);
            }
            //break;
        }

        //Para impresión de tabla normalizada
        $cen = 'style="text-align:center;"';
        $tb = 'style=""';
        $cd = '<table '.$tb.'>';
        $cd.='<tr '.$cen.'>';
        $cd.='<td></td>';
        //Cabecera peso
        foreach ($array_pesos as $key) {
            $n_criterio      = $key['descripcion'];
            $cd.='<td>***** '.$n_criterio.' *****</td>';
        }
        $cd.='</tr>';
        foreach ($array_proveedores as $key) {
            $id_proveedor     = $key['id_proveedor'];
            $n_proveedor      = $key['id_proveedor'];
            $cd.='<tr '.$cen.'><td>'.$n_proveedor.'</td>';
            foreach ($array_pesos as $keyy) {
                $id_criterio     = $keyy['id'];
                $n_criterio      = $keyy['criterio']; 
                foreach ($arr_result2 as $keyz) {
                    if($id_criterio==$keyz['id_criterio'] && $id_proveedor==$keyz['id_proveedor']){
                        $cd.='<td>'.$keyz['valor'].'</td>';
                    }
                }
            }
            $cd .= '</tr>';
        }
        $cd .= '</table>';
        echo $cd; 
    }

    function armar_matriz_step3(){
        $id_oferta = trim($this->input->post('id_oferta',false));
        $this->M_evaluacion->delete_datos_oferta('simu_cxproveedor_step3',$id_oferta);

        //$array_proveedores = $this->M_simulacion->datos_tabla('simu_proveedor');
        $array_pesos = $this->M_evaluacion->datos_tabla('tb_criteriosxoferta',$id_oferta,'id_oferta');
        $array_datos = $this->M_simulacion->datos_tabla('simu_cxproveedor_step2');

        $arr_result2 =array();
        foreach ($array_pesos as $key2) {
            $id_criterio       = $key2['id'];
            $arr_min_max = $this->M_simulacion->min_value('simu_cxproveedor_step2',$id_criterio);
            foreach ($arr_min_max as $key) {
                $x = array(
                    'id_criterio'=>$id_criterio,
                    'minimo'=>$key['minimo'],
                    'maximo'=>$key['maximo'],
                    'id_oferta'=>$id_oferta
                ); 
                $result = $this->M_simulacion->insert('simu_cxproveedor_step3',$x);
                array_push($arr_result2,$x);
            }
        }

        $cen = 'style="text-align:center;"';
        $tb = 'style=""';
        $cd = '<table '.$tb.'>';
        $cd.='<tr'.$cen.'>';
        $cd.='<td></td>';
        //Cabecera peso
        foreach ($array_pesos as $key) {
            $n_criterio      = $key['descripcion'];
            $cd.='<td>***** '.$n_criterio.' *****</td>';
        }
        $cd.='</tr>';

        $cd .= '<tr '.$cen.'><td>V+ </td>';

        foreach ($array_pesos as $keyy) {
            $id_criterio     = $keyy['id'];
            foreach ($arr_result2 as $keyz) {
                if($id_criterio==$keyz['id_criterio']){
                    $cd.='<td>'.$keyz['maximo'].'</td>';
                }
            }
        }
        $cd .= '</tr>';

        $cd .= '<tr '.$cen.'><td>V-</td>';
        foreach ($array_pesos as $keyy) {
            $id_criterio     = $keyy['id'];
            foreach ($arr_result2 as $keyz) {
                if($id_criterio==$keyz['id_criterio']){
                    $cd.='<td>'.$keyz['minimo'].'</td>';
                }
            }
        }

        $cd .= '</tr>';

        
        $cd .= '</table>';
        echo $cd; 
    } 

    function armar_matriz_step4(){
        $id_oferta = trim($this->input->post('id_oferta',false));
        $this->M_evaluacion->delete_datos_oferta('simu_cxproveedor_step4',$id_oferta);

        $array_proveedores = $this->M_evaluacion->datos_tabla('tb_postulacion',$id_oferta,'id_oferta');
        $array_pesos = $this->M_evaluacion->datos_tabla('tb_criteriosxoferta',$id_oferta,'id_oferta');
        $array_datos = $this->M_simulacion->list_min_max('simu_cxproveedor_step2 as a','simu_cxproveedor_step3 as b');
        //$arr_result2 =array();
        foreach ($array_proveedores as $key1) {
            $id_proveedor      = $key1['id_proveedor'];
            $n_proveedor       = $key1['id_proveedor'];
            $s_min       = 0 ;
            $s_max       = 0 ;
            foreach ($array_pesos as $key2) {
                $id_peso       = $key2['id'];
                $detalle       = $key2['descripcion'];
                foreach ($array_datos as $key3) {
                    if($id_peso==$key3['id_criterio'] && $id_proveedor==$key3['id_proveedor']){
                        $s_min+=pow($key3['valor']-$key3['minimo'],2);
                        $s_max+=pow($key3['valor']-$key3['maximo'],2);
                    }
                }
            }

            //guardamos datos
            $s_min=pow($s_min,0.5);
            $s_max=pow($s_max,0.5);

            $pi = $s_min/($s_max+$s_min);
            $x = array(
                'id_proveedor'=>$id_proveedor,
                'minimo'=>$s_min,
                'maximo'=>$s_max,
                'pi'=>$pi,
                'id_oferta'=>$id_oferta
            ); 
            $result = $this->M_simulacion->insert('simu_cxproveedor_step4',$x);
            //array_push($arr_result2,$x);
            //break;
        }

        $array_datos = $this->M_evaluacion->list_step5('simu_cxproveedor_step4 as a','tb_postulacion as b',$id_oferta);
        $cen = 'style="text-align:center;"';

        $cad ='<table>';
            $cad .='<tr '.$cen.'>';
                $cad .='<td>Proveedor</td>';
                $cad .='<td>***** Si+ *****</td>';
                $cad .='<td>***** Si- *****</td>';
            $cad .='</tr>';
        foreach ($array_datos as $key) {
            $cad .='<tr '.$cen.'>';
                $cad .='<td>'.$key['id_proveedor'].'</td>';
                $cad .='<td>'.$key['maximo'].'</td>';
                $cad .='<td>'.$key['minimo'].'</td>';
            $cad .='</tr>';
        }
        $cad .='</table>';

        echo $cad;
    } 

    function armar_matriz_step5(){
        $id_oferta = trim($this->input->post('id_oferta',false));
        $array_proveedores = $this->M_evaluacion->datos_tabla('tb_postulacion',$id_oferta,'id_oferta');

        $array_datos = $this->M_evaluacion->list_step5('simu_cxproveedor_step4 as a','tb_postulacion as b',$id_oferta);
        $cen = 'style="text-align:center;"';

        $cad ='<table class="table">';
            $cad .='<tr '.$cen.'>';
                $cad .='<td>Proveedor</td>';
                //$cad .='<td>***** Si+ *****</td>';
                //$cad .='<td>***** Si- *****</td>';
                //$cad .='<td>***** PI  *****</td>';
                $cad .='<td><strong> Rank </strong></td>';
                $cad .='<td><strong> Resultado</strong></td>';
            $cad .='</tr>';
        //Realizamos la ubicación del mayor valor
        $arrr = array();
        foreach ($array_datos as $keyy) {
            array_push($arrr,$keyy['pi']);
        }
        $valor_mini = max($arrr);

        foreach ($array_datos as $key) {
            $cont = 1; 
            foreach ($array_datos as $keyx) {
                if($keyx['pi']>$key['pi']){
                    $cont++; 
                }
            }
            $cad .='<tr>';
                $cad .='<td>'.$key['razon_social'].'</td>';
                //$cad .='<td>'.$key['maximo'].'</td>';
                //$cad .='<td>'.$key['minimo'].'</td>';
                //$cad .='<td>'.$key['pi'].'</td>';
                $cad .='<td '.$cen.'>'.$cont.'</td>';
                if($key['pi']==$valor_mini){
                    if($key['estado_cierre']==5){
                        $cad .='<td '.$cen.'><button class="btn btn-sm btn-warning"><i class="fas fa-mail-bulk"></i> Recomendaciòn enviada </button></td>';
                    }else{
                        $cad .='<td '.$cen.'><button class="btn btn-sm btn-secondary" onclick="enviar_notificacion_cliente('.$id_oferta.','.$key['id_proveedor'].','.$key['id'].');"><i class="fas fa-mail-bulk"></i> Enviar recomendación a cliente </button></td>';
                    }
                }else{
                    $cad .='<td '.$cen.'></td>';
                }
            $cad .='</tr>';
        }
        $cad .='</table>';

        echo $cad;
    } 

    //Notificación CLiente
    function enviar_notificacion_cliente(){
        $id_oferta = trim($this->input->post('id_oferta',false));
        $id_proveedor = trim($this->input->post('id_proveedor',false));
        $id = trim($this->input->post('id',false));

        if($id_oferta!=''){
            if($id_proveedor!=''){
                $arr = array(
                    'estado_cierre'=>5
                );
                $res = $this->M_evaluacion->update('simu_cxproveedor_step4',$arr,$id);
                if($res){
                    $valida = 'ok';
                }else{
                    $valida = 'error';
                }
            }else{
                $valida='error';
            }
        }else{
            $valida='error';
        }
        
        $ar['valida']=$valida;
        echo json_encode($ar);
    }

    function aceptar_recomendacion(){
        $id_oferta = trim($this->input->post('id_oferta',false));
        $id_proveedor = trim($this->input->post('id_proveedor',false));
        if($id_oferta!=''){
            if($id_proveedor!=''){
                $arr = array(
                    'estado_cierre'=>1
                );
                $res = $this->M_evaluacion->update_x_ids_aceptado('simu_cxproveedor_step4',$arr,$id_oferta,$id_proveedor);
                if($res){
                    $valida = 'ok';
                }else{
                    $valida = 'error';
                }
            }else{
                $valida='error';
            }
        }else{
            $valida='error';
        }
        
        $ar['valida']=$valida;
        echo json_encode($ar);
    }

    //Fin de lo uso



    function get_total_postulados(){
        $total = $this->M_evaluacion->get_all_postulacion_usuario($_SESSION['_SESSIONUSER']);  
        echo $total;       
    }

    function load_filtro_paginacion(){
        $pag = trim($this->input->post('pag',false));
        if($pag!=''){
            $_SESSION['_SESSION_PAG']=$pag;
            echo 'si';
        }else{
            unset($_SESSION['_SESSION_PAG']);
            echo 0;
        }
    }


    function registrar_postulacion(){
        $id_oferta = trim($this->input->post('id_oferta',true));
        // Carga de documento o adjunto 
        $config=[
            'upload_path'=> "./uploads/propuestas",
            'allowed_types'=> 'pdf|doc|docx',
            'file_name' => 'PROPUESTA_'.date('Ymd_His')
        ];
        $total = 0 ; 
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')){
            $data=array("upload_data"=>$this->upload->data());
            $nombre=$data['upload_data']['file_name'];
            $array = array(
                'id_oferta'=>$id_oferta,
                'archivo'=>$nombre,
                'f_registro'=>date('Y-m-d H:i:s'),
                'id_proveedor'=>$_SESSION['_SESSIONUSER']
            );
            $res = $this->Mdl_compartido->insert_table('tb_postulacion',$array);
            if($res>0){
                $valida= 'ok';
            }else{
                $valida= 'error_registro';
            }       
        }else{
            //$valida='no'.$this->upload->display_errors();
            $valida= 'error_extension';
            //$this->upload->display_errors();;
        }   

        $ar['valida'] = $valida;
        //$ar['imagen'] = $nombre;
        $dato_json   = json_encode($ar);
        echo $dato_json; 

        // Datas_
        /*if($id_oferta!=''){
            $id_proveedor = $_SESSION['_SESSIONUSER'];
            if($id_proveedor!=''){
                $array = array(
                    'id_proveedor'=>$id_proveedor,
                    'id_oferta'=>$id_oferta,
                    'f_registro'=>date('Y-m-d H:i:s')
                );
                $res = $this->M_evaluacion->insert('tb_postulacion',$array);
                if($res){
                    echo 'ok';
                }else{
                    echo 'error_registro';
                }
            }else{
                echo 'error_usuario';
            }
        }else{
            echo 'error_vacio';
        }*/
    }

    /*-------------- POSTULACIÓN  --------------*/
    function load_filtro_paginacion_postulados(){
        $pag = trim($this->input->post('pag',false));
        if($pag!=''){
            $_SESSION['_SESSION_PAG_POSTULACION']=$pag;
            echo 'si';
        }else{
            unset($_SESSION['_SESSION_PAG_POSTULACION']);
            echo 0;
        }
    }

    function get_postulacion(){
        $t_vista = 10; // total por visita
        if(isset($_SESSION['_SESSION_PAG_POSTULACION'])){
            $pag = $_SESSION['_SESSION_PAG_POSTULACION']; 
        }else{
            $pag = 1; 
        }

        $limite = $t_vista * $pag;
        $inicio = ($pag-1)*$t_vista; 

        $ar['limite']=$limite;
        $ar['inicio']=$inicio;

        //Armar listado
        //Separamos los casos postulados
        
        //$arr_ids = $this->M_evaluacion->get_all_postulacion_usuario($_SESSION['_SESSIONUSER']);
        $arr_ids = 'error';
        $resultado = $this->M_evaluacion->get_postulacion($inicio,$limite,$arr_ids);
        $cadena = '';
        $cont_ofertas=0; 
        if($resultado!='error'){
            foreach ($resultado as $key) {
                $cont_ofertas++; 
                $cadena.='
                    <tr>
                        <td style="width: 50px;">
                            <div class="font-size-22 text-success">
                                <i class="far fa-hand-point-right"></i>
                            </div>
                        </td>                                                        
                        <td>
                            <div>
                                <h5 class="font-size-14 mb-1">'.$key->razon_social.'</h5>
                                <p class="text-muted mb-0 font-size-12">Oferta: '.$key->descripcion.'</p>
                            </div>
                        </td>
                        <td>
                            <div>
                                <p class="text-muted mb-0 font-size-12">Fecha Inicio: '.$key->f_inicio.'</p>
                                <p class="text-muted mb-0 font-size-12">Fecha Fin: '.$key->f_fin.'</p>
                            </div>
                        </td>
                        <td>
                            <div>
                                <h5 class="font-size-14 mb-1">Postulantes</h5>
                                <p class="text-muted mb-0 font-size-12">05 Proveedores</p>
                            </div>
                        </td>  
                        <td>
                            <div>
                                <button title="Ver requerimientos de la oferta." class="btn btn-sm btn-secondary" onclick="ver_requerimientos_postulados('.$key->id.');"> <i class="fas fa-eye"></i> Ver</button>
                                <a title="Descargar propuesta enviada" class="btn btn-sm btn-secondary" href="'.base_url().'uploads/propuestas/'.$key->archivo.'" download="PROPUESTA_"><i class="bx bx-file"></i></a>
                            </div>
                        </td>                                                                                                                                                                                                                                
                    </tr>                
                '; 
            }
        }

        //Armar paginación
            //Obtenemos totales de registros
        $total = $this->M_evaluacion->get_all_postulacion($arr_ids);
        $division = $total / $t_vista;
        $cadena2='';  
        for ($i=0; $i < $division; $i++) { 
            $p = $i+1; 
            if($p==$pag){
                $cadena2 .= '
                    <li class="page-item active"><a class="page-link" href="javascript::void(0);" onclick="load_filtro_paginacion_postulados('.$p.');">'.$p.'</a></li>
                ';
            }else{
                $cadena2 .= '
                    <li class="page-item"><a class="page-link" href="javascript::void(0);" onclick="load_filtro_paginacion_postulados('.$p.');">'.$p.'</a></li>
                ';                
            }
        }

        //Resultados
        $cont_ofertas = ($t_vista * ($pag-1)) + ($cont_ofertas); 
        $resultado = ' Viendo '.$cont_ofertas.' de '.$total.' postulaciones';


        $ar['total_postulacion']=count($arr_ids);
        $ar['lst_ofertas_disponibles_postulacion']=$cadena;
        $ar['lst_ofertas_paginacion_postulacion']=$cadena2;
        $ar['total_ofertas']=$total;
        $ar['resultado']=$resultado;
        echo json_encode($ar);
    }

    function ver_requerimientos_postulados(){
        $id = trim($this->input->post('id',false));
        $resultado = $this->M_evaluacion->get_requerimientos($id);
        $cadena=''; 
        if($resultado!='error'){
            $contador=0;
            foreach ($resultado as $key) {
                $contador++;

                if($contador==1){
                    $cadena.='
                    <table class="table align-middle table-nowrap table-borderless">
                        <tr>
                            <td style="width: 50px;">
                                <div class="font-size-22 text-success">
                                    <i class="far fa-hand-point-right"></i>
                                </div>
                            </td>                                                        
                            <td>
                                <div>
                                    <h5 class="font-size-14 mb-1">'.$key->razon_social.'</h5>
                                    <p class="text-muted mb-0 font-size-12">Oferta: '.$key->proyecto.'</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <p class="text-muted mb-0 font-size-12">Fecha Inicio: '.$key->f_inicio.'</p>
                                    <p class="text-muted mb-0 font-size-12">Fecha Fin: '.$key->f_fin.'</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <h5 class="font-size-14 mb-1">Postulantes</h5>
                                    <p class="text-muted mb-0 font-size-12">05 Proveedores</p>
                                </div>
                            </td>  
                            <td>
                                <div>
                                    <button class="btn btn-sm btn-secondary"><i class="fas fa-hand-paper"></i> Postular</button>
                                </div>
                            </td>                                                                                                                                                                                                                                
                        </tr>      
                    </table>           
                    ';
                }

                $cadena.='
                    <div class="mt-0">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm m-auto">
                                <span class="avatar-title rounded-circle bg-soft-light text-dark font-size-16">
                                    '.$contador.'
                                </span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <span class="font-size-16">'.$key->descripcion.'</span>
                            </div>
                        </div>
                    </div>                
                ';
            }

            $cadena.='<div style="margin-top:20px;"><button class="btn btn-sm btn-secondary" onclick="regresar_panel(2);"> <i class="fas fa-arrow-circle-left"></i> Regresar </button></div>';

            $ar['lst_ofertas_requerimiento']=$cadena;
            echo json_encode($ar);
        }else{
            $cadena.='<div style="margin-top:20px;"><button class="btn btn-sm btn-secondary" onclick="regresar_panel(2);"> <i class="fas fa-arrow-circle-left"></i> Regresar </button></div>';
            $ar['lst_ofertas_requerimiento']=$cadena;
            echo json_encode($ar);
        }
    }
}

?>
