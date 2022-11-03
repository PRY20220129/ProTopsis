<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_evaluacion extends CI_Model
{   
    //Setear tablas
    function delete_tables($id_oferta){
        $this->db->where('id_oferta',$id_oferta);
        $this->db->delete('simu_cxproveedor');

        $this->db->where('id_oferta',$id_oferta);
        $this->db->delete('simu_cxproveedor_step1');

        $this->db->where('id_oferta',$id_oferta);
        $this->db->delete('simu_cxproveedor_step2');

        $this->db->where('id_oferta',$id_oferta);
        $this->db->delete('simu_cxproveedor_step3');

        $this->db->where('id_oferta',$id_oferta);
        $this->db->delete('simu_cxproveedor_step4');
    }
    //Sumatoria de datos
    function verificar_suma_criterios($id_oferta,$id_criterio){
        $this->db->select('SUM(porcentaje) as total');
        $this->db->from('tb_criteriosxoferta');
        $this->db->where('id_oferta',$id_oferta);
        $this->db->where('id!=',$id_criterio);
        $query = $this->db->get();
        if($query->num_rows()>0){
            foreach($query->result() as $kk){
                return $kk->total;
            } 
        }else{
            return 'error';
        } 
    }

    //Eliminar casos
    function delete_datos_oferta($table,$id_oferta){
        $this->db->where('id_oferta',$id_oferta);
        $this->db->delete($table);
    }

    function delete_criterio($table,$id_criterio){
        $this->db->where('id',$id_criterio);
        return $this->db->delete($table);
    }

    /*Armar matriz de valor*/
    function update_x_ids_aceptado($table,$array,$id_oferta,$id_proveedor){
        $this->db->where('id_proveedor',$id_proveedor);
        $this->db->where('id_oferta',$id_oferta);
        return $this->db->update($table,$array);
    }
    

    function update_x_ids($table,$array,$id_proveedor,$id_criterio){
        $this->db->where('id_proveedor',$id_proveedor);
        $this->db->where('id_criterio',$id_criterio);
        return $this->db->update($table,$array);
    }
    
    function update($table,$array,$id_criterio){
        $this->db->where('id',$id_criterio);
        return $this->db->update($table,$array);
    }

    function valida_criterio_x_proveedor($table,$id_criterio,$id_proveedor){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_criterio',$id_criterio);
        $this->db->where('id_proveedor',$id_proveedor);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function valida_step5_envio_recomendacion($id_oferta){
        $this->db->select('*');
        $this->db->from('simu_cxproveedor_step4');
        $this->db->where('id_oferta',$id_oferta);
        $this->db->where('estado_cierre',5);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_casos_step_fase_recomendacion(){
        $this->db->select('id_oferta,estado_cierre');
        $this->db->from('simu_cxproveedor_step4');
        $this->db->where_in('estado_cierre',array(5,1));
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return 'error';
        } 
    }

    function datos_proveedorxoferta($id_oferta){
        $this->db->select('a.id_proveedor,b.razon_social');
        $this->db->from('tb_postulacion a ');
        $this->db->join('tb_usuarios2 b','a.id_proveedor=b.coduser','inner');
        $this->db->where('a.id_oferta',$id_oferta);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array(); 
        }else{
            return 'error';
        } 
    }

    function datos_tabla($table,$id_oferta,$campo){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($campo,$id_oferta);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array(); 
        }else{
            return 'error';
        } 
    }

    function list_step5($table1,$table2,$id_oferta){
        $this->db->select('a.*,b.id_proveedor as proveedor,c.razon_social');
        $this->db->from($table1);
        $this->db->join($table2,'a.id_proveedor=b.id_proveedor','inner');
        $this->db->join('tb_usuarios2 c','b.id_proveedor=c.coduser','inner');
        $this->db->where('a.id_oferta',$id_oferta);
        $this->db->where('b.id_oferta',$id_oferta);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array(); 
        }else{
            return 'error';
        } 
    }

    function datos_tabla_cxproveedor($id_oferta){
        $this->db->select('*');
        $this->db->from('simu_cxproveedor as a');
        $this->db->join('tb_criteriosxoferta as b','a.id_criterio=b.id','left');
        $this->db->where('b.id_oferta',$id_oferta);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array(); 
        }else{
            return 'error';
        } 
    }

    /**********CRITERIOS X OFERTA***********/
    function get_criteriosxoferta($id){
        $this->db->select('*');
        $this->db->from('tb_criteriosxoferta');
        $this->db->where('id_oferta',$id);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return 'error';
        }
    }
    function get_criterio($id){
        $this->db->select('*');
        $this->db->from('tb_criteriosxoferta');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return 'error';
        }
    }

    //Postulantes por oferta
    function get_postulantesxoferta(){
        $this->db->select('id_oferta,count(id_oferta) as total');
        $this->db->from('tb_postulacion');
        $this->db->group_by('id_oferta');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return 'error';
        } 
    }

    //Obtener ofertas disponibles
    function get_ofertas($inicio,$limite,$tipo_user){
        $this->db->select('*');
        $this->db->from('tb_ofertas_cliente a');
        $this->db->join('tb_usuarios2 b','a.id_cliente=b.coduser','inner');
        $this->db->where('a.del',0);
        $this->db->where('a.f_fin <',date('Y-m-d H:i:s'));
        if($tipo_user==15){
            $this->db->where('a.id_cliente',$_SESSION['_SESSIONUSER']);
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

    function get_all_ofertas($tipo_user){
        $this->db->select('*');
        $this->db->from('tb_ofertas_cliente a');
        $this->db->join('tb_usuarios2 b','a.id_cliente=b.coduser','inner');
        $this->db->where('a.del',0);
        $this->db->where('a.f_fin <',date('Y-m-d H:i:s'));
        if($tipo_user==15){
            $this->db->where('a.id_cliente',$_SESSION['_SESSIONUSER']);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }


    //Fin uso

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

    function get_certificados($id){
        $this->db->select('*');
        $this->db->from('tb_certificado_proveedor');
        $this->db->where('id_proveedor',$id);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return 'error';
        } 
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

    public function retornarcampo_archivo($id,$campo,$tabla,$retorno,$id_proveedor){
        $query = $this->db->get_where($tabla,array($campo=>$id,'id_proveedor'=>$id_proveedor));
        if($query->num_rows() > 0){
            foreach ($query->result() as $row){
                return $row->$retorno;
            }
        }
    }

    public function retornarcampo_recomend($id,$campo,$tabla,$retorno){
        $query = $this->db->get_where($tabla,array($campo=>$id,'estado_cierre'=>5));
        if($query->num_rows() > 0){
            foreach ($query->result() as $row){
                return $row->$retorno;
            }
        }else{
            return '';
        }
    }

    public function retornarcampo_accept($id,$campo,$tabla,$retorno){
        $query = $this->db->get_where($tabla,array($campo=>$id,'estado_cierre'=>1));
        if($query->num_rows() > 0){
            foreach ($query->result() as $row){
                return $row->$retorno;
            }
        }else{
            return '';
        }
    }

    /*------------------- Datos postulados -------------------*/
    function get_postulados(){

    }

    function get_data_proveedor($id_proveedor){
        $this->db->select('*');
        $this->db->from('tb_usuarios2');
        $this->db->where('coduser',$id_proveedor);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return 'error';
        } 
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