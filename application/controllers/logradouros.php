<?php 

/** 
* Gerencia as informações dos logradouros cadastrados no sistema
*
* @author Davi S. Bezerra <davi@cidadesol.com>
* @version 1.0 
* @copyright  GPL © 2013. 
* @access public  
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logradouros extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Logradouro');
    }
    
    /** 
    * Relação dos logradouros cadastrados no sistema 
    * @access public 
    * @param Int $pagina
    * @return void 
    */
    public function index($pagina = NULL){
        
        $config["base_url"] = base_url() . $this->router->fetch_class()."/index";
        $config["total_rows"] = $this->Logradouro->count();
        $config['choice'] = $config["total_rows"] / $this->results_per_page;
        $this->pagination->initialize($config);
        $page = ($pagina)? $pagina : 0;
        
        $data['logradouros'] = $this->Logradouro->get($this->results_per_page,$page);
        $data["links"] = $this->pagination->create_links();
        
        $this->master_view($this->router->fetch_class()."/index", $data);        

    }
    
    /** 
    * Cadastra um logradouro no sistema 
    * @access public 
    * @return void 
    */
    public function cadastrar(){        
        
        if($this->form_validation->run('logradouros') == TRUE){
            $this->Logradouro->logradourotipo_id = $this->input->post('logradourotipo_id');
            $this->Logradouro->bairro_id = $this->input->post('bairro_id');
            $this->Logradouro->subunidade_id = $this->input->post('subunidade_id');
            $this->Logradouro->nome = $this->input->post('nome');
            if($this->Logradouro->save()){
                    $this->session->set_flashdata('sucess', 'O logradouro foi cadastrado com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao cadastrar o logradouro');
                }
        }else{
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method());
        }
    }
    
    /** 
    * Exclui um logradouro cadastrado no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
    public function excluir($id = NULL){
        
        if($this->input->post('id')){
            $conditions['id'] = $this->input->post('id');
               if($this->Logradouro->get_where($conditions)->delete()){
                   $this->session->set_flashdata('sucess', 'O logradouro foi excluído com sucesso');
                   redirect($this->router->fetch_class());
               }else{
                   $this->session->set_flashdata('error', 'Ocorreu um erro ao excluir o logradouro');
               }
       }else{
            $conditions['id'] = $id;
            $data['logradouro'] = $this->Logradouro->get_where($conditions);
            if($id){        
                $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
            }else{            
                $this->session->set_flashdata('error', 'O bairro solicitado não existe');
                redirect(base_url().$this->router->fetch_class());            
            }
       }

    }
    
    /** 
    * Modifica as informações de um logradouro cadastrado no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
    public function modificar($id = NULL){
         if($this->form_validation->run('logradouros') == TRUE){
            $conditions['logradourotipo_id'] = $this->input->post('logradourotipo_id');
            $conditions['bairro_id'] = $this->input->post('bairro_id');
            $conditions['subunidade_id'] = $this->input->post('subunidade_id');
            $conditions['nome'] = $this->input->post('nome');
             if($this->Logradouro->where('id',$this->input->post('id'))->update($conditions)){
                    $this->session->set_flashdata('sucess', 'O logradouro foi modificado com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao modificar o logradouro');
                }
        }else{
            $conditions['id'] = $id;
            $data['logradouro'] = $this->Logradouro->get_where($conditions);
            if($id){        
                $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
            }else{            
                $this->session->set_flashdata('error', 'O bairro solicitado não existe');
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
    public function buscar($termo = NULL, $offset = NULL){
        
        if($termo){

            $termo = urldecode($termo);
            $config["base_url"] = base_url() . $this->router->fetch_class()."/".$this->router->fetch_method()."/".$termo;
            $page = ($offset)? $offset : 0;

            $conditions['nome'] = $termo;
            $data['logradouros'] = $this->Logradouro->like($conditions)->get($this->results_per_page,$page);
            $config["total_rows"] = $this->Logradouro->like($conditions)->count();

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

    $termo = $this->input->post('termo');
    // retorna apenas os municípios que o usuário pode gerenciar
    $distritos = $this->Logradouro->like('nome', $termo)->include_related('bairro')->include_related('logradourotipo')->get($this->results_per_page)->all_to_array(array('id','nome','bairro_nome','logradourotipo_nome'));
    echo json_encode($distritos);
    

}

}

/* End of file estados.php */
/* Location: ./app/controllers/logradouros.php */