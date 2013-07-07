<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estado extends DataMapper {

    var $table = "estados";
    var $has_many = array('municipio');

    function __construct($id = NULL){
        parent::__construct($id);
    }

}

/* End of file estado.php */
/* Location: ./application/models/estado.php */
