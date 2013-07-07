<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logradouro extends DataMapper {

    var $table = "logradouros";
    var $has_one = array('bairro','logradourotipo','subunidade');
    var $has_many = array('unidade');

    function __construct($id = NULL){
        parent::__construct($id);
    }

}

/* End of file country.php */
/* Location: ./application/models/logradouro.php */
