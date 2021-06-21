<?php
/*
Authora: Eugenia bahit
*/
importar('core/mvc_engine/helper');

abstract class Controller  {

    public function __construct($metodo='', $arg='', $api=false) {
        $this->api     = $api;
        $this->apidata = '';
        $this->model   = MVCEngineHelper::get_model($this); 
        $this->view    = MVCEngineHelper::get_view($this);
        
        
        if(method_exists($this, $metodo)) {
            //--- llamar la clase con su método correspondiente, 
            //--- y le manda los argumentos correspondientes en caso de que sea necesario
            call_user_func([$this, $metodo], $arg);
        } else {
            HTTPHelper::go(DEFAULT_VIEW);
        }
    }
}

?>