<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class C_ofertas_proveedor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
        $this->load->model('Mdl_compartido');
        $this->load->model('M_ofertas_proveedor');
        date_default_timezone_set('America/Lima');
    }

    public function index(){
        $permiso = $this->Mdl_compartido->permisos_controlador('ofertas_proveedor');
        if (!$permiso)
            redirect('');
        
        if(!isset($_SESSION['_SESSIONUSER'])){
            redirect('login');
        }

        $header['menu'] = $this->Mdl_compartido->permisos_menu();
        $header['menu_activo'] = 'ofertas_proveedor';
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
        $this->load->view('v_ofertas_proveedor', $data);
        $this->load->view('layouts/v_footer');

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

        //Armar listado
        //Separamos los casos postulados
        
        $arr_ids = $this->M_ofertas_proveedor->get_all_postulacion_usuario($_SESSION['_SESSIONUSER']);
        $resultado = $this->M_ofertas_proveedor->get_ofertas($inicio,$limite,$arr_ids);
        $cadena = '';
        $cont_ofertas=0; 
        if($resultado!='error'){
            foreach ($resultado as $key) {
                $cont_ofertas++; 
                $cadena.='
                    <tr>
                        <td style="width: 50px;">
                            <div class="font-size-22 text-success">
                                <i class="fas fa-hourglass-start"></i>
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
                                <button class="btn btn-sm btn-secondary" onclick="ver_requerimientos('.$key->id.');"> <i class="fas fa-eye"></i> Ver</button>
                                <button class="btn btn-sm btn-secondary" onclick="abrir_modal_postulacion('.$key->id.');"> <i class=" fas fa-hand-paper"></i> Postular</button>
                            </div>
                        </td>                                                                                                                                                                                                                                
                    </tr>                
                '; 
            }
        }

        //Armar paginación
            //Obtenemos totales de registros
        $total = $this->M_ofertas_proveedor->get_all_ofertas($arr_ids);
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
        $resultado = ' Viendo '.$cont_ofertas.' de '.$total.' ofertas';


        $ar['total_postulacion']=count($arr_ids);
        $ar['lst_ofertas_disponibles']=$cadena;
        $ar['lst_ofertas_paginacion']=$cadena2;
        $ar['total_ofertas']=$total;
        $ar['resultado']=$resultado;
        echo json_encode($ar);
    }

    function get_total_postulados(){
        $total = $this->M_ofertas_proveedor->get_all_postulacion_usuario($_SESSION['_SESSIONUSER']);  
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

    function ver_requerimientos(){
        $id = trim($this->input->post('id',false));
        $resultado = $this->M_ofertas_proveedor->get_requerimientos($id);
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
                                    <i class="fas fa-hourglass-start"></i>
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
                            <!--<td>
                                <div>
                                    <h5 class="font-size-14 mb-1">Postulantes</h5>
                                    <p class="text-muted mb-0 font-size-12">05 Proveedores</p>
                                </div>
                            </td>-->  
                            <td>
                                <div>
                                    <!--<button class="btn btn-sm btn-secondary" onclick="abrir_modal_postulacion('.$key->id.');"><i class="fas fa-hand-paper"></i> Postular</button>-->
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

            $cadena.='<div style="margin-top:20px;"><button class="btn btn-sm btn-secondary" onclick="regresar_panel(1);"> <i class="fas fa-arrow-circle-left"></i> Regresar </button></div>';

            $ar['lst_ofertas_requerimiento']=$cadena;
            echo json_encode($ar);
        }else{
            $cadena.='<div style="margin-top:20px;"><button class="btn btn-sm btn-secondary" onclick="regresar_panel(1);"> <i class="fas fa-arrow-circle-left"></i> Regresar </button></div>';
            $ar['lst_ofertas_requerimiento']=$cadena;
            echo json_encode($ar);
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
                $res = $this->M_ofertas_proveedor->insert('tb_postulacion',$array);
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
        
        //$arr_ids = $this->M_ofertas_proveedor->get_all_postulacion_usuario($_SESSION['_SESSIONUSER']);
        $arr_ids = 'error';
        $resultado = $this->M_ofertas_proveedor->get_postulacion($inicio,$limite,$arr_ids);
        $cadena = '';
        $cont_ofertas=0; 
        if($resultado!='error'){
            foreach ($resultado as $key) {
                $cont_ofertas++; 
                $cadena.='
                    <tr>
                        <td style="width: 50px;">
                            <div class="font-size-22 text-success">
                                <i class="fas fa-hourglass-start"></i>
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
        $total = $this->M_ofertas_proveedor->get_all_postulacion($arr_ids);
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
        $resultado = $this->M_ofertas_proveedor->get_requerimientos($id);
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
                                    <i class="fas fa-hourglass-start"></i>
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
