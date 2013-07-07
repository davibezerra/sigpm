<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LogradouroTipo extends DataMapper {

    var $table = "logradourotipos";
    var $has_many = array('logradouro');

    function __construct($id = NULL){
        parent::__construct($id);
    }

}

/* End of file country.php */
/* Location: ./application/models/logradourotipo.php */
