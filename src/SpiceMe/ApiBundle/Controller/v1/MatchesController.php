<?php

namespace SpiceMe\ApiBundle\Controller\v1;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;


class MatchesController extends Controller
{
    /**
     * Returns a collection of Task
     *
     * @QueryParam(name="distance", nullable=false, requirements="\d+")
     * @ApiDoc()
     *
     * @return JsonResponse
     */
    public function getAction(Request $request)
    {
      //          return $request->query->get('distance');

        
        return $this->get('doctrine')
            ->getConnection()
            ->query("SELECT * from `PersonMatch`")
          //  ->execute()
            ->fetchAll();
        
//        return array(1,2,3,$result ); 
        
    }
    
    public function putAction()
    {
        return $this->get('doctrine')
            ->getEntityManager()
            ->createQuery('SELECT p from SpiceMeDomainBundle:Person p')
            ->getResult();
    }
    
}
