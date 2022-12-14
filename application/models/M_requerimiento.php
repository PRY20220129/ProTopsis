<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_requerimiento extends CI_Model
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
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_oferta',$_SESSION['_SESSION_ID_OFERTA']);
        if(isset($_POST["search"]["value"]))
        {
            $busc = $_POST["search"]["value"];
            $this->db->where("(descripcion LIKE '%".$busc."%')", NULL, FALSE);
        }            
        $this->db->order_by('f_registro','desc');
    }

    function get_all_data($table,$campo)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($campo,$_SESSION['_SESSION_ID_OFERTA']);
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

    function validar($table,$dato,$id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_oferta',$_SESSION['_SESSION_ID_OFERTA']);
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
    
    function eliminar($table,$id)
    {
        return $this->db->delete($table, array('id' => $id));
    }  

    function update($table,$array,$id){
        $this->db->where('id',$id);
        return $this->db->update($table,$array);
    }
}