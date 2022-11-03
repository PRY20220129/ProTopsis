<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_usuarios_cliente extends CI_Model
{   
    function validar($table,$dato,$campo)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($campo,$dato);
        return $this->db->count_all_results();
    }  

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
        $this->db->where('idjefe',$_SESSION['_SESSIONUSER']);
        if(isset($_POST["search"]["value"]))
        {
            $busc = $_POST["search"]["value"];
            $this->db->where("(nombres LIKE '%".$busc."%')", NULL, FALSE);
        }            
        $this->db->order_by('fecha_alta asc');
    }

    function get_all_data($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('idjefe',$_SESSION['_SESSIONUSER']);
        return $this->db->count_all_results();
    }  
      
    function get_filtered_data($table){
        $this->make_query($table);
        $query = $this->db->get();
        return $query->num_rows();
    }     



    /****************OTRO *********************/


    /**/
 
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
        return $this->db->delete($table, array('coduser' => $id));
    }  

    function update($table,$array,$id){
        $this->db->where('coduser',$id);
        return $this->db->update($table,$array);
    }
}