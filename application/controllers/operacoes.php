<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operacoes extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Operacao');
    }
    
    public function index($pagina = NULL){
        
        $config["base_url"] = base_url() . $this->router->fetch_class()."/index";
        $config["total_rows"] = $this->Operacao->count();
        $config['choice'] = $config["total_rows"] / $this->results_per_page;
        $this->pagination->initialize($config);
        $page = ($pagina)? $pagina : 0;
        
        $data['operacoes'] = $this->Operacao->get($this->results_per_page,$page);
        
        $data["links"] = $this->pagination->create_links();
        $data["total_rows"] = $config["total_rows"];
        
        $this->master_view($this->router->fetch_class()."/index", $data);

    }
    
    public function cadastrar(){        
        
        if($this->form_validation->run('operacoes') == TRUE){
            $this->Operacao->status = $this->input->post('status');
            $this->Operacao->nome = $this->input->post('nome');
            if($this->Operacao->save()){
                    $this->session->set_flashdata('sucess', 'A operação foi cadastrada com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao cadastrar a operação');
                }
        }else{
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method());            
        }
    }
    
    public function excluir($id=NULL){
        
        if($this->input->post('id')){
            $conditions['id'] = $this->input->post('id');
            $funcao = $this->Operacao->get_where($conditions);
               if($funcao->delete()){
                   $this->session->set_flashdata('sucess', 'A operação foi excluida do sistema com sucesso');
                   redirect($this->router->fetch_class());
               }else{
                   $this->session->set_flashdata('error', 'Ocorreu um erro ao excluir a operação');
               }
       }else{
            $conditions['id'] = $id;
            $data['operacao'] = $this->Operacao->get_where($conditions);
            if($id){
                $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
            }else{
                redirect($this->router->fetch_class());                
            }
       }

    }
    
    public function modificar($id = NULL){
         if($this->form_validation->run('operacoes') == TRUE){
            $conditions['status'] = $this->input->post('status');
            $conditions['nome'] = $this->input->post('nome');
             if($this->Operacao->where('id',$this->input->post('id'))->update($conditions)){
                    $this->session->set_flashdata('sucess', 'As informações da operação foram modificadas com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao modificar as informações da operação');
                }
        }else{
            $conditions['id'] = $id;
            $data['operacao'] = $this->Operacao->get_where($conditions);
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
        $data['operacoes'] = $this->Operacao->like($conditions)->get($this->results_per_page,$page);
        $data["resultados"] = $this->Operacao->like($conditions)->count();

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
        $output = $this->Operacao->like($conditions)->get($this->results_per_page)->all_to_array();
        echo json_encode($output);

}    
 
}

/* End of file sistemacategorias.php */
/* Location: ./app/controllers/sistemacategorias.php */
