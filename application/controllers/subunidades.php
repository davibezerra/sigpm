<?php

/** 
* Gerencia as informações das unidades cadastradas no sistema
*
* @author Davi S. Bezerra <davi@cidadesol.com>
* @version 1.0 
* @copyright  GPL © 2013. 
* @access public  
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SubUnidades extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('SubUnidade');
    }
    
    /** 
    * Relação das subunidades cadastradas no sistema 
    * @access public 
    * @param int $pagina
    * @return void 
    */
    public function index($pagina = NULL){
        
        $config["base_url"] = base_url() . $this->router->fetch_class()."/index";
        $config["total_rows"] = $this->SubUnidade->count();
        $config['choice'] = $config["total_rows"] / $this->results_per_page;
        $this->pagination->initialize($config);
        $page = ($pagina)? $pagina : 0;
        
        $data['subunidades'] = $this->SubUnidade->get($this->results_per_page,$page);
        
        $data["links"] = $this->pagination->create_links();
        $data["total_rows"] = $config["total_rows"];
        
        $this->master_view($this->router->fetch_class()."/index", $data);        

    }
    
    /** 
    * Cadastra uma subunidade no sistema 
    * @access public 
    * @return void 
    */
    public function cadastrar(){        
        
        if($this->form_validation->run('subunidades') == TRUE){
            $this->SubUnidade->unidade_id = $this->input->post('unidade_id');
            $this->SubUnidade->logradouro_id = $this->input->post('logradouro_id');
            $this->SubUnidade->nome = $this->input->post('nome');
            $this->SubUnidade->descricao = $this->input->post('descricao');
            if($this->SubUnidade->save()){
                    $this->session->set_flashdata('sucess', 'A subunidade foi cadastrada com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao cadastrar a subunidade');
                }
        }else{
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method());            
        }
    }
    
    /** 
    * Exclui uma subunidade cadastrada no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
    public function excluir($id = NULL){
        
        if($this->input->post('id')){
            $conditions['id'] = $this->input->post('id');
            $subunidade = $this->SubUnidade->get_where($conditions);
               if($subunidade->delete()){
                   $this->session->set_flashdata('sucess', 'A subunidade foi excluida do sistema com sucesso');
                   redirect($this->router->fetch_class());
               }else{
                   $this->session->set_flashdata('error', 'Ocorreu um erro ao excluir a subunidade');
               }
       }else{
            $conditions['id'] = $id;
            $data['subunidade'] = $this->SubUnidade->get_where($conditions);
            if($id){        
                $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
            }else{            
                $this->session->set_flashdata('error', 'A subunidade solicitada não existe');
                redirect(base_url().$this->router->fetch_class());            
            }
       }

    }
    
    /** 
    * Detalha as informações de uma subunidade cadastrada no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
    public function detalhar($id = NULL){   
        
        $data['subunidade'] = $this->SubUnidade->get_by_id($id);
            
        if($id){        
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
        }else{            
            $this->session->set_flashdata('error', 'A subunidade solicitada não existe');
            redirect(base_url().$this->router->fetch_class());            
        }

    }
    
    /** 
    * Modifica as informações de uma subunidade cadastrada no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
    public function modificar($id = NULL){
         if($this->form_validation->run('subunidades') == TRUE){
            $conditions['id'] = $this->input->post('id');
            $conditions['unidade_id'] = $this->input->post('unidade_id');
            $conditions['logradouro_id'] = $this->input->post('logradouro_id');
            $conditions['nome'] = $this->input->post('nome');
            $conditions['descricao'] = $this->input->post('descricao');
             if($this->SubUnidade->where('id',$this->input->post('id_old'))->update($conditions)){
                    $this->session->set_flashdata('sucess', 'As informações da subunidade foram modificadas com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao modificar as informações da subunidade');
                }
        }else{
            $conditions['id'] = $id;
            $data['subunidade'] = $this->SubUnidade->get_where($conditions);
            if($id){        
                $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
            }else{            
                $this->session->set_flashdata('error', 'A unidade solicitada não existe');
                redirect(base_url().$this->router->fetch_class());            
            }
        }
    }    
    
    /** 
    * Recebe o termo enviado pelo método processa_busca() e o exibe para os resultados da pesquisa 
    * @access public 
    * @param String $termo $pagina
    * @return void 
    */
    public function buscar($termo = NULL, $pagina = NULL){
        
        // verifica se foi digitado um termo para pesquisa    
        if($termo){

            $termo = urldecode($termo);
            $config["base_url"] = base_url() . $this->router->fetch_class()."/".$this->router->fetch_method()."/".$termo;
            $page = ($pagina)? $pagina : 0;

            $data['subunidades'] = $this->SubUnidade->like('nome',$termo)->or_like('descricao',$termo)->get($this->results_per_page,$page);
            $config["total_rows"] = $this->SubUnidade->like('nome',$termo)->or_like('descricao',$termo)->count();

            $config['choice'] = $config["total_rows"] / $this->results_per_page;

            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data["resultados"] = $config["total_rows"];
            $data["termo"] = $termo;

            $this->master_view($this->router->fetch_class()."/index", $data);

        }else{

                redirect(base_url().$this->router->fetch_class());

        }

    }
    
    /** 
    * Método que recebe o parâmetro da pesquisa digitado pelo usuário e o redireciona para o método buscar()
    * @access public 
    * @param String $termo
    * @return void 
    */
    public function processa_busca(){
        
        redirect(base_url().$this->router->fetch_class()."/buscar/".$this->input->post('termo'));
        
    }
    
    /** 
    * Utilizado no mecanismo de busca instantânea, este método retorna a pesquisa na sintaxe JSON
    * @access public 
    * @param String $termo
    * @return json 
    */
    public function live_search(){
        
        $colunas = array('id','nome','descricao');
        
        $termo = $this->input->post('termo');   
        $output = $this->SubUnidade->like('nome', $termo)->or_like('descricao', $termo)->or_like('id', $termo)->get($this->results_per_page)->all_to_array($colunas);
        echo json_encode($output);

    }
    
}

/* End of file subunidades.php */
/* Location: ./app/controllers/subunidades.php */