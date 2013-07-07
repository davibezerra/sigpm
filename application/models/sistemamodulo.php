<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SistemaModulo extends DataMapper {

    var $table = "sistemamodulos";
    var $has_many = array('sistemacategoria');
    
    function __construct($id = NULL){
        parent::__construct($id);
    }

}

/* End of file sistemamodulo.php */
/* Location: ./application/models/sistemamodulo.php */
