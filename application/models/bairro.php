<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bairro extends DataMapper {

    var $table = "bairros";
    var $has_one = array('distrito');
    var $has_many = array('logradouro');

    function __construct($id = NULL){
        parent::__construct($id);
    }

}

/* End of file country.php */
/* Location: ./application/models/bairro.php */
