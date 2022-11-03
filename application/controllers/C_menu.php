<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class C_menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
        $this->load->model('Mdl_compartido');
        $this->load->model('M_perfil');
        date_default_timezone_set('America/Lima');
    }

    public function index(){
        $permiso = $this->Mdl_compartido->permisos_controlador('perfil');
        if (!$permiso)
            redirect('');
        
        if(!isset($_SESSION['_SESSIONUSER'])){
            redirect('login');
        }

        $header['menu'] = $this->Mdl_compartido->permisos_menu();
        $header['menu_activo'] = 'perfil';

        //Obtenemos el permiso de usuario logueado
        $data['foto'] = $this->Mdl_compartido->retornarcampo($_SESSION['_SESSIONUSER'],'coduser','tb_usuarios2','foto');
        $tipo_user = $this->Mdl_compartido->retornarcampo($_SESSION['_SESSIONUSER'],'coduser','tb_usuarios2','tipo_user');
        $data['tipo_user'] = $tipo_user;
        $header['tipo_user'] = $tipo_user;
        $header['total_certificado'] = $this->Mdl_compartido->get_all_data('tb_certificado_proveedor','id_proveedor');
        $header['total_servicio'] = $this->Mdl_compartido->get_all_data('tb_servicio_proveedor','id_proveedor');

        $data['lst_categoria'] = $this->M_perfil->get_data('tb_categoria');

        
        $data['datos']='';
        $header['datos_header']='';
        $header['lang']='en';
        $this->load->view('layouts/v_head',$header);
        //$this->load->view('layouts/menu.php',$header);
        $this->load->view('layouts/horizontal-menu',$header);
        $this->load->view('v_menu', $data);
        $this->load->view('layouts/v_footer');

    }
}

?>
