<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SistemaFuncoes extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('SistemaFuncao');
    }
    
    public function index($pagina = NULL){
        
        $config["base_url"] = base_url() . $this->router->fetch_class()."/index";
        $config["total_rows"] = $this->SistemaFuncao->count();
        $config['choice'] = $config["total_rows"] / $this->results_per_page;
        $this->pagination->initialize($config);
        $page = ($pagina)? $pagina : 0;
        
        $data['funcoes'] = $this->SistemaFuncao->get($this->results_per_page,$page);
        
        $data["links"] = $this->pagination->create_links();
        $data["total_rows"] = $config["total_rows"];
        
        $this->master_view($this->router->fetch_class()."/index", $data);

    }
    
    public function cadastrar(){        
        
        if($this->form_validation->run('sistemafuncoes') == TRUE){
            $this->SistemaFuncao->status = $this->input->post('status');
            $this->SistemaFuncao->sistemacategoria_id = $this->input->post('sistemacategoria_id');
            $this->SistemaFuncao->menu = $this->input->post('menu');
            $this->SistemaFuncao->classe = $this->input->post('classe');
            $this->SistemaFuncao->metodo = $this->input->post('metodo');
            $this->SistemaFuncao->nome = $this->input->post('nome');
            $this->SistemaFuncao->descricao = $this->input->post('descricao');
            if($this->SistemaFuncao->save()){
                    $this->session->set_flashdata('sucess', 'A funcionalidade foi cadastrada com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao cadastrar a funcionalidade');
                }
        }else{
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method());            
        }
    }
    
    public function excluir($id=NULL){
        
        if($this->input->post('id')){
            $conditions['id'] = $this->input->post('id');
            $funcao = $this->SistemaFuncao->get_where($conditions);
               if($funcao->delete()){
                   $this->session->set_flashdata('sucess', 'A funcionalidade foi excluida do sistema com sucesso');
                   redirect($this->router->fetch_class());
               }else{
                   $this->session->set_flashdata('error', 'Ocorreu um erro ao excluir a funcionalidade');
               }
       }else{
            $conditions['id'] = $id;
            $data['funcao'] = $this->SistemaFuncao->get_where($conditions);
            if($id){
                $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
            }else{
                redirect($this->router->fetch_class());                
            }
       }

    }
    
    public function modificar($id = NULL){
         if($this->form_validation->run('sistemafuncoes') == TRUE){
            $conditions['status'] = $this->input->post('status');
            $conditions['sistemacategoria_id'] = $this->input->post('sistemacategoria_id');
            $conditions['menu'] = $this->input->post('menu');
            $conditions['classe'] = $this->input->post('classe');
            $conditions['metodo'] = $this->input->post('metodo');
            $conditions['nome'] = $this->input->post('nome');
            $conditions['descricao'] = $this->input->post('descricao');
             if($this->SistemaFuncao->where('id',$this->input->post('id'))->update($conditions)){
                    $this->session->set_flashdata('sucess', 'As informações da funcionalidade foram modificadas com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao modificar as informações da funcionalidade');
                }
        }else{
            $conditions['id'] = $id;
            $data['funcao'] = $this->SistemaFuncao->get_where($conditions);
            if($id){
                $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
            }else{
                redirect($this->router->fetch_class());                
            }
        }
    }
    
    
public function buscar($termo = NULL, $offset = NULL){
        
    // verifica se foi digitado um termo para pesquisa    
    if($termo){

        $termo = urldecode($termo);
        $config["base_url"] = base_url() . $this->router->fetch_class()."/".$this->router->fetch_method()."/".$termo;
        $page = ($offset)? $offset : 0;

        $conditions['nome'] = $termo;
        $data['funcoes'] = $this->SistemaFuncao->like($conditions)->get($this->results_per_page,$page);
        $data["resultados"] = $this->SistemaFuncao->like($conditions)->count();

        $config['choice'] = $data["resultados"] / $this->results_per_page;
        $this->pagination->initialize($config);
        
        $data["links"] = $this->pagination->create_links();
        $data["termo"] = $termo;
        
        $this->master_view($this->router->fetch_class()."/index", $data);
        
    }else{
        
        redirect(base_url().$this->router->fetch_class());
        
    }
        
}
    
    public function processa_busca(){
        
        redirect(base_url().$this->router->fetch_class()."/buscar/".$this->input->post('termo'));
        
    }
    
public function live_search(){
        
        $conditions['nome'] = $this->input->post('termo');
        $output = $this->SistemaFuncao->like($conditions)->get($this->results_per_page)->all_to_array();
        echo json_encode($output);

}    
 
}

/* End of file sistemacategorias.php */
/* Location: ./app/controllers/sistemacategorias.php */
