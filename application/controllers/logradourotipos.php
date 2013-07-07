<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Gerencia as informações dos tipos de logradouros cadastrados no sistema
*
* @author Davi S. Bezerra <davi@cidadesol.com>
* @version 1.0 
* @copyright  GPL © 2013. 
* @access public  
*/

class LogradouroTipos extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('LogradouroTipo');
    }
    
    /** 
    * Relação dos tipos de logradouros cadastrados no sistema 
    * @access public 
    * @param Int $pagina
    * @return void 
    */
    public function index($pagina = NULL){
        
        $config["base_url"] = base_url() . $this->router->fetch_class()."/index";
        $config["total_rows"] = $this->LogradouroTipo->count();
        $config['choice'] = $config["total_rows"] / $this->results_per_page;
        $this->pagination->initialize($config);
        $page = ($pagina)? $pagina : 0;
        
        $data['tipos'] = $this->LogradouroTipo->get($this->results_per_page,$page);
        $data["links"] = $this->pagination->create_links();
        
        $this->master_view($this->router->fetch_class()."/index", $data);        

    }
    
    /** 
    * Cadastra um tipo de logradouro no sistema 
    * @access public 
    * @return void 
    */
    public function cadastrar(){        
        
        if($this->form_validation->run('logradourotipos') == TRUE){
            $this->LogradouroTipo->nome = $this->input->post('nome');
            if($this->LogradouroTipo->save()){
                    $this->session->set_flashdata('sucess', 'O tipo de logradouro foi cadastrado com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao cadastrar o tipo de logradouro');
                }
        }else{
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method());            
        }
    }
    
    /** 
    * Exclui um tipo de logradouro cadastrado no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
    public function excluir($id = NULL){
        
        if($this->input->post('id')){
            $conditions['id'] = $this->input->post('id');
               if($this->LogradouroTipo->get_where($conditions)->delete()){
                   $this->session->set_flashdata('sucess', 'O tipo de logradouro foi excluído com sucesso');
                   redirect($this->router->fetch_class());
               }else{
                   $this->session->set_flashdata('error', 'Ocorreu um erro ao excluir o tipo de logradouro');
               }
       }else{
            $data['tipo'] = $this->LogradouroTipo->get_by_id($id);
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);            
       }

    }
    
    /** 
    * Modifica as informações de um tipo de logradouro cadastrado no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
    public function modificar($id = NULL){
         if($this->form_validation->run('logradourotipos') == TRUE){
            $conditions['nome'] = $this->input->post('nome');
             if($this->LogradouroTipo->where('id',$this->input->post('id'))->update($conditions)){
                    $this->session->set_flashdata('sucess', 'O tipo de logradouro foi modificado com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao modificar o tipo de logradouro');
                }
        }else{
            $data['tipo'] = $this->LogradouroTipo->get_by_id($id);
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);            
        }
    }    
    
    /** 
    * Recebe o termo enviado pelo método processa_busca() e o exibe para os resultados da pesquisa 
    * @access public 
    * @param String $termo $pagina
    * @return void 
    */
    public function buscar($termo = NULL, $offset = NULL){
        
        if($termo){


            $config["base_url"] = base_url() . $this->router->fetch_class()."/".$this->router->fetch_method()."/".$termo;

            $page = ($offset)? $offset : 0;

            $conditions['nome'] = $termo;
            $data['tipos'] = $this->LogradouroTipo->like($conditions)->get($this->results_per_page,$page);
            $config["total_rows"] = $this->LogradouroTipo->like($conditions)->count();

            $data["resultados"] = $config["total_rows"];
            $data["termo"] = $termo;

            $config['choice'] = $config["total_rows"] / $this->results_per_page;
            $this->pagination->initialize($config);

            $data["links"] = $this->pagination->create_links();

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
        
        $conditions['nome'] = $this->input->post('termo');
        $output = $this->LogradouroTipo->like($conditions)->get($this->results_per_page)->all_to_array(array('id','nome'));
        echo json_encode($output);

    }

}

/* End of file logradourotipos.php */
/* Location: ./app/controllers/logradourotipos.php */
