<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_login extends CI_Model
{

	public function get_data_comment(){
        $this->db->select('*');
        $this->db->from('inf_web_login_coment');
		$consulta = $this->db->get();
		if ($consulta->num_rows() > 0){
            return $consulta->result();
        }else{
            return 'error';
        }			
	}
	public function get_data_login(){
        $consulta = $this->db->get_where("inf_web_login",array('id'=>1));
        if ($consulta->num_rows() > 0){
            return $consulta->result();
        }else{
            return 'error';
        }	
	}

    public function login($ruc = null,$usuario = null,$contra = null){
        $p = $this->encriptar($contra);
        //$consulta = $this->db->get_where("tb_usuarios2",array('dni'=>$ruc,'usuario'=>$usuario,'clave'=>$p));
        $consulta = $this->db->get_where("tb_usuarios2",array('dni'=>$ruc,'clave'=>$p));
        if ($consulta->num_rows() > 0){
            foreach ($consulta->result() as $row){
				if($this->retornarcampo($row->coduser,'coduser','tb_usuarios2','estado') == 1){
					$_SESSION['_SESSIONUSER'] = $row->coduser;
					$_SESSION['_SESSIONFOTO'] = $row->foto;
					$_SESSION['_SESSIONUSERNOMBRE'] = $row->nombres.' '.$row->apellidos.' '.$row->razon_social;
					return '0';
				}else{
					//return 'La cuenta del usuario no se encuentra activa';
					return '2';
				}
            }
        }else{
            return '1';
            //return 'Los datos ingresados no son correctos, verifique e intente nuevamente'.$ruc.' - '.$usuario.' - '.$contra;
        }
    }
    public function encriptar($key){
        $encrip = hash_hmac('sha512',$key, 'KAJFBD@./*-_15fl221dlkaik2123');
        return $encrip;
    }
    public function retornarcampo($id,$campo,$tabla,$retorno){
        $query = $this->db->get_where($tabla,array($campo=>$id));
        if($query->num_rows() > 0){
            foreach ($query->result() as $row){
                return $row->$retorno;
            }
        }
    }
    public function retorvalue($igual,$tabla,$retorno){
        if(is_array($igual)){
            foreach($igual as $key=>$item){
                $this->db->where($key,$item);
            }
        }
        $this->db->from($tabla);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            foreach ($query->result() as $row){
                return $row->$retorno;
            }
        }
    }
    function retornonfilas($tabla,$where){
        if(is_array($where)){
            foreach($where as $key=>$item){
                $this->db->where($key,$item);
            }
        }
        return $this->db->get($tabla)->num_rows();
    }
    public function psdtemp($key){
        $rand = rand(100,9999);
        $key  = $key.$rand;
        $encrip = hash_hmac('sha256',$key, 'MODtemp@./*-cl@v3t3mp0r4lKsd212jkucvhydi');
        return $encrip;
    }
    function updatepswd($tabla,$campos,$where){
        foreach($where as $key=>$item){
            $this->db->where($key, $item);
        }
        $qer = $this->db->update($tabla, $campos);
        return $qer;
    }
    public function recover($name, $codtemp)
    {
        $mensaje = '
		<html>
			<head title="TopSis"/>
			<body>
			<div class="ppmail">
			  <style type="text/css">
			#emailWrapperTable h1, #emailWrapperTable h2 {font-family:Verdana,Arial;margin-bottom:2px; font-size:15px;}
			#emailWrapperTable h3 {font-size:13px;}
			#emailWrapperTable h4 {font-size:11px;}
			a {color:#084482; text-decoration:underline;}a.actionLink {color:#000; text-decoration:none;}
			hr {display: none;}
			.small {font-size:10px;}
			.ppid {color:#757575;}
			p {margin:11px 0; padding:0;}
			</style>
			  <!--[if gte mso 9]><style>.outlookFix {font-size:11px !important;} .headerFix{font-size:28px !important}</style><![endif]-->
			  
			  <table border="0" cellpadding="0" cellspacing="0" id="emailWrapperTable" style="font:11px Verdana, Arial, Helvetica, sans-serif;color:#333;" width="580">
			    <tr valign="top">
			      <td colspan="3"><table border="0" cellpadding="0" cellspacing="0" id="emailLogo" width="100%">
			          <tr valign="top">
			            <td width="130px;"><a href="'.$_SERVER['SERVER_NAME'].'"><img src="'.base_url().'public/images/topsis.png" border="0" alt="TopSis" width="90" height="66"/></a></td>
			          </tr>
			          <tr>
			            <td><img alt="" border="0" height="10" src="http://images.paypal.com/en_US/i/scr/pixel.gif" width="1"/></td>
			          </tr>
			          <tr>
			            <td/>
			          </tr>
			        </table></td>
			    </tr>
			    <tr>
			      <td colspan="3"><img height="13" src="'.base_url().'public/images/cierre1_top.png" border="0" style="vertical-align:bottom" alt=""/></td>
			    </tr>
			    <tr>
			      <td width="12"></td>
			      <td class="contentArea" style="width:530px; word-wrap:break-word; padding:12px; margin:0" width="530"><table style="font:Verdana, Arial, Helvetica, sans-serif;" width="100%">
			          <tr>
			            <td><h2><span class="outlookFix">??C??mo restablecer su contrase??a de TopSis?</span></h2></td>
			          </tr>
			        </table>
			        <p>Apreciable '.$name.':</p>
			        <p>Para recuperar su cuenta TopSisConsulting, deber?? crear una nueva contrase??a.</p>
			        <style type="text/css">
			.howTo ul, .howTo ol {margin-left:0; padding:4px 0 4px 20px;}
			.howTo ul li, .howTo ol li {margin-left:0;padding-left:0;}
			</style>
			        
			        <!--[if gte mso 9]><style>.howTo ul, .howTo ol {margin:0; padding:0;}.howTo ul li, .howTo ol li {margin:0 0 0 16px;text-indent:-17px;padding:0;font-size:11px;}.howTo p, .howTo strong {font-size:11px;}</style><![endif]-->
			        
			        <table border="0" cellpadding="10" cellspacing="0" class="howTo" style="font:11px Verdana, Arial, Helvetica, sans-serif;" width="100%">
			          <tr>
			            <td style="background-color:#e8f1fa;"><p>Es f??cil:</p>
			              <ol>
			                <li>Haga clic en el siguiente v??nculo para abrir una ventana del navegador segura.</li>
			                <li>Confirme que usted sea el propietario de la cuenta y, a continuaci??n, siga las instrucciones.</li>
			              </ol>
			              <p><img src="http://images.paypal.com/en_US/i/btn/btn_org_arrow.gif" border="0" alt=""/>????<a href="'.base_url().'cambiar_clave/'.$codtemp.'">Restablezca su contrase??a ahora</a></p>
			              <div style="width:502px; overflow:hidden;">
			                <div style="width:410px;font:11px Verdana, Arial, Helvetica, sans-serif;color:#333;"><strong>??El v??nculo no funciona? </strong>Copie y pegue el siguiente v??nculo en su navegador: <br/>
			                  <div style="width:400px;word-wrap:break-word;float:left;">'.base_url().'cambiar_clave/'.$codtemp.'</div>
			                </div>
			              </div></td>
			          </tr>
			        </table>
			        <p>Si no nos ha solicitado ayuda para restablecer su contrase??a, <a href="'.$_SERVER['SERVER_NAME'].'/">av??senos de inmediato</a>. Es importante que nos los reporte para poder evitar que estafadores le roben su informaci??n.</p>
			        <p>Atentamente,<br/>
			          TopSisConsulting</p></td>
			      <td width="12"></td>
			    </tr>
			    <tr>
			      <td colspan="3"><img height="13" src="'.base_url().'public/images/cierre1_bottom.png" border="0" alt=""/></td>
			    </tr>
			  </table>
			  <table border="0" cellpadding="0" cellspacing="0" id="emailFooter" width="580" style="padding-top:20px;font:10px Verdana, Arial, Helvetica, sans-serif;color:#333;">
			    <tr>
			      <td><div class="footerLinks" style="margin: 5px 0; padding: 0;"><a target="_new" href="'.$_SERVER['SERVER_NAME'].'/preguntas-frecuentes">Centro de Ayuda</a><span style="color:#ccc;"> | </span><a target="_new" href="'.$_SERVER['SERVER_NAME'].'/planes">Planes</a></div>
			        <p>No responda este correo electr??nico, ya que no estamos controlando esta bandeja de entrada. Para comunicarse con nosotros, env??anos un correo electr??nico a  ??soporte@protopsis.xyz??.</p>
			        <p>Copyright ?? 2022-2025 TopSis. Todos los derechos reservados.</p>
			    </tr>
			  </table>
			</div>
			</body>
			</html>
		';
        return $mensaje;
    }
}