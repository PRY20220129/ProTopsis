<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class C_simulacion extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
        $this->load->model('Mdl_compartido');
        $this->load->model('M_actividad');
        $this->load->model('M_simulacion');
        date_default_timezone_set('America/Lima');
    }

    public function index(){
        $permiso = $this->Mdl_compartido->permisos_controlador('simulacion');
        if (!$permiso)
            redirect('');
        
        if(!isset($_SESSION['_SESSIONUSER'])){
            redirect('login');
        }
        $header['menu'] = $this->Mdl_compartido->permisos_menu();
        $header['menu_activo'] = 'simulacion';

        $data['lst_tipo_eventos'] = $this->M_simulacion->list('ag_tipo_evento');

        $data['datos']='';
        $header['datos_header']='';
        $header['lang']='en';
        $this->load->view('layouts/v_head',$header);
        //$this->load->view('layouts/menu.php',$header);
        $this->load->view('layouts/horizontal-menu');
        $this->load->view('v_simulacion', $data);
        $this->load->view('layouts/v_footer');

    }

    public function agregar_criterio(){
        $peso = trim($this->input->post('peso',true));
        $criterio = trim($this->input->post('criterio',true));
        $array = array(
            'peso'=>$peso,
            'criterio'=>$criterio
        );
        $result = $this->M_actividad->insert('simu_criterio',$array);
        echo $result;
    }

    public function listar_criterio(){
        $resultado = $this->M_simulacion->list('simu_criterio');
        echo json_encode($resultado);
    }

    public function agregar_proveedor(){
        $proveedor = trim($this->input->post('proveedor',true));
        $array = array(
            'proveedor'=>$proveedor,
        );
        $result = $this->M_simulacion->insert('simu_proveedor',$array);
        echo $result;
    }

    public function listar_proveedor(){
        $resultado = $this->M_simulacion->list('simu_proveedor');
        echo json_encode($resultado);
    }

    public function agregar_valor(){
        $id_proveedor = trim($this->input->post('id_proveedor',true));
        $id_criterio = trim($this->input->post('id_criterio',true));
        $valor = trim($this->input->post('valor',true));

        $result = $this->M_simulacion->valida_criterio_x_proveedor('simu_cxproveedor',$id_criterio,$id_proveedor);
        if($result<=0){
            $array = array(
                'id_proveedor'=>$id_proveedor,
                'id_criterio'=>$id_criterio,
                'valor'=>$valor
            );
            $result = $this->M_simulacion->insert('simu_cxproveedor',$array);
            echo $result;
        }else{
            echo 'error';
        }
    }

    public function armar_matriz_valor(){
        $array_proveedores = $this->M_simulacion->datos_tabla('simu_proveedor');
        $array_pesos = $this->M_simulacion->datos_tabla('simu_criterio');
        $array_datos = $this->M_simulacion->datos_tabla('simu_cxproveedor');

        $tb='';
        $cen='style=" text-align:center;"';
        $cd = '<table '.$tb.'>';
        $cd.='<tr '.$cen.'>';
        $cd.='<td></td>';
        //Cabecera peso
        foreach ($array_pesos as $key) {
            $cd.='<td>'.$key['criterio'].'</td>';
        }
        $cd.='</tr>';
        foreach ($array_proveedores as $key) {
            $id_proveedor     = $key['id'];
            $n_proveedor      = $key['proveedor'];
            $cd.='<tr '.$cen.'><td>'.$n_proveedor.'</td>';
            foreach ($array_pesos as $keyy) {
                $id_criterio     = $keyy['id'];
                $n_criterio      = $keyy['criterio']; 
                foreach ($array_datos as $keyz) {
                    if($id_criterio==$keyz['id_criterio'] && $id_proveedor==$keyz['id_proveedor']){
                        $cd.='<td>'.$keyz['valor'].'</td>';
                    }
                }
            }
            $cd .= '</tr>';
        }
        $cd .= '</table>';
        echo $cd; 
    }


    public function armar_matriz_normalizada(){

        $this->M_simulacion->truncate('simu_cxproveedor_step1');

        $array_proveedores = $this->M_simulacion->datos_tabla('simu_proveedor');
        $array_pesos = $this->M_simulacion->datos_tabla('simu_criterio');
        $array_datos = $this->M_simulacion->datos_tabla('simu_cxproveedor');

        $arr_result =array();
        foreach ($array_proveedores as $key1) {
            $id_proveedor      = $key1['id'];
            $n_proveedor       = $key1['proveedor'];
            $numerador         = 0;  
            foreach ($array_pesos as $key2) {
                $id_peso       = $key2['id'];
                $detalle       = $key2['criterio'];
                $peso          = $key2['peso'];
                $denominador       = 0 ;
                foreach ($array_datos as $key3) {
                    if($id_peso==$key3['id_criterio']){
                        if($id_proveedor==$key3['id_proveedor']){
                            $numerador=$key3['valor'];
                        }
                        $denominador+=pow(floatval($key3['valor']),2);
                    }
                }
                $denominador = round($numerador/(pow($denominador,0.5)),6);
                //break;
                //guardamos datos
                $x = array(
                    'id_proveedor'=>$id_proveedor,
                    'id_criterio'=>$id_peso,
                    'valor'=>$denominador
                ); 
                $result = $this->M_simulacion->insert('simu_cxproveedor_step1',$x);
                array_push($arr_result,$x);
            }
            //break;
        }

        //Para impresión de tabla normalizada
        $cen = 'style="text-align:center;"';
        $tb = 'style=""';
        $cd = '<table '.$tb.'>';
        $cd.='<tr '.$cen.'>';
        $cd.='<td></td>';
        //Cabecera peso
        foreach ($array_pesos as $key) {
            $n_criterio      = $key['criterio'];
            $cd.='<td>***** '.$n_criterio.' *****</td>';
        }
        $cd.='</tr>';
        foreach ($array_proveedores as $key) {
            $id_proveedor     = $key['id'];
            $n_proveedor      = $key['proveedor'];
            $cd.='<tr '.$cen.'><td>'.$n_proveedor.'</td>';
            foreach ($array_pesos as $keyx) {
                $id_criterio     = $keyx['id'];
                $n_criterio      = $keyx['criterio']; 
                foreach ($arr_result as $keyz) {
                    if($id_criterio==$keyz['id_criterio'] && $id_proveedor==$keyz['id_proveedor']){
                        $cd.='<td>'.$keyz['valor'].'</td>';
                    }
                }
            }
            $cd .= '</tr>';
        }
        $cd .= '</table>';
        echo $cd; 
    }
  
    
    public function armar_matriz_normalizada_step2(){

        $this->M_simulacion->truncate('simu_cxproveedor_step2');

        $array_proveedores = $this->M_simulacion->datos_tabla('simu_proveedor');
        $array_pesos = $this->M_simulacion->datos_tabla('simu_criterio');
        $array_datos = $this->M_simulacion->datos_tabla('simu_cxproveedor_step1');

        $arr_result2 =array();
        foreach ($array_proveedores as $key1) {
            $id_proveedor      = $key1['id'];
            $n_proveedor       = $key1['proveedor'];
            foreach ($array_pesos as $key2) {
                $id_peso       = $key2['id'];
                $detalle       = $key2['criterio'];
                $peso          = $key2['peso'];
                $valor_       = 0 ;
                foreach ($array_datos as $key3) {
                    if($id_peso==$key3['id_criterio'] && $id_proveedor==$key3['id_proveedor']){
                        $valor_=$key3['valor']*$peso;
                    }
                }
                //guardamos datos
                $x = array(
                    'id_proveedor'=>$id_proveedor,
                    'id_criterio'=>$id_peso,
                    'valor'=>$valor_
                ); 
                $result = $this->M_simulacion->insert('simu_cxproveedor_step2',$x);
                array_push($arr_result2,$x);
            }
            //break;
        }

        //Para impresión de tabla normalizada
        $cen = 'style="text-align:center;"';
        $tb = 'style=""';
        $cd = '<table '.$tb.'>';
        $cd.='<tr '.$cen.'>';
        $cd.='<td></td>';
        //Cabecera peso
        foreach ($array_pesos as $key) {
            $n_criterio      = $key['criterio'];
            $cd.='<td>***** '.$n_criterio.' *****</td>';
        }
        $cd.='</tr>';
        foreach ($array_proveedores as $key) {
            $id_proveedor     = $key['id'];
            $n_proveedor      = $key['proveedor'];
            $cd.='<tr '.$cen.'><td>'.$n_proveedor.'</td>';
            foreach ($array_pesos as $keyy) {
                $id_criterio     = $keyy['id'];
                $n_criterio      = $keyy['criterio']; 
                foreach ($arr_result2 as $keyz) {
                    if($id_criterio==$keyz['id_criterio'] && $id_proveedor==$keyz['id_proveedor']){
                        $cd.='<td>'.$keyz['valor'].'</td>';
                    }
                }
            }
            $cd .= '</tr>';
        }
        $cd .= '</table>';
        echo $cd; 
    }
    
    public function armar_matriz_step3(){

        $this->M_simulacion->truncate('simu_cxproveedor_step3');

        //$array_proveedores = $this->M_simulacion->datos_tabla('simu_proveedor');
        $array_pesos = $this->M_simulacion->datos_tabla('simu_criterio');
        $array_datos = $this->M_simulacion->datos_tabla('simu_cxproveedor_step2');

        $arr_result2 =array();
        foreach ($array_pesos as $key2) {
            $id_criterio       = $key2['id'];
            $arr_min_max = $this->M_simulacion->min_value('simu_cxproveedor_step2',$id_criterio);
            foreach ($arr_min_max as $key) {
                $x = array(
                    'id_criterio'=>$id_criterio,
                    'minimo'=>$key['minimo'],
                    'maximo'=>$key['maximo']
                ); 
                $result = $this->M_simulacion->insert('simu_cxproveedor_step3',$x);
                array_push($arr_result2,$x);
            }
        }

        $cen = 'style="text-align:center;"';
        $tb = 'style=""';
        $cd = '<table '.$tb.'>';
        $cd.='<tr'.$cen.'>';
        $cd.='<td></td>';
        //Cabecera peso
        foreach ($array_pesos as $key) {
            $n_criterio      = $key['criterio'];
            $cd.='<td>***** '.$n_criterio.' *****</td>';
        }
        $cd.='</tr>';

        $cd .= '<tr '.$cen.'><td>V+ </td>';

        foreach ($array_pesos as $keyy) {
            $id_criterio     = $keyy['id'];
            foreach ($arr_result2 as $keyz) {
                if($id_criterio==$keyz['id_criterio']){
                    $cd.='<td>'.$keyz['maximo'].'</td>';
                }
            }
        }
        $cd .= '</tr>';

        $cd .= '<tr '.$cen.'><td>V-</td>';
        foreach ($array_pesos as $keyy) {
            $id_criterio     = $keyy['id'];
            foreach ($arr_result2 as $keyz) {
                if($id_criterio==$keyz['id_criterio']){
                    $cd.='<td>'.$keyz['minimo'].'</td>';
                }
            }
        }

        $cd .= '</tr>';

        
        $cd .= '</table>';
        echo $cd; 
    } 


    public function armar_matriz_step4(){

        $this->M_simulacion->truncate('simu_cxproveedor_step4');

        $array_proveedores = $this->M_simulacion->datos_tabla('simu_proveedor');
        $array_pesos = $this->M_simulacion->datos_tabla('simu_criterio');
        $array_datos = $this->M_simulacion->list_min_max('simu_cxproveedor_step2 as a','simu_cxproveedor_step3 as b');

        //$arr_result2 =array();
        foreach ($array_proveedores as $key1) {
            $id_proveedor      = $key1['id'];
            $n_proveedor       = $key1['proveedor'];
            $s_min       = 0 ;
            $s_max       = 0 ;
            foreach ($array_pesos as $key2) {
                $id_peso       = $key2['id'];
                $detalle       = $key2['criterio'];
                foreach ($array_datos as $key3) {
                    if($id_peso==$key3['id_criterio'] && $id_proveedor==$key3['id_proveedor']){
                        $s_min+=pow($key3['valor']-$key3['minimo'],2);
                        $s_max+=pow($key3['valor']-$key3['maximo'],2);
                    }
                }
            }

            //guardamos datos
            $s_min=pow($s_min,0.5);
            $s_max=pow($s_max,0.5);

            $pi = $s_min/($s_max+$s_min);
            $x = array(
                'id_proveedor'=>$id_proveedor,
                'minimo'=>$s_min,
                'maximo'=>$s_max,
                'pi'=>$pi
            ); 
            $result = $this->M_simulacion->insert('simu_cxproveedor_step4',$x);
            //array_push($arr_result2,$x);
            //break;
        }

        $array_datos = $this->M_simulacion->list_step5('simu_cxproveedor_step4 as a','simu_proveedor as b');
        $cen = 'style="text-align:center;"';

        $cad ='<table>';
            $cad .='<tr '.$cen.'>';
                $cad .='<td>Proveedor</td>';
                $cad .='<td>***** Si+ *****</td>';
                $cad .='<td>***** Si- *****</td>';
            $cad .='</tr>';
        foreach ($array_datos as $key) {
            $cad .='<tr '.$cen.'>';
                $cad .='<td>'.$key['proveedor'].'</td>';
                $cad .='<td>'.$key['maximo'].'</td>';
                $cad .='<td>'.$key['minimo'].'</td>';
            $cad .='</tr>';
        }
        $cad .='</table>';

        echo $cad;
    } 

    public function armar_matriz_step5(){

        $array_proveedores = $this->M_simulacion->datos_tabla('simu_proveedor');
        $array_datos = $this->M_simulacion->list_step5('simu_cxproveedor_step4 as a','simu_proveedor as b');
        $cen = 'style="text-align:center;"';

        $cad ='<table>';
            $cad .='<tr '.$cen.'>';
                $cad .='<td>Proveedor</td>';
                $cad .='<td>***** Si+ *****</td>';
                $cad .='<td>***** Si- *****</td>';
                $cad .='<td>***** PI  *****</td>';
                $cad .='<td><strong>***** RANK *****</strong></td>';
            $cad .='</tr>';
        foreach ($array_datos as $key) {
            $cont = 1; 
            foreach ($array_datos as $keyx) {
                if($keyx['pi']>$key['pi']){
                    $cont++; 
                }
            }
            $cad .='<tr '.$cen.'>';
                $cad .='<td>'.$key['proveedor'].'</td>';
                $cad .='<td>'.$key['maximo'].'</td>';
                $cad .='<td>'.$key['minimo'].'</td>';
                $cad .='<td>'.$key['pi'].'</td>';
                $cad .='<td>'.$cont.'</td>';
            $cad .='</tr>';
        }
        $cad .='</table>';

        echo $cad;
    } 

    public function reiniciar(){
        $this->M_simulacion->truncate('simu_proveedor');
        $this->M_simulacion->truncate('simu_criterio');
        $this->M_simulacion->truncate('simu_cxproveedor');
        $this->M_simulacion->truncate('simu_cxproveedor_step1');
        $this->M_simulacion->truncate('simu_cxproveedor_step2');
        $this->M_simulacion->truncate('simu_cxproveedor_step3');
        $this->M_simulacion->truncate('simu_cxproveedor_step4');
    }
}

?>
