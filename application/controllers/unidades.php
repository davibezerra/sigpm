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

class Unidades extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Unidade');
    }
    
    /** 
    * Relação das unidades cadastradas no sistema 
    * @access public 
    * @param int $pagina
    * @return void 
    */
    public function index($pagina = NULL){
        
        $config["base_url"] = base_url() . $this->router->fetch_class()."/index";
        $config["total_rows"] = $this->Unidade->count();
        $config['choice'] = $config["total_rows"] / $this->results_per_page;
        $this->pagination->initialize($config);
        $page = ($pagina)? $pagina : 0;
        
        $data['unidades'] = $this->Unidade->get($this->results_per_page,$page);
        
        $data["links"] = $this->pagination->create_links();
        $data["total_rows"] = $config["total_rows"];
        
        $this->master_view($this->router->fetch_class()."/index", $data);        

    }
    
    /** 
    * Cadastra uma unidade no sistema 
    * @access public 
    * @return void 
    */
    public function cadastrar(){        
        
        if($this->form_validation->run('unidades') == TRUE){
            $this->Unidade->unidade_id = $this->input->post('unidade_id');
            $this->Unidade->logradouro_id = $this->input->post('logradouro_id');
            $this->Unidade->nome = $this->input->post('nome');
            $this->Unidade->descricao = $this->input->post('descricao');
            $this->Unidade->slogan = $this->input->post('slogan');
            $this->Unidade->numero = $this->input->post('numero');
            $this->Unidade->complemento = $this->input->post('complemento');
            if($this->Unidade->save()){
                    $this->session->set_flashdata('sucess', 'A Unidade foi cadastrada com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao cadastrar a Unidade');
                }
        }else{
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method());            
        }
    }
    
    /** 
    * Exclui uma unidade cadastrada no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
    public function excluir($id = NULL){
        
        if($this->input->post('id')){
            $conditions['id'] = $this->input->post('id');
            $unidade = $this->Unidade->get_where($conditions);
               if($unidade->delete()){
                   $this->session->set_flashdata('sucess', 'A Unidade foi excluida do sistema com sucesso');
                   redirect($this->router->fetch_class());
               }else{
                   $this->session->set_flashdata('error', 'Ocorreu um erro ao excluir a Unidade');
               }
       }else{
            $conditions['id'] = $id;
            $data['unidade'] = $this->Unidade->get_where($conditions);
            if($id){        
                $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
            }else{            
                $this->session->set_flashdata('error', 'A unidade solicitada não existe');
                redirect(base_url().$this->router->fetch_class());            
            }
       }

    }
    
    /** 
    * Detalha as informações de uma unidade cadastrada no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
    public function detalhar($id = NULL){   
        
        $data['unidade'] = $this->Unidade->get_by_id($id);
            
        if($id){        
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
        }else{            
            $this->session->set_flashdata('error', 'A unidade solicitada não existe');
            redirect(base_url().$this->router->fetch_class());            
        }

    }
    
    /** 
    * Modifica as informações de uma unidade cadastrada no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
    public function modificar($id = NULL){
         if($this->form_validation->run('unidades') == TRUE){
            $conditions['id'] = $this->input->post('id');
            $conditions['unidade_id'] = $this->input->post('unidade_id');
            $conditions['nome'] = $this->input->post('nome');
            $conditions['descricao'] = $this->input->post('descricao');
            $conditions['slogan'] = $this->input->post('slogan');
            $conditions['logradouro_id'] = $this->input->post('logradouro_id');
            $conditions['numero'] = $this->input->post('numero');
            $conditions['complemento'] = $this->input->post('complemento');
             if($this->Unidade->where('id',$this->input->post('id_old'))->update($conditions)){
                    $this->session->set_flashdata('sucess', 'As informações da Unidade foram modificadas com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao modificar as informações da Unidade');
                }
        }else{
            $conditions['id'] = $id;
            $data['unidade'] = $this->Unidade->get_where($conditions);
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

            $data['unidades'] = $this->Unidade->like('nome',$termo)->or_like('descricao',$termo)->get($this->results_per_page,$page);
            $config["total_rows"] = $this->Unidade->like('nome',$termo)->or_like('descricao',$termo)->count();

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
        
        $termo = $this->input->post('termo');   
        $output = $this->Unidade->like('nome', $termo)->or_like('descricao', $termo)->get($this->results_per_page)->all_to_array(array('id','nome','descricao'));
        echo json_encode($output);

    }
    
}

/* End of file unidades.php */
/* Location: ./app/controllers/unidades.php */
