<?php

namespace Post\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\Filter\StripTags;
use Zend\Filter\StringTrim;
use Zend\Validator\NotEmpty;
use Zend\Validator\InArray;

/**
 * Description of PostFilter
 *
 * @author Administrador
 */
class PostFilter extends InputFilter {

    protected $categoria;

    public function __construct(Array $categoria = array()) {
        $this->categoria = $categoria;
        $nome = new Input("titulo");
        $nome->setRequired(true)
                ->getFilterChain()->attach(new StringTrim())
                ->attach(new StripTags());
        $nome->getValidatorChain()->attach(new NotEmpty());
        $this->add($nome);

        $desc = new Input("descricao");
        $desc->setRequired(false)
                ->getFilterChain()->attach(new StringTrim())
                ->attach(new StripTags());
        $this->add($desc);

        $inArray = new InArray();
        $inArray->setOptions(array('haystack' => $this->haystack($this->categoria)));

        $categoria = new Input('category');
        $categoria->setRequired(true)
                ->getFilterChain()->attach(new StripTags())
                ->attach(new StringTrim());
        $categoria->getValidatorChain()->attach($inArray);
        $this->add($categoria);
    }

    public function haystack(Array $haystack = array()) {
        $array = array();
        foreach ($haystack as $value) {
            if ($value)
                $array[$value['value']] = $value['label'];
        }
        return array_keys($array);
    }

}
