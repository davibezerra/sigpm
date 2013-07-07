<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SistemaCategorias extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('SistemaCategoria');
    }
    
    public function index($pagina = NULL){
        
        $config["base_url"] = base_url() . $this->router->fetch_class()."/index";
        $config["total_rows"] = $this->SistemaCategoria->count();
        $config['choice'] = $config["total_rows"] / $this->results_per_page;
        $this->pagination->initialize($config);
        $page = ($pagina)? $pagina : 0;
        
        $data['categorias'] = $this->SistemaCategoria->get($this->results_per_page,$page);
        
        $data["links"] = $this->pagination->create_links();
        $data["total_rows"] = $config["total_rows"];
        
        $this->master_view($this->router->fetch_class()."/index", $data);

    }
    
    public function cadastrar(){        
        
        if($this->form_validation->run('sistemacategorias') == TRUE){
            $this->SistemaCategoria->status = $this->input->post('status');
            $this->SistemaCategoria->sistemamodulo_id = $this->input->post('sistemamodulo_id');
            $this->SistemaCategoria->nome = $this->input->post('nome');
            if($this->SistemaCategoria->save()){
                    $this->session->set_flashdata('sucess', 'A categoria foi cadastrada com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao cadastrar a categoria');
                }
        }else{
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method());            
        }
    }
    
    public function excluir($id=NULL){
        
        if($this->input->post('id')){
            $conditions['id'] = $this->input->post('id');
            $modulo = $this->SistemaCategoria->get_where($conditions);
               if($modulo->delete()){
                   $this->session->set_flashdata('sucess', 'A categoria foi excluida do sistema com sucesso');
                   redirect($this->router->fetch_class());
               }else{
                   $this->session->set_flashdata('error', 'Ocorreu um erro ao excluir a categoria');
               }
       }else{
            $conditions['id'] = $id;
            $data['categoria'] = $this->SistemaCategoria->get_where($conditions);
            if($id){
                $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
            }else{
                redirect($this->router->fetch_class());                
            }
       }

    }
    
    public function modificar($id = NULL){
         if($this->form_validation->run('sistemacategorias') == TRUE){
            $conditions['status'] = $this->input->post('status');
            $conditions['sistemamodulo_id'] = $this->input->post('sistemamodulo_id');
            $conditions['nome'] = $this->input->post('nome');
             if($this->SistemaCategoria->where('id',$this->input->post('id'))->update($conditions)){
                    $this->session->set_flashdata('sucess', 'As informações da categoria foram modificadas com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao modificar as informações da categoria');
                }
        }else{
            $conditions['id'] = $id;
            $data['categoria'] = $this->SistemaCategoria->get_where($conditions);
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
        $data['categorias'] = $this->SistemaCategoria->like($conditions)->get($this->results_per_page,$page);
        $data["resultados"] = $this->SistemaCategoria->like($conditions)->count();

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
        $output = $this->SistemaCategoria->like($conditions)->include_related('sistemamodulo')->get($this->results_per_page)->all_to_array(array('id','nome','sistemamodulo_nome'));
        echo json_encode($output);

} 

}

/* End of file sistemacategorias.php */
/* Location: ./app/controllers/sistemacategorias.php */
