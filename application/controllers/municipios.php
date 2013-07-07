<?php

/** 
* Gerencia as informações dos municípios cadastrados no sistema
*
* @author Davi S. Bezerra <davi@cidadesol.com>
* @version 1.0 
* @copyright  GPL © 2013. 
* @access public  
*/

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Municipios extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Municipio');

    }
    
    /** 
    * Relação dos municípios cadastrados no sistema 
    * @access public 
    * @param Int $pagina
    * @return void 
    */
    public function index($pagina = NULL){
        
        $config["base_url"] = base_url() . $this->router->fetch_class()."/index";
        $config["total_rows"] = $this->Municipio->count();
        $config['choice'] = $config["total_rows"] / $this->results_per_page;
        $this->pagination->initialize($config);
        $page = ($pagina)? $pagina : 0;
        
        $data['municipios'] = $this->Municipio->get($this->results_per_page,$page);
        $data["links"] = $this->pagination->create_links();
        
        $this->master_view($this->router->fetch_class()."/index", $data);

    }
    
    /** 
    * Cadastra um município no sistema 
    * @access public 
    * @return void 
    */
    public function cadastrar(){        
        
        if($this->form_validation->run('municipios') == TRUE){
            $this->Municipio->estado_id = $this->input->post('estado_id');
            $this->Municipio->nome = $this->input->post('nome');
            if($this->Municipio->save()){
                    $this->session->set_flashdata('sucess', 'O Município foi cadastrado com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao cadastrar o Município');
                }
        }else{
            $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method());            
        }
    }
    
    /** 
    * Exclui um município no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
    public function excluir($id){
        
        if($this->input->post('id')){
            $conditions['id'] = $this->input->post('id');
               if($this->Municipio->get_where($conditions)->delete()){
                   $this->session->set_flashdata('sucess', 'O Município foi excluído com sucesso');
                   redirect($this->router->fetch_class());
               }else{
                   $this->session->set_flashdata('error', 'Ocorreu um erro ao excluir o Município');
               }
       }else{
            $conditions['id'] = $id;
            $data['municipio'] = $this->Municipio->get_where($conditions);
            if($id){
                $this->master_view($this->router->fetch_class().'/'.$this->router->fetch_method(),$data);
            }else{
                redirect($this->router->fetch_class());                
            }
       }

    }
    
    /** 
    * Modifica as informações de um município cadastrado no sistema 
    * @access public
    * @param $id 
    * @return void 
    */
    public function modificar($id = NULL){
         if($this->form_validation->run('municipios') == TRUE){
            $conditions['estado_id'] = $this->input->post('estado_id');
            $conditions['nome'] = $this->input->post('nome');
             if($this->Municipio->where('id',$this->input->post('id'))->update($conditions)){
                    $this->session->set_flashdata('sucess', 'As informações do Município foram modificadas com sucesso');
                    redirect($this->router->fetch_class());
                }else{
                    $this->session->set_flashdata('error', 'Ocorreu um erro ao modificar o Município');
                }
        }else{
            $conditions['id'] = $id;
            $data['municipio'] = $this->Municipio->get_where($conditions);
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
        $data['municipios'] = $this->Municipio->like($conditions)->get($this->results_per_page,$page);
        $config["total_rows"] = $this->Municipio->like($conditions)->count();

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
    $output = $this->Municipio->like('nome', $termo)->get($this->results_per_page)->all_to_array();
    echo json_encode($output);

    }
    
}

/* End of file municipios.php */
/* Location: ./app/controllers/municipios.php */