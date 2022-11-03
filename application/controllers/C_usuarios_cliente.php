<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class C_usuarios_cliente extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
        $this->load->model('Mdl_compartido');
        $this->load->model('M_usuarios_cliente');
        date_default_timezone_set('America/Lima');
    }

    public function index(){
        $permiso = $this->Mdl_compartido->permisos_controlador('usuariosxcliente');
        if (!$permiso)
            redirect('');
        
        if(!isset($_SESSION['_SESSIONUSER'])){
            redirect('login');
        }

        $header['menu'] = $this->Mdl_compartido->permisos_menu();
        $header['menu_activo'] = 'usuariosxcliente';
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
        $this->load->view('v_usuarios_cliente', $data);
        $this->load->view('layouts/v_footer');

    }

    public function registrar(){
        $n_nombres = trim($this->input->post('n_nombres'));
        $n_apellidos = trim($this->input->post('n_apellidos'));
        $n_dni = trim($this->input->post('n_dni'));
        $n_correo = trim($this->input->post('n_correo'));
        $n_celular = trim($this->input->post('n_celular'));
        $n_usuario = trim($this->input->post('n_usuario'));
        $n_clave = trim($this->input->post('n_clave'));

        $val1 = $this->M_usuarios_cliente->validar('tb_usuarios2',$n_dni,'dni');
        if($val1<=0){
            $val1 = $this->M_usuarios_cliente->validar('tb_usuarios2',$n_usuario,'usuario');
            if($val1<=0){
                $clave = $this->Mdl_compartido->encriptar($n_clave);
                $array = array(
                    'nombres'=>$n_nombres,
                    'apellidos'=>$n_apellidos,
                    'dni'=>$n_dni,
                    'correo'=>$n_correo,
                    'telefono'=>$n_celular,
                    'usuario'=>$n_usuario,
                    'fecha_alta'=>date('Y-m-d H:i:s'),
                    'estado'=>1,
                    'clave'=>$clave,
                    'idjefe'=>$_SESSION['_SESSIONUSER'],
                    'tipo_user'=>5,
                );
        
                $result = $this->M_usuarios_cliente->insert('tb_usuarios2',$array);
                if($result>0){
                    $result = $this->Mdl_compartido->get_all_data('tb_usuarios2','idjefe');
                    echo $result;
                }else{
                    echo 'error';
                }
            }else{
                echo 'user_no_disponible';
            }
        }else{
            echo 'dni_registrado';
        }
    }

    public function listar_registros(){
        if (!empty($_POST))
        {
            $fetch_data = $this->M_usuarios_cliente->make_datatables('tb_usuarios2');
            $data = array();
            $contador=0; 
            foreach($fetch_data as $row)
            {
                $contador++; 
                $sub_array = array();
                $sub_array[] = $contador;
                $sub_array[] = $row->nombres;
                $sub_array[] = $row->apellidos;
                $sub_array[] = $row->dni;
                $sub_array[] = $row->usuario;
                if($row->estado==1){
                    $sub_array[] = 'Activo';
                }else{
                    $sub_array[] = 'Inactivo';
                }
                $sub_array[] = '
                    <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" onclick="editar('.$row->coduser.')"><i class="bx bx-edit-alt"></i></button>
                    <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" onclick="eliminar('.$row->coduser.');"><i class="bx bx-trash"></i></button>
                ';
                $data[] = $sub_array;
            }
            $output = array(
                "draw"                    =>     intval($_POST["draw"]),
                "recordsTotal"          =>      $this->M_usuarios_cliente->get_all_data('tb_usuarios2'),
                "recordsFiltered"     =>     $this->M_usuarios_cliente->get_filtered_data('tb_usuarios2'),
                "data"                    =>     $data
            );
            echo json_encode($output);
        }
    }

    public function obtener_datos(){
        $id = trim($this->input->post('id',true));

        $valida = $this->Mdl_compartido->validar_x_id('tb_usuarios2',$id,'coduser');
        
        if($valida>0){
            $result = $this->Mdl_compartido->get_data_x_id('tb_usuarios2',$id,'coduser');
            foreach ($result as $key) {
                $ar['nombres']=$key->nombres;
                $ar['apellidos']=$key->apellidos;
                $ar['dni']=$key->dni;
                $ar['correo']=$key->correo;
                $ar['telefono']=$key->telefono;
                $ar['usuario']=$key->usuario;
                $ar['estado']=$key->estado;
                $ar['clave']=$key->clave;
            }            
            echo json_encode($ar); 
        }else{
            echo 'noexiste';
        }
    }

    public function actualizar(){
        $n_nombres = trim($this->input->post('n_nombres'));
        $n_apellidos = trim($this->input->post('n_apellidos'));
        $n_dni = trim($this->input->post('n_dni'));
        $n_correo = trim($this->input->post('n_correo'));
        $n_celular = trim($this->input->post('n_celular'));
        $n_usuario = trim($this->input->post('n_usuario'));
        $n_clave = trim($this->input->post('n_clave'));
        $n_estado = trim($this->input->post('n_estado'));
        $id = trim($this->input->post('id',true));

        //$valida = $this->Mdl_compartido->validar_x_id_campo('tb_usuarios2',$n_dni,$id,'dni','coduser');
        
        //if($valida<=0){
            if($n_clave!=''){
                $clave = $this->Mdl_compartido->encriptar($n_clave);
                $array = array(
                    'nombres'=>$n_nombres,
                    'apellidos'=>$n_apellidos,
                    'dni'=>$n_dni,
                    'correo'=>$n_correo,
                    'telefono'=>$n_celular,
                    'clave'=>$n_clave,
                    'estado'=>$n_estado,
                    'f_upd'=>date('Y-m-d H:i:s'),
                    'estado'=>1
                );
                $result = $this->M_usuarios_cliente->update('tb_usuarios2',$array,$id);
            }else{
                $clave = '';
                $array = array(
                    'nombres'=>$n_nombres,
                    'apellidos'=>$n_apellidos,
                    'dni'=>$n_dni,
                    'correo'=>$n_correo,
                    'telefono'=>$n_celular,
                    'estado'=>$n_estado,
                    'f_upd'=>date('Y-m-d H:i:s'),
                    'estado'=>1
                );
                $result = $this->M_usuarios_cliente->update('tb_usuarios2',$array,$id);
                echo $result;
            }
        //}else{
        //    echo 'duplicado';
        //}
    }




    /*OTROS*/
    function obtener_resumen(){
        $result = $this->M_usuarios_cliente->get_all_data('tb_servicio_proveedor');
        echo $result;
    }





 



    function listar(){
        $result = $this->M_usuarios_cliente->list('tb_servicio_proveedor');
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

        $resultado = $this->M_usuarios_cliente->eliminar('tb_usuarios2',$id);
        
        if($resultado<=0){
            echo 'error';
        }else{
            $result = $this->Mdl_compartido->get_all_data('tb_usuarios2','coduser');
            echo $result;
        }
    }
}

?>
