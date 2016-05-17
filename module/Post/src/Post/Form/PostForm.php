<?php

namespace Post\Form;

use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\Form\Form;
use Zend\Form\Element\Button;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Element\Checkbox;
use DoctrineModule\Form\Element\ObjectSelect;
use Post\Form\PostFilter;

/**
 * Description of PostForm
 *
 * @author Administrador
 */
class PostForm extends Form implements ObjectManagerAwareInterface {

    protected $objectManager;

    public function __construct(ObjectManager $objectManager) {
        $this->setObjectManager($objectManager);
        parent::__construct(null);
        $this->setAttribute("method", "POST");
        



        $titulo = new Text("titulo");
        $titulo->setLabel("Título");
        $titulo->setAttributes(array(
            'maxlength' => 45,
            'class' => 'form-control',
        ));
        $this->add($titulo);

        $descricao = new Textarea("descricao");
        $descricao->setLabel("Descrição");
        $descricao->setAttributes(array(
            'class' => 'form-control',
        ));
        $this->add($descricao);

        $ativo = new Checkbox('ativo');
        $ativo->setLabel("Ativo");
        $this->add($ativo);

        $categoria = new ObjectSelect('category');
        $categoria->setLabel("Categoria");
        $categoria->setAttributes(array(
            'class' => 'form-control',
        ));
        $categoria->setOptions(array(
            'object_manager' => $this->getObjectManager(),
            'target_class' => 'Categoria\Entity\Category',
            'property' => 'nome',
            'empty_option' => '--Selecione uma opção--',
            'is_method' => true,
            'find_method' => array(
                'name' => 'findBy',
                'params' => array(
                    'criteria' => array(),
                    'orderBy' => array('nome' => 'ASC'),
                ),
            ),
        ));
        
        $this->add($categoria);
        $button = new Button('submit');
        $button->setLabel("Salvar")
                ->setAttributes(array(
                    'type' => 'submit',
                    'class' => 'btn btn-primary',
        ));
        $this->add($button);
        $this->setInputFilter(new PostFilter($categoria->getValueOptions()));
    }

    public function getObjectManager() {
        return $this->objectManager;
    }

    public function setObjectManager(ObjectManager $objectManager) {
        $this->objectManager = $objectManager;
    }

}
