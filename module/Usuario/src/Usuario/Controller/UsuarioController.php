<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Usuario\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UsuarioController extends AbstractActionController
{

    protected $usuarioTable;

    public function indexAction()
    {

        $var =  'Olá Mundo';
        return new ViewModel(
                array(
                        'olaMundo' => $var,
                        'usuarios' => $this->getUsuarioTable()->fetchAll(),
                    )
            );
    }
    public function fooAction() {
    	$var =  'Adriano Barbosa';
        return new ViewModel(
                array(
                        'adbar' => $var,
                    )
            );	
    }

    public function getUsuarioTable() {
        if (!$this->usuarioTable) {
            $sm = $this->getServiceLocator();
            $this->usuarioTable = $sm->get('Usuario\Model\UsuarioTable');
        }
        return $this->usuarioTable;
    }
}
