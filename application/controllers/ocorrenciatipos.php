<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OcorrenciaTipos extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('OcorrenciaTipo');
    }
    
    public function index($pagina = NULL){
        
        $config["base_url"] = base_url() . $this->router->fetch_class()."/index";
        $config["total_rows"] = $this->OcorrenciaTipo->count();
        $config['choice'] = $config["total_rows"] / $this->results_per_page;
        $this->pagination->initialize($config);
        $page = ($pagina)? $pagina : 0;
        
        $data['tipos'] = $this->OcorrenciaTipo->get($this->results_per_page,$page);
        
        $data["links"] = $this->pagination->create_links();
        $data["total_rows"] = $config["total_rows"];
        
        $this->master_view($this->router->fetch_class()."/index", $data);

    }
    
    public function cadastrar(){        
        
        if($this->form_validation->run('ocorrenciatipos') == TRUE){
            $this->OcorrenciaTipo->nome = $this->input->post('nome');
            $this->OcorrenciaTipo->ocorrenciacategoria_id = $this->input->post('ocorrenciacategoria_id');
            if($this->OcorrenciaTipo->save()){
                    $this->session->set_flashdata('sucess', 'O tipo de ocorrência foi cadastrado com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao cadastrar o tipo de ocorrência');
                }
        }else{
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method());            
        }
    }
    
    public function excluir($id=NULL){
        
        if($this->input->post('id')){
            $conditions['id'] = $this->input->post('id');
            $tipos = $this->OcorrenciaTipo->get_where($conditions);
               if($tipos->delete()){
                   $this->session->set_flashdata('sucess', 'O tipo de ocorrência foi excluido do sistema com sucesso');
                   redirect($this->router->fetch_class());
               }else{
                   $this->session->set_flashdata('error', 'Ocorreu um erro ao excluir o tipo de ocorrência');
               }
       }else{
            $conditions['id'] = $id;
            $data['tipo'] = $this->OcorrenciaTipo->get_where($conditions);
            if($id){
                $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
            }else{
                redirect($this->router->fetch_class());                
            }
       }

    }
    
    public function modificar($id = NULL){
         if($this->form_validation->run('ocorrenciatipos') == TRUE){
            $conditions['nome'] = $this->input->post('nome');
            $conditions['ocorrenciacategoria_id'] = $this->input->post('ocorrenciacategoria_id');
             if($this->OcorrenciaTipo->where('id',$this->input->post('id'))->update($conditions)){
                    $this->session->set_flashdata('sucess', 'As informações do tipo de ocorrência foram modificadas com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao modificar as informações do tipo de ocorrência');
                }
        }else{
            $conditions['id'] = $id;
            $data['tipo'] = $this->OcorrenciaTipo->get_where($conditions);
            if($id){
                $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
            }else{
                redirect($this->router->fetch_class());                
            }
        }
    }
    
    
public function buscar($termo = NULL, $pagina = NULL){
        
    // verifica se foi digitado um termo para pesquisa    
    if($termo){

        $termo = urldecode($termo);
        $config["base_url"] = base_url() . $this->router->fetch_class()."/".$this->router->fetch_method()."/".$termo;
        $page = ($pagina)? $pagina : 0;

        $conditions['nome'] = $termo;
        $data['tipos'] = $this->OcorrenciaTipo->like($conditions)->get($this->results_per_page,$page);
        $config["total_rows"] = $this->OcorrenciaTipo->like($conditions)->count();

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
    
    public function processa_busca(){
        
        redirect(base_url().$this->router->fetch_class()."/buscar/".$this->input->post('termo'));
        
    }
    
public function live_search(){
        
        $conditions['nome'] = $this->input->post('termo');
        $output = $this->OcorrenciaTipo->like($conditions)->get($this->results_per_page)->all_to_array();
        echo json_encode($output);

}    
 
}

/* End of file ocorrenciatipos.php */
/* Location: ./app/controllers/ocorrenciatipos.php */
