<?php

/** 
* Recebe as requisições das classes da pasta Controllers repassando-as ao CI_Controller
*
* @author Davi S. Bezerra <davi@cidadesol.com>
* @version 1.0 
* @copyright  GPL © 2013. 
* @access public  
*/

if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

/**
 * Vetor com os municípios que o usuário pode gerenciar
 * @var array
 */
    public $user_municipios = array('513','243','542');
    
/**
 * Quantidade máxima de registros a serem exibidos por página
 * @var int
 */
    public $results_per_page = 20;

    function __construct() {

        parent::__construct();

        $this->loadFormConfig();
        $this->funcionalidade = new SistemaFuncao;
        $this->autenticacao->is_allowed($this->router->class, $this->router->method, "session_cpf");

    }

    /** 
    * Método que substitui o nativo método view() do CodeIgniter,
    * Sua vantagem é carregar diretamente a pasta correspondente ao dispositivo utilizado 
    * @access public 
    * @param Int $pagina
    * @return void 
    */
    public function master_view($content_view, $data = FALSE, $return = FALSE, $only_content = FALSE){
        
    $conditions['classe'] = $this->router->class;
    $conditions['metodo'] = $this->router->method;
    $data['system'] = $this->funcionalidade->get_where($conditions);

    // preciso achar um jeito de chamar o controlador    
    if($this->input->get('gera-pdf')){
            $return = TRUE; 
        }
        if(!$only_content){            
        $data['header'] = $this->load->view($this->get_path_view().'layout/header', $data, $return);
        $data['intrahead'] = $this->load->view($this->get_path_view().'layout/intrahead', $data, $return);
        $data['flashmessage'] = $this->load->view($this->get_path_view().'layout/flashmessage', $data, $return);
        }
        $data['content'] = $this->load->view($this->get_path_view().$content_view, $data, $return);
        if(!$only_content){            
        $data['footer'] = $this->load->view($this->get_path_view().'layout/footer', $data, $return);
        }
        $saida = $this->load->view($this->get_path_view().'layout/master', $data, $return);

        if($this->input->get('gera-pdf')){
            $this->load->helper('mpdf');
            pdf($saida);
        }

}

    /** 
    * Obtém o path da view correspondente ao dispositivo utilizado
    * 
    * @access public 
    * @param Int $pagina
    * @return void 
    */    
    public function get_path_view(){

        if ($this->agent->is_mobile()){
            $this->view_type = 'mobile/';
        }
        else{
            $this->view_type = 'desktop/';
        }    
        return $this->view_type;    

    }

    /** 
    * Carrega o arquivo de configuração de validação dos formulários
    * 
    * @access public 
    * @param void
    * @return void 
    */    
    public function loadFormConfig(){

        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');

    }

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */