<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distrito extends DataMapper {

    var $table = "distritos";
    var $has_one = array('municipio');
    var $has_many = array('bairro');

    function __construct($id = NULL){
        parent::__construct($id);
    }

}

/* End of file country.php */
/* Location: ./application/models/distrito.php */
