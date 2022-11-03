<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_cliente extends CI_Model
{

    function validar_sunat($table,$dato,$campo,$get){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($campo,$dato);
        $query = $this->db->get();
        if($query->num_rows()>0){
            foreach ($query->result() as $key) {
                echo $key->$get;
            }
        }else{
            echo 'error';
        }
    }

    function valida_duplicidad_datos($table,$dato,$campo){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($campo,$dato);
        $query = $this->db->get();
        return $query->num_rows();
    }


    function min_value($table,$id_criterio){
        $this->db->select('min(valor) as minimo,max(valor) as maximo');
        $this->db->from($table);
        $this->db->where('id_criterio',$id_criterio);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array(); 
        }else{
            return 'error';
        } 
    }

    function truncate($table){
        $this->db->truncate($table);
    }

    function valida_criterio_x_proveedor($table,$id_criterio,$id_proveedor){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_criterio',$id_criterio);
        $this->db->where('id_proveedor',$id_proveedor);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function datos_tabla($table){
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array(); 
        }else{
            return 'error';
        } 
    }

    function list($table){
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return 'error';
        } 
    }

    function insert($table,$array){
        $this->db->insert($table,$array);
        return $this->db->insert_id();
    }

    function eliminar($table,$id)
    {
        return $this->db->delete($table, array('id' => $id));
    }  

    function update($table,$array,$id){
        $this->db->where('id',$id);
        return $this->db->update($table,$array);
    }
    
    function list_min_max($table1,$table2){
        $this->db->select('a.*,b.minimo,b.maximo');
        $this->db->from($table1);
        $this->db->join($table2,'a.id_criterio=b.id_criterio','left');
        $this->db->order_by('a.id_proveedor','asc');
        $this->db->order_by('a.id_criterio','asc');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array(); 
        }else{
            return 'error';
        } 
    }

    function list_step5($table1,$table2){
        $this->db->select('a.*,b.proveedor');
        $this->db->from($table1);
        $this->db->join($table2,'a.id_proveedor=b.id','inner');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array(); 
        }else{
            return 'error';
        } 
    }
}