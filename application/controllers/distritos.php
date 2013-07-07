<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Gerencia as informações dos distritos cadastrados no sistema
*
* @author Davi S. Bezerra <davi@cidadesol.com>
* @version 1.0 
* @copyright  GPL © 2013. 
* @access public  
*/

class Distritos extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Distrito');
    }
    
    /** 
    * Relação dos distritos cadastrados no sistema 
    * @access public 
    * @param Int $pagina
    * @return void 
    */
    public function index($pagina = NULL){
        
        $config["base_url"] = base_url() . $this->router->fetch_class()."/index";
        $config["total_rows"] = $this->Distrito->count();
        $config['choice'] = $config["total_rows"] / $this->results_per_page;
        $this->pagination->initialize($config);
        $page = ($pagina)? $pagina : 0;
        
        $data['distritos'] = $this->Distrito->get($this->results_per_page,$page);
        $data["links"] = $this->pagination->create_links();
        
        $this->master_view($this->router->fetch_class()."/index", $data);        

    }
    
    /** 
    * Cadastra um distrito no sistema 
    * @access public 
    * @return void 
    */
    public function cadastrar(){        
        
        if($this->form_validation->run('distritos') == TRUE){
            $this->Distrito->municipio_id = $this->input->post('municipio_id');
            $this->Distrito->nome = $this->input->post('nome');
            if($this->Distrito->save()){
                    $this->session->set_flashdata('sucess', 'O distrito foi cadastrado com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao cadastrar o distrito');
                }
        }else{
            $estados = new Estado;
            foreach($estados->get() as $estado){
                $data['estados'][$estado->id] = $estado->nome;
            }
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);            
        }
    }
    
    /** 
    * Detalha as informações de um distrito cadastrado no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
    public function detalhar($id){
        $conditions['id'] = $id;
        $data['municipio'] = $this->Municipio->get_where($conditions);
            if($id){
                $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
            }else{
                redirect($this->router->fetch_class());                
            }
    }

    /** 
    * Exclui um distrito cadatsrado no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
    public function excluir($id){
        
        if($this->input->post('id')){
            $conditions['id'] = $this->input->post('id');
               if($this->Distrito->get_where($conditions)->delete()){
                   $this->session->set_flashdata('sucess', 'O distrito foi excluído com sucesso');
                   redirect($this->router->fetch_class());
               }else{
                   $this->session->set_flashdata('error', 'Ocorreu um erro ao excluir o distrito');
               }
       }else{
            $conditions['id'] = $id;
            $data['distrito'] = $this->Distrito->get_where($conditions);
            if($id){
                $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
            }else{
                redirect($this->router->fetch_class());                
            }
       }

    }
    
    /** 
    * Modifica as informações de um distrito cadastrado no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
    public function modificar($id = NULL){
         if($this->form_validation->run('distritos') == TRUE){
            $conditions['municipio_id'] = $this->input->post('municipio_id');
            $conditions['nome'] = $this->input->post('nome');
             if($this->Distrito->where('id',$this->input->post('id'))->update($conditions)){
                    $this->session->set_flashdata('sucess', 'As informações do distrito foram modificadas com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao modificar as informações do distrito');
                }
        }else{
            $conditions['id'] = $id;
            $data['distrito'] = $this->Distrito->get_where($conditions);
            if($id){
                $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
            }else{
                redirect($this->router->fetch_class());                
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
            $data['distritos'] = $this->Distrito->like($conditions)->get($this->results_per_page,$page);
            $config["total_rows"] = $this->Distrito->like($conditions)->count();

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
    $distritos = $this->Distrito->where_in_related_municipio('id',$this->user_municipios)->like('nome', $termo)->include_related('municipio')->get($this->results_per_page)->all_to_array(array('id','nome','municipio_nome'));
    echo json_encode($distritos);
    

    }


}

/* End of file distritos.php */
/* Location: ./app/controllers/distritos.php */
