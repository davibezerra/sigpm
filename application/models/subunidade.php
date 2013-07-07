<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SubUnidade extends DataMapper {

    var $table = "subunidades";

    var $has_one = array('unidade');
    var $has_many = array('logradouro');
    
    function __construct($id = NULL){
        parent::__construct($id);
    }

}

/* End of file unidade.php */
/* Location: ./application/models/unidade.php */
