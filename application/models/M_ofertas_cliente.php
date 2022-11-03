<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_ofertas_cliente extends CI_Model
{   
    /**/
    function make_datatables($table){
        $this->make_query($table);
        if($_POST["length"] != -1)
        {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function make_query($table)
    {  
        $this->db->select('a.*,count(b.id) as total');
        $this->db->from($table.' as a');
        $this->db->join('tb_ofertas_requerimiento as b','a.id=b.id_oferta','left');
        $this->db->where('a.id_cliente',$_SESSION['_SESSIONUSER']);
        $this->db->where('a.del',0);
        if(isset($_POST["search"]["value"]))
        {
            $busc = $_POST["search"]["value"];
            $this->db->where("(a.descripcion LIKE '%".$busc."%')", NULL, FALSE);
        }            
        $this->db->group_by('a.id');
        $this->db->order_by('a.f_registro','desc');
    }

    function get_all_data($table,$campo)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($campo,$_SESSION['_SESSIONUSER']);
        return $this->db->count_all_results();
    }  
      
    function get_filtered_data($table){
        $this->make_query($table);
        $query = $this->db->get();
        return $query->num_rows();
    }      
    /**/


    function insert($table,$array){
        return $this->db->insert($table,$array);
    }

    function list($table){
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return 'ok';
        } 
    }

    function validar($table,$dato,$id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_cliente',$_SESSION['_SESSIONUSER']);
        $this->db->where('id!=',$id);
        $this->db->where('descripcion',$dato);
        return $this->db->count_all_results();
    }  

    function validar_x_id($table,$dato)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id',$dato);
        return $this->db->count_all_results();
    }  

    function get_data_x_id($table,$id){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id',$id);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return 'error';
        } 
    }

    function get_data_indicador($table,$id,$campo){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($campo,$id);
        $this->db->where('del',0);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return 'error';
        } 
    }

    function get_data_indicador_req($id){
        $this->db->select('*');
        $this->db->from('tb_ofertas_cliente as a');
        $this->db->join('tb_ofertas_requerimiento as b','a.id=b.id_oferta','inner');
        $this->db->where('a.id_cliente',$id);
        $this->db->where('a.del',0);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    function eliminar($table,$id)
    {   $this->db->where('id',$id);
        return $this->db->update($table, array('del' => 1,'f_del'=>date('Y-m-d H:i:s'),'user_del'=>$_SESSION['_SESSIONUSER']));
    }  

    function update($table,$array,$id){
        $this->db->where('id',$id);
        return $this->db->update($table,$array);
    }
}