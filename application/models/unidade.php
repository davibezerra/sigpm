<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unidade extends DataMapper {

    var $table = "unidades";

    var $has_one = array('logradouro','unidade');
    var $has_many = array('subunidade','sistemagrupo');
    
    function __construct($id = NULL){
        parent::__construct($id);
    }

}

/* End of file unidade.php */
/* Location: ./application/models/unidade.php */
