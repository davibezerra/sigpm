<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OcorrenciaAtribuicoes extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('OcorrenciaAtribuicao');
    }
    
    public function index($pagina = NULL){
        
        $config["base_url"] = base_url() . $this->router->fetch_class()."/index";
        $config["total_rows"] = $this->OcorrenciaAtribuicao->count();
        $config['choice'] = $config["total_rows"] / $this->results_per_page;
        $this->pagination->initialize($config);
        $page = ($pagina)? $pagina : 0;
        
        $data['uf'] = $this->OcorrenciaAtribuicao->get($this->results_per_page,$page);
        
        $data["links"] = $this->pagination->create_links();
        $data["total_rows"] = $config["total_rows"];
        
        $this->master_view($this->router->fetch_class()."/index", $data);

    }
    
    public function cadastrar(){        
        
        if($this->form_validation->run('ocorrenciaatribuicoes') == TRUE){
            $this->OcorrenciaAtribuicao->nome = $this->input->post('nome');
            if($this->OcorrenciaAtribuicao->save()){
                    $this->session->set_flashdata('sucess', 'O Estado foi cadastrado com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao cadastrar o Estado');
                }
        }else{
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method());            
        }
    }
    
    public function excluir($id=NULL){
        
        if($this->input->post('id')){
            $conditions['id'] = $this->input->post('id');
            $uf = $this->OcorrenciaAtribuicao->get_where($conditions);
               if($uf->delete()){
                   $this->session->set_flashdata('sucess', 'O Estado foi excluido do sistema com sucesso');
                   redirect($this->router->fetch_class());
               }else{
                   $this->session->set_flashdata('error', 'Ocorreu um erro ao excluir o Estado');
               }
       }else{
            $conditions['id'] = $id;
            $data['uf'] = $this->OcorrenciaAtribuicao->get_where($conditions);
            if($id){
                $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
            }else{
                redirect($this->router->fetch_class());                
            }
       }

    }
    
    public function modificar($id = NULL){
         if($this->form_validation->run('estados') == TRUE){
            $conditions['nome'] = $this->input->post('nome');
            $conditions['sigla'] = $this->input->post('sigla');
             if($this->Estado->where('id',$this->input->post('id'))->update($conditions)){
                    $this->session->set_flashdata('sucess', 'As informações do Estado foram modificadas com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao modificar as informações do Estado');
                }
        }else{
            $conditions['id'] = $id;
            $data['uf'] = $this->Estado->get_where($conditions);
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
        $data['uf'] = $this->Estado->like($conditions)->get($this->results_per_page,$page);
        $config["total_rows"] = $this->Estado->like($conditions)->count();

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
        $output = $this->Estado->like($conditions)->get($this->results_per_page)->all_to_array();
        echo json_encode($output);

}    
 
}

/* End of file estados.php */
/* Location: ./app/controllers/estados.php */
