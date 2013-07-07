<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hierarquias extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Hierarquia');
    }
    
    public function index($pagina = NULL){
        
        $config["base_url"] = base_url() . $this->router->fetch_class()."/index";
        $config["total_rows"] = $this->Hierarquia->count();
        $config['choice'] = $config["total_rows"] / $this->results_per_page;
        $this->pagination->initialize($config);
        $page = ($pagina)? $pagina : 0;
        
        $data['hierarquias'] = $this->Hierarquia->get($this->results_per_page,$page);
        
        $data["links"] = $this->pagination->create_links();
        $data["total_rows"] = $config["total_rows"];
        
        $this->master_view($this->router->fetch_class()."/index", $data);

    }
    
    public function cadastrar(){        
        
        if($this->form_validation->run('hierarquias') == TRUE){
            $this->Hierarquia->nome = $this->input->post('nome');
            if($this->Hierarquia->save()){
                    $this->session->set_flashdata('sucess', 'A Hierarquia foi cadastrada com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao cadastrar a Hierarquia');
                }
        }else{
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method());            
        }
    }
    
    public function excluir($id=NULL){
        
        if($this->input->post('id')){
            $conditions['id'] = $this->input->post('id');
            $uf = $this->Hierarquia->get_where($conditions);
               if($uf->delete()){
                   $this->session->set_flashdata('sucess', 'A hierarquia foi excluida do sistema com sucesso');
                   redirect($this->router->fetch_class());
               }else{
                   $this->session->set_flashdata('error', 'Ocorreu um erro ao excluir a Hierarquia');
               }
       }else{
            $conditions['id'] = $id;
            $data['hierarquia'] = $this->Hierarquia->get_where($conditions);
            if($id){
                $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
            }else{
                redirect($this->router->fetch_class());                
            }
       }

    }
    
    public function modificar($id = NULL){
         if($this->form_validation->run('hierarquias') == TRUE){
            $conditions['id'] = $this->input->post('id');
            $conditions['nome'] = $this->input->post('nome');
             if($this->Hierarquia->where('id',$this->input->post('id_old'))->update($conditions)){
                    $this->session->set_flashdata('sucess', 'As informações da Hierarquia foram modificadas com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao modificar as informações da Hierarquia');
                }
        }else{
            $conditions['id'] = $id;
            $data['hierarquia'] = $this->Hierarquia->get_where($conditions);
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
        $data['hierarquias'] = $this->Hierarquia->like($conditions)->get($this->results_per_page,$page);
        $config["total_rows"] = $this->Hierarquia->like($conditions)->count();

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
        $output = $this->Hierarquia->like($conditions)->get($this->results_per_page)->all_to_array();
        echo json_encode($output);

}    
 
}

/* End of file hierarquias.php */
/* Location: ./app/controllers/hierarquias.php */
