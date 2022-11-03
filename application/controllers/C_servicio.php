<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class C_servicio extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
        $this->load->model('Mdl_compartido');
        $this->load->model('M_servicio');
        date_default_timezone_set('America/Lima');
    }

    public function index(){
        $permiso = $this->Mdl_compartido->permisos_controlador('servicio');
        if (!$permiso)
            redirect('');
        
        if(!isset($_SESSION['_SESSIONUSER'])){
            redirect('login');
        }

        $header['menu'] = $this->Mdl_compartido->permisos_menu();
        $header['menu_activo'] = 'servicio';
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
        $this->load->view('v_servicio_proveedor', $data);
        $this->load->view('layouts/v_footer');

    }

    function obtener_resumen(){
        $result = $this->M_servicio->get_all_data('tb_servicio_proveedor');
        echo $result;
    }

    function obtener_datos(){
        $id = trim($this->input->post('id',true));

        $valida = $this->M_servicio->validar_x_id('tb_servicio_proveedor',$id);
        
        if($valida>0){
            $result = $this->M_servicio->get_data_x_id('tb_servicio_proveedor',$id);
            foreach ($result as $key) {
                $ar['descripcion']=$key->descripcion; 
            }            
            echo json_encode($ar); 
        }else{
            echo 'noexiste';
        }
    }

    function registrar(){
        $des = trim($this->input->post('des',true));

        $valida = $this->M_servicio->validar('tb_servicio_proveedor',$des,0);
        
        if($valida<=0){
            $array = array(
                'descripcion'=>$des,
                'f_registro'=>date('Y-m-d H:m:s'),
                'estado'=>0,
                'id_proveedor'=>$_SESSION['_SESSIONUSER']
            );
    
            $result = $this->M_servicio->insert('tb_servicio_proveedor',$array);
            if($result>0){
                $result = $this->Mdl_compartido->get_all_data('tb_servicio_proveedor','id_proveedor');
                echo $result;
            }else{
                echo 'error';
            }
        }else{
            echo 'duplicado';
        }
    }

    function actualizar(){
        $des = trim($this->input->post('des',true));
        $id = trim($this->input->post('id',true));

        $valida = $this->M_servicio->validar('tb_servicio_proveedor',$des,$id);
        
        if($valida<=0){
            $array = array(
                'descripcion'=>$des,
                'f_upd'=>date('Y-m-d H:m:s'),
                'estado'=>0
            );
    
            $result = $this->M_servicio->update('tb_servicio_proveedor',$array,$id);
            echo $result;
        }else{
            echo 'duplicado';
        }
    }

    public function listar_registros()
    {
        if (!empty($_POST))
        {
            $fetch_data = $this->M_servicio->make_datatables('tb_servicio_proveedor');
            $data = array();
            $contador=0; 
            foreach($fetch_data as $row)
            {
                $contador++; 
                $sub_array = array();
                $sub_array[] = $contador;
                $sub_array[] = $row->descripcion;
                $sub_array[] = $row->f_registro;
                $sub_array[] = '
                    <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" onclick="editar('.$row->id.')"><i class="bx bx-edit-alt"></i></button>
                    <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" onclick="eliminar('.$row->id.');"><i class="bx bx-trash"></i></button>
                ';
                $data[] = $sub_array;
            }
            $output = array(
                "draw"                    =>     intval($_POST["draw"]),
                "recordsTotal"          =>      $this->M_servicio->get_all_data('tb_servicio_proveedor'),
                "recordsFiltered"     =>     $this->M_servicio->get_filtered_data('tb_servicio_proveedor'),
                "data"                    =>     $data
            );
            echo json_encode($output);
        }
    }

    function listar(){
        $result = $this->M_servicio->list('tb_servicio_proveedor');
        $cadena='';
        $contador=0;
        if($result!='error'){
            foreach ($result as $key) {
                $contador++; 
                $cadena.='
                <tr>
                    <th scope="row">'.$contador.'</th>
                    <td>'.$key->descripcion.'</td>
                    <td>'.$key->f_registro.'</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" onclick="editar('.$key->id.')"><i class="bx bx-edit-alt"></i></button>
                        <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" onclick="eliminar('.$key->id.');"><i class="bx bx-trash"></i></button>
                    </td>
                </tr>                
                ';
            }
            echo $cadena; 
        }else{
            echo '<td><tr>Sin resultados</tr></td>';
        }
    }

    function eliminar(){
        $id = trim($this->input->post('id',true));

        $resultado = $this->M_servicio->eliminar('tb_servicio_proveedor',$id);
        
        if($resultado<=0){
            echo 'error';
        }else{
            $result = $this->Mdl_compartido->get_all_data('tb_servicio_proveedor','id_proveedor');
            echo $result;
        }
    }
}

?>
