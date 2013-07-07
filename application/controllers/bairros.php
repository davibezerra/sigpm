<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Gerencia as informações dos bairros cadastrados no sistema
*
* @author Davi S. Bezerra <davi@cidadesol.com>
* @version 1.0 
* @copyright  GPL © 2013. 
* @access public  
*/

class Bairros extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Bairro');
    }
    
    /** 
    * Relação dos bairros cadastrados no sistema 
    * @access public 
    * @param Int $pagina
    * @return void 
    */
    public function index($pagina = NULL){
        
        $config["base_url"] = base_url() . $this->router->fetch_class()."/index";
        $config["total_rows"] = $this->Bairro->count();
        $config['choice'] = $config["total_rows"] / $this->results_per_page;
        $this->pagination->initialize($config);
        $page = ($pagina)? $pagina : 0;
        
        $data['bairros'] = $this->Bairro->get($this->results_per_page,$page);
        $data["links"] = $this->pagination->create_links();
        
        $this->master_view($this->router->class."/index", $data);

   }
    
    /** 
    * Cadastra um bairro no sistema 
    * @access public 
    * @return void 
    */
    public function cadastrar(){        
        
        if($this->form_validation->run('bairros') == TRUE){
            $this->Bairro->distrito_id = $this->input->post('distrito_id');
            $this->Bairro->nome = $this->input->post('nome');
            if($this->Bairro->save()){
                    $this->session->set_flashdata('sucess', 'O bairro foi cadastrado com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao cadastrar o bairro');
                }
        }else{
            $this->master_view($this->router->class.'/'.$this->router->method);            
        }
    }
    
    /** 
    * Detalha as informações de um bairro cadastrado no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
    public function detalhar($id = NULL){

        $conditions['id'] = $id;
        $data['bairro'] = $this->Bairro->get_where($conditions);

        if($id){        
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
        }else{            
            $this->session->set_flashdata('rollback', 'O bairro solicitado não existe');
            redirect(base_url().$this->router->fetch_class());            
        }

    }

    /** 
    * Exclui um bairro cadastrado no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
    public function excluir($id){
        
        if($this->input->post('id')){
            $conditions['id'] = $this->input->post('id');
               if($this->Bairro->get_where($conditions)->delete()){
                   $this->session->set_flashdata('sucess', 'O bairro foi excluído com sucesso');
                   redirect($this->router->fetch_class());
               }else{
                   $this->session->set_flashdata('error', 'Ocorreu um erro ao excluir o bairro');
               }
       }else{
            $conditions['id'] = $id;
            $data['bairro'] = $this->Bairro->get_by_id($id);
        if($id){        
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
        }else{            
            $this->session->set_flashdata('error', 'O bairro solicitado não existe');
            redirect(base_url().$this->router->fetch_class());            
        }
       }

    }
    
    /** 
    * Modifica as informações de um bairro cadastrado no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
    public function modificar($id = NULL){
         if($this->form_validation->run('bairros') == TRUE){
            $conditions['distrito_id'] = $this->input->post('distrito_id');
            $conditions['nome'] = $this->input->post('nome');
             if($this->Bairro->where('id',$this->input->post('id'))->update($conditions)){
                    $this->session->set_flashdata('sucess', 'O bairro foi modificado com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao modificar o bairro');
                }
        }else{
            $conditions['id'] = $id;
            $data['bairro'] = $this->Bairro->get_where($conditions);
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
            $data['bairros'] = $this->Bairro->like($conditions)->get($this->results_per_page,$page);
            $config["total_rows"] = $this->Bairro->like($conditions)->count();

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
    $distritos = $this->Bairro->like('nome', $termo)->include_related('distrito')->get($this->results_per_page)->all_to_array(array('id','nome','distrito_nome'));
    echo json_encode($distritos);
    

}

}

/* End of file bairros.php */
/* Location: ./app/controllers/bairros.php */
