<?php


namespace Categoria\Controller;
use Base\Controller\AbstractController;
use Zend\View\Model\ViewModel;

/**
 * Description of IndexController
 *
 * @author Administrador
 */
class IndexController extends AbstractController{
 
    public function __construct() {
        $this->form = 'Categoria\Form\CategoryForm';
        $this->controller = 'categoria';
        $this->route = 'categoria/default';
        $this->service = 'Categoria\Service\CategoriaService';
        $this->entity = 'Categoria\Entity\Category';
    }

}
