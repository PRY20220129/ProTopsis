<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class C_requerimiento extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
        $this->load->model('Mdl_compartido');
        $this->load->model('M_requerimiento');
        date_default_timezone_set('America/Lima');
    }

    function obtener_datos(){
        $id = trim($this->input->post('id',true));

        $valida = $this->M_requerimiento->validar_x_id('tb_ofertas_requerimiento',$id);
        
        if($valida>0){
            $result = $this->M_requerimiento->get_data_x_id('tb_ofertas_requerimiento',$id);
            foreach ($result as $key) {
                $ar['descripcion']=$key->descripcion; 
            }            
            echo json_encode($ar); 
        }else{
            echo 'noexiste';
        }
    }

    function registrar(){
        $des = trim($this->input->post('t_requerimiento',true));

        $valida = $this->M_requerimiento->validar('tb_ofertas_requerimiento',$des,0);
        
        if($valida<=0){
            $array = array(
                'descripcion'=>$des,
                'f_registro'=>date('Y-m-d H:i:s'),
                'id_oferta'=>$_SESSION['_SESSION_ID_OFERTA']
            );
    
            $result = $this->M_requerimiento->insert('tb_ofertas_requerimiento',$array);
            if($result>0){
                $result = $this->M_requerimiento->get_all_data('tb_ofertas_requerimiento','id_oferta');
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

        $valida = $this->M_requerimiento->validar('tb_ofertas_requerimiento',$des,$id);
        
        if($valida<=0){
            $array = array(
                'descripcion'=>$des,
                'f_upd'=>date('Y-m-d H:i:s')
            );
    
            $result = $this->M_requerimiento->update('tb_ofertas_requerimiento',$array,$id);
            echo $result;
        }else{
            echo 'duplicado';
        }
    }

    public function listar_registros()
    {
        if (!empty($_POST))
        {
            $fetch_data = $this->M_requerimiento->make_datatables('tb_ofertas_requerimiento');
            $data = array();
            $contador=0; 
            foreach($fetch_data as $row)
            {
                $contador++; 
                $sub_array = array();
                $sub_array[] = $contador;
                $sub_array[] = $row->descripcion;
                $sub_array[] = '
                    <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" title="Editar requerimiento" onclick="editar_requerimiento('.$row->id.')"><i class="bx bx-edit-alt"></i></button>
                    <button type="button" class="btn btn-sm btn-danger waves-effect waves-light" title="Eliminar requerimiento" onclick="eliminar_requerimiento('.$row->id.');"><i class="bx bx-trash"></i></button>
                ';
                $data[] = $sub_array;
            }
            $output = array(
                "draw"                    =>     intval($_POST["draw"]),
                "recordsTotal"          =>      $this->M_requerimiento->get_all_data('tb_ofertas_requerimiento','id_oferta'),
                "recordsFiltered"     =>     $this->M_requerimiento->get_filtered_data('tb_ofertas_requerimiento'),
                "data"                    =>     $data
            );
            echo json_encode($output);
        }
    }

    function eliminar(){
        $id = trim($this->input->post('id',true));

        $resultado = $this->M_requerimiento->eliminar('tb_ofertas_requerimiento',$id);
        
        if($resultado<=0){
            echo 'error';
        }else{
            $result = $this->M_requerimiento->get_all_data('tb_ofertas_requerimiento','id_oferta');
            echo $result;
        }
    }
}

?>
