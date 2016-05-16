<?php

namespace Base\Entity;

use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Description of AbstractEntity
 *
 * @author Administrador
 */
abstract class AbstractEntity {

    /**
     * 
     * @param array $options
     */
    public function __construct(Array $options = array()) {
        $hydrator = new ClassMethods();
        $hydrator->hydrate($options, $this);
    }

    /**
     * 
     * @return array
     */
    public function toArray() {
        $hydrator = new ClassMethods();
        return $hydrator->extract($this);
    }

}
