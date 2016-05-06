<?php

 namespace Usuario\Model;

 class Usuario {
 	
 	public $ID_USUARIO;
 	public $NM_USUARIO;


 	public function exchangeArray($data) {
 		$this->ID_USUARIO = (!empty($data['ID_USUARIO'])) ? $data['ID_USUARIO'] : null;
 		$this->NM_USUARIO = (!empty($data['NM_USUARIO'])) ? $data['NM_USUARIO'] : null;
  	}

 }