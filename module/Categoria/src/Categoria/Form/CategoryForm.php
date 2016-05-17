<?php

namespace Categoria\Form;

use Zend\Form\Form;
use Zend\Form\Element\Button;
use Zend\Form\Element\Text;
use Categoria\Form\CategoryFilter;

/**
 * Description of CategoryForm
 *
 * @author Administrador
 */
class CategoryForm extends Form {

    public function __construct() {
        parent::__construct(null);
        $this->setAttribute("method", "POST");
        $this->setAttribute("class", "form-horizontal");

        $this->setInputFilter(new CategoryFilter());

        $nome = new Text("nome");
        $nome->setLabel("Nome");
        $nome->setAttributes(array(
            'maxlength' => 45,
            'class'=>'form-control',
        ));
        $this->add($nome);

        $button = new Button('submit');
        $button->setLabel("Salvar")
                ->setAttributes(array(
                    'type' => 'submit',
                    'class' => 'btn btn-primary',
        ));
        $this->add($button);
    }

}
