<?php

class Municipio extends DataMapper {

    var $table = "municipios";
    var $has_one = array('estado');
    var $has_many = array('distrito');

    function __construct($id = NULL){
        parent::__construct($id);
    }

}

/* End of file municipio.php */
/* Location: ./application/models/municipio.php */
