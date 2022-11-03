<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_ofertas_proveedor extends CI_Model
{   
    //Obtener ofertas disponibles
    function get_ofertas($inicio,$limite,$arr_ids){
        $array = array();
        foreach ($arr_ids as $key) {
            array_push($array,$key->id_oferta);
        }

        $this->db->select('*');
        $this->db->from('tb_ofertas_cliente a');
        $this->db->join('tb_usuarios2 b','a.id_cliente=b.coduser','inner');
        $this->db->where('a.del',0);
        if($arr_ids!='error'){
            $this->db->where_not_in('a.id',$array);
        }
        // 5,0 
        // 10,5 
        $this->db->limit(10,$inicio);
        //$this->db->limit(5,5);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return 'error';
        } 
    }

    function get_requerimientos($id){
        $this->db->select('a.*,b.descripcion as proyecto,b.f_fin,b.f_inicio,b.f_registro,c.razon_social,b.id as id_cliente');
        $this->db->from('tb_ofertas_requerimiento a');
        $this->db->join('tb_ofertas_cliente b','a.id_oferta=b.id','left');
        $this->db->join('tb_usuarios2 c','b.id_cliente=c.coduser','inner');
        $this->db->where('a.id_oferta',$id);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return 'error';
        } 
    }

    function get_all_ofertas($arr_ids){
        $array = array();
        foreach ($arr_ids as $key) {
            array_push($array,$key->id_oferta);
        }
        $this->db->select('*');
        $this->db->from('tb_ofertas_cliente a');
        $this->db->join('tb_usuarios2 b','a.id_cliente=b.coduser','inner');
        $this->db->where('a.del',0);
        //$this->db->where('')
        if($arr_ids!='error'){
            $this->db->where_not_in('a.id',$array);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    function insert($table,$array){
        return $this->db->insert($table,$array);
    }

    function get_all_postulacion_usuario($id){
        $this->db->select('id_oferta');
        $this->db->from('tb_postulacion');
        $this->db->where('id_proveedor',$id);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return 'error';
        } 
    }

    /*------------------- Datos postulados -------------------*/
    function get_postulados(){

    }
    
    function get_postulacion($inicio,$limite,$arr_ids){
        //$array = array();
        //foreach ($arr_ids as $key) {
        //    array_push($array,$key->id_oferta);
        //}

        $this->db->select('a.*,b.*,c.archivo');
        $this->db->from('tb_postulacion c');
        //$this->db->from('tb_ofertas_cliente a');
        $this->db->join('tb_ofertas_cliente a','c.id_oferta=a.id','inner');
        $this->db->join('tb_usuarios2 b','a.id_cliente=b.coduser','inner');
        $this->db->where('a.del',0);
        $this->db->where('c.id_proveedor',$_SESSION['_SESSIONUSER']);
        //if($arr_ids!='error'){
        //    $this->db->where_in('a.id',$array);
        //}
        // 5,0 
        // 10,5 
        $this->db->limit(10,$inicio);
        //$this->db->limit(5,5);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return 'error';
        } 
    }

    function get_all_postulacion($arr_ids){
        //$array = array();
        //foreach ($arr_ids as $key) {
        //    array_push($array,$key->id_oferta);
        //}
        $this->db->select('*');
        $this->db->from('tb_postulacion c');
        //$this->db->join('tb_usuarios2 b','a.id_cliente=b.coduser','inner');
        //$this->db->where('a.del',0);
        $this->db->where('c.id_proveedor',$_SESSION['_SESSIONUSER']);
        //if($arr_ids!='error'){
        //    $this->db->where_in('a.id',$array);
        //}
        $query = $this->db->get();
        return $query->num_rows();
    }
    
}