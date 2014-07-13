<?php

namespace SpiceMe\ApiBundle\Controller\v1;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->get('doctrine')
            ->getEntityManager()
            ->createQuery('SELECT p from SpiceMeDomainBundle:Person p')
            ->getResult();
    }
    
    
}
