<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class C_ofertas_cliente extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
        $this->load->model('Mdl_compartido');
        $this->load->model('M_ofertas_cliente');
        date_default_timezone_set('America/Lima');
    }

    public function index(){
        $permiso = $this->Mdl_compartido->permisos_controlador('ofertas_cliente');
        if (!$permiso)
            redirect('');
        
        if(!isset($_SESSION['_SESSIONUSER'])){
            redirect('login');
        }

        $header['menu'] = $this->Mdl_compartido->permisos_menu();
        $header['menu_activo'] = 'ofertas_cliente';
        $tipo_user = $this->Mdl_compartido->retornarcampo($_SESSION['_SESSIONUSER'],'coduser','tb_usuarios2','tipo_user');
        $data['tipo_user'] = $tipo_user;
        $header['tipo_user'] = $tipo_user;
        //$header['total_certificado'] = $this->M_ofertas_cliente->get_all_data('tb_certificado_proveedor','id_cliente');
        //$header['total_servicio'] = $this->M_ofertas_cliente->get_all_data('tb_ofertas_cliente','id_cliente');

        $data['datos']='';
        $header['datos_header']='';
        $header['lang']='en';
        $this->load->view('layouts/v_head',$header);
        //$this->load->view('layouts/menu.php',$header);
        $this->load->view('layouts/horizontal-menu',$header);
        $this->load->view('v_ofertas_cliente', $data);
        $this->load->view('layouts/v_footer');

    }

    function obtener_resumen(){
        $result = $this->M_ofertas_cliente->get_all_data('tb_ofertas_cliente','id_cliente');
        echo $result;
    }

    function obtener_datos(){
        $id = trim($this->input->post('id',true));
        $_SESSION['_SESSION_ID_OFERTA']=$id;
        $valida = $this->M_ofertas_cliente->validar_x_id('tb_ofertas_cliente',$id);
        
        if($valida>0){
            $result = $this->M_ofertas_cliente->get_data_x_id('tb_ofertas_cliente',$id);
            foreach ($result as $key) {
                $ar['descripcion']=$key->descripcion; 
                $ar['f_inicio']=$key->f_inicio; 
                $ar['f_fin']=$key->f_fin; 
            }            
            echo json_encode($ar); 
        }else{
            echo 'noexiste';
        }
    }

    function registrar(){
        $t_nombre = trim($this->input->post('t_nombre',true));
        $t_f_inicio = trim($this->input->post('t_f_inicio',true));
        $t_f_fin = trim($this->input->post('t_f_fin',true));

        $valida = $this->M_ofertas_cliente->validar('tb_ofertas_cliente',$des,0);
        
        if($valida<=0){
            $array = array(
                'descripcion'=>$t_nombre,
                'f_inicio'=>$t_f_inicio,
                'f_fin'=>$t_f_fin,
                'f_registro'=>date('Y-m-d H:i:s'),
                'estado'=>0,
                'id_cliente'=>$_SESSION['_SESSIONUSER']
            );
    
            $result = $this->M_ofertas_cliente->insert('tb_ofertas_cliente',$array);
            if($result>0){
                $result = $this->M_ofertas_cliente->get_all_data('tb_ofertas_cliente','id_cliente');
                echo $result;
            }else{
                echo 'error';
            }
        }else{
            echo 'duplicado';
        }
    }

    function actualizar(){
        $t_nombre = trim($this->input->post('t_nombre',true));
        $t_f_inicio = trim($this->input->post('t_f_inicio',true));
        $t_f_fin = trim($this->input->post('t_f_fin',true));

        $valida = $this->M_ofertas_cliente->validar('tb_ofertas_cliente',$des,$_SESSION['_SESSION_ID_OFERTA']);
        
        if($valida<=0){
            $array = array(
                'descripcion'=>$t_nombre,
                'f_inicio'=>$t_f_inicio,
                'f_fin'=>$t_f_fin,
                'f_upd'=>date('Y-m-d H:i:s')
            );
    
            $result = $this->M_ofertas_cliente->update('tb_ofertas_cliente',$array,$_SESSION['_SESSION_ID_OFERTA']);
            echo $result;
        }else{
            echo 'duplicado';
        }
    }

    public function listar_registros()
    {
        if (!empty($_POST))
        {
            $fetch_data = $this->M_ofertas_cliente->make_datatables('tb_ofertas_cliente');
            $data = array();
            $contador=0; 
            foreach($fetch_data as $row)
            {
                $contador++; 
                $sub_array = array();
                $sub_array[] = $contador;
                $sub_array[] = $row->descripcion;
                $sub_array[] = $row->total;
                $sub_array[] = $row->f_inicio;
                $sub_array[] = $row->f_fin;
                $sub_array[] = '
                    <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" title="Editar Oferta" onclick="editar('.$row->id.')"><i class="bx bx-edit-alt"></i></button>
                    <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" title="Eliminar Oferta" onclick="eliminar('.$row->id.');"><i class="bx bx-trash"></i></button>
                ';
                $data[] = $sub_array;
            }
            $output = array(
                "draw"                    =>     intval($_POST["draw"]),
                "recordsTotal"          =>      $this->M_ofertas_cliente->get_all_data('tb_ofertas_cliente','id_cliente'),
                "recordsFiltered"     =>     $this->M_ofertas_cliente->get_filtered_data('tb_ofertas_cliente'),
                "data"                    =>     $data
            );
            echo json_encode($output);
        }
    }

    function listar(){
        $result = $this->M_ofertas_cliente->list('tb_ofertas_cliente');
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

        $resultado = $this->M_ofertas_cliente->eliminar('tb_ofertas_cliente',$id);
        
        if($resultado<=0){
            echo 'error';
        }else{
            $result = $this->M_ofertas_cliente->get_all_data('tb_ofertas_cliente','id_cliente');
            echo $result;
        }
    }

    public function obtener_indicadores(){
        $id = $_SESSION['_SESSIONUSER']; 
        if($id>0){
            $result = $this->M_ofertas_cliente->get_data_indicador('tb_ofertas_cliente',$id,'id_cliente');
            $total_requerimientos = $this->M_ofertas_cliente->get_data_indicador_req($id);
            $total = 0 ;
            $total_disponibles = 0 ;
            $total_finalizadas = 0 ;
            $fe = date('Y-m-d H:i:s');

            foreach ($result as $key) {
                $total++; 
                if($key->f_fin>$fe){
                    $total_finalizadas++;
                }else{
                    $total_disponibles++;
                }
            }            
            $ar['total']=$total; 
            $ar['total_finalizadas']=$total_finalizadas; 
            $ar['total_disponibles']=$total_disponibles; 
            $ar['total_requerimientos']=$total_requerimientos; 
            echo json_encode($ar); 
        }else{
            $ar['total']=0; 
            $ar['total_finalizadas']=0; 
            $ar['total_disponibles']=0; 
            $ar['total_requerimientos']=0; 
            echo json_encode($ar); 
        }
    }
}

?>
