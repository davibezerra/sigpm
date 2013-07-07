<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Gerencia as informações cadastrais e sessões dos usuários logados no sistema
*
* @author Davi S. Bezerra <davi@cidadesol.com>
* @version 1.0 
* @copyright  GPL © 2013. 
* @access public
* @todo implementar métodos abaixo relacionados 
*/

class SistemaLogin extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    /** 
    * Exibe o formulário inicial para o login 
    * @access public 
    * @return void 
    */
    public function index(){
        
        $this->master_view($this->router->fetch_class()."/index");

    }
    
    /** 
    * Recebe os valores digitados pelo usuário e verifica se estão corretos para autenticar uma sessão 
    * @access public
    * @param int $cpf CPF do usuário| string $senha Senha do usuário 
    * @return void 
    */
    public function processa(){
        
        //
        
    }
    
    /** 
    * Envia uma solicitação de recuperação de senha para o email ou celular do usuário 
    * @access public
    * @param int $cpf CPF do usuário
    * @return void 
    */
    public function solicitamodificacao(){
        
        //
        
    }
    
    /** 
    * Processa modificação de senha para uma determinada conta
    * @access public
    * @param int $chave Chave de acesso recebida pelo email ou celular do usuário
    * @return void 
    */
    public function processamodificacao(){
        
        //
        
    }
    
}

/* End of file sistemalogin.php */
/* Location: ./app/controllers/sistemalogin.php */