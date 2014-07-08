<?php

namespace Astromatch\ApiBundle\Controller\v1;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->get('doctrine')
            ->getConnection()
            ->query('SELECT VERSION();')
            ->fetchAll()[0];
    }
}
