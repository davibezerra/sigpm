<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SistemaGrupos extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('SistemaGrupo');
    }
    
    public function index($pagina = NULL){
        
        $config["base_url"] = base_url() . $this->router->fetch_class()."/index";
        $config["total_rows"] = $this->SistemaGrupo->count();
        $config['choice'] = $config["total_rows"] / $this->results_per_page;
        $this->pagination->initialize($config);
        $page = ($pagina)? $pagina : 0;
        
        $data['grupos'] = $this->SistemaGrupo->get($this->results_per_page,$page);
        
        $data["links"] = $this->pagination->create_links();
        $data["total_rows"] = $config["total_rows"];
        
        $this->master_view($this->router->fetch_class()."/index", $data);

    }
    
    public function cadastrar(){        
        
        if($this->form_validation->run('sistemagrupos') == TRUE){
            $this->SistemaGrupo->unidade_id = $this->input->post('unidade_id');
            $this->SistemaGrupo->nome = $this->input->post('nome');
            if($this->SistemaGrupo->save()){
                    $this->session->set_flashdata('sucess', 'O grupo foi cadastrado com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao cadastrar o grupo');
                }
        }else{
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method());            
        }
    }
    
    public function excluir($id=NULL){
        
        if($this->input->post('id')){
            $conditions['id'] = $this->input->post('id');
            $modulo = $this->SistemaGrupo->get_where($conditions);
               if($modulo->delete()){
                   $this->session->set_flashdata('sucess', 'O grupo foi excluido do sistema com sucesso');
                   redirect($this->router->fetch_class());
               }else{
                   $this->session->set_flashdata('error', 'Ocorreu um erro ao excluir o grupo');
               }
       }else{
            $conditions['id'] = $id;
            $data['grupo'] = $this->SistemaGrupo->get_where($conditions);
            if($id){
                $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
            }else{
                redirect($this->router->fetch_class());                
            }
       }

    }
    
    public function modificar($id = NULL){
         if($this->form_validation->run('sistemagrupos') == TRUE){
            $conditions['unidade_id'] = $this->input->post('unidade_id');
            $conditions['nome'] = $this->input->post('nome');
             if($this->SistemaGrupo->where('id',$this->input->post('id'))->update($conditions)){
                    $this->session->set_flashdata('sucess', 'As informações do grupo foram modificadas com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao modificar as informações do grupo');
                }
        }else{
            $conditions['id'] = $id;
            $data['grupo'] = $this->SistemaGrupo->get_where($conditions);
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
        $data['grupos'] = $this->SistemaGrupo->like($conditions)->get($this->results_per_page,$page);
        $data["resultados"] = $this->SistemaGrupo->like($conditions)->count();

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
        $output = $this->SistemaGrupo->like($conditions)->get($this->results_per_page)->all_to_array();
        echo json_encode($output);

}    
 
}

/* End of file sistemagrupos.php */
/* Location: ./app/controllers/sistemagrupos.php */
