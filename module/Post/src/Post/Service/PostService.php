<?php

namespace Post\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

/**
 * Description of PostService
 *
 * @author Administrador
 */
class PostService extends AbstractService {

    public function __construct(EntityManager $em) {
        $this->entity = 'Post\Entity\Post';
        parent::__construct($em);
    }

    public function save(Array $data = array()) {
        $data['category'] = $this->em->getRepository('Categoria\Entity\Category')
                ->find($data['category']);
        return parent::save($data);
    }

}
