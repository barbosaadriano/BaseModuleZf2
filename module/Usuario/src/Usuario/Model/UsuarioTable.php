<?php

namespace Usuario\Model;
	
use Zend\Db\TableGateway\TableGateway;
/**
* 
*/
class UsuarioTable 
{
	
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	public function fetchAll() {
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}
	public function getUsuario($id) {
		$id = (int)$id;
		$rowset = $this->tableGateway->select(array('ID_USUARIO'=>$id));
		$row = $rowset->current();
		if (!$row) {
			throw new Exception("Não foi possível localizar o registro $id");
		}
		return $row;
	}
	public function saveUsuario(Usuario $usuario) {
		$data = array(
				'NM_USUARIO' => $usuario->ID_USUARIO,
			);
		$id = (int) $usuario->ID_USUARIO;
		if ($id== 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getUsuario($id)) {
				$this->tableGateway->update($data,array('ID_USUARIO',$id));
			} else {
				throw new Exception("Usuário inexistente");
			}
		}
	}	
	public function deleteUsuario($id) {
		$this->tableGateway->delete(array('ID_USUARIO',(int) $id));
	}
}