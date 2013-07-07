<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Gerencia as informações dos estados cadastrados no sistema
*
* @author Davi S. Bezerra <davi@cidadesol.com>
* @version 1.0 
* @copyright  GPL © 2013. 
* @access public  
*/

class Estados extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Estado');
    }
    
    /** 
    * Relação dos estados cadastrados no sistema 
    * @access public 
    * @param Int $pagina
    * @return void 
    */
    public function index($pagina = NULL){
        
        $config["base_url"] = base_url() . $this->router->fetch_class()."/index";
        $config["total_rows"] = $this->Estado->count();
        $config['choice'] = $config["total_rows"] / $this->results_per_page;
        $this->pagination->initialize($config);
        $page = ($pagina)? $pagina : 0;
        
        $data['uf'] = $this->Estado->get($this->results_per_page,$page);
        
        $data["links"] = $this->pagination->create_links();
        $data["total_rows"] = $config["total_rows"];
        
        $this->master_view($this->router->fetch_class()."/index", $data);

    }
    
    /** 
    * Cadastra um estado no sistema 
    * @access public 
    * @return void 
    */
    public function cadastrar(){        
        
        if($this->form_validation->run('estados') == TRUE){
            $this->Estado->nome = $this->input->post('nome');
            $this->Estado->sigla = $this->input->post('sigla');
            if($this->Estado->save()){
                    $this->session->set_flashdata('sucess', 'O Estado foi cadastrado com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao cadastrar o Estado');
                }
        }else{
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method());            
        }
    }
    
    /** 
    * Exclui um estado no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
    public function excluir($id=NULL){
        
        if($this->input->post('id')){
            $conditions['id'] = $this->input->post('id');
            $uf = $this->Estado->get_where($conditions);
               if($uf->delete()){
                   $this->session->set_flashdata('sucess', 'O Estado foi excluido do sistema com sucesso');
                   redirect($this->router->fetch_class());
               }else{
                   $this->session->set_flashdata('error', 'Ocorreu um erro ao excluir o Estado');
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
    
    /** 
    * Modifica as informações de um estado cadastrado no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
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
    
    
    /** 
    * Recebe o termo enviado pelo método processa_busca() e o exibe os resultados da pesquisa 
    * @access public 
    * @param String $termo $pagina
    * @return void 
    */
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
    
    /** 
    * Método que recebe o parâmetro da pesquisa digitado pelo usuário e o redireciona para o método @buscar 
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
        
        // indica as colunas que deseja imprimir no vetor de saída
        $saida = array('id','nome','sigla');
        
        $conditions['nome'] = $this->input->post('termo');
        $output = $this->Estado->like($conditions)->get($this->results_per_page)->all_to_array($saida);
        echo json_encode($output);

    }    
 
}

/* End of file estados.php */
/* Location: ./app/controllers/estados.php */