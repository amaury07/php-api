<?php

namespace SpiceMe\ApiBundle\Controller\v1;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Facebook\FacebookSession ;
use Facebook\FacebookRequest ;
use Facebook\Exceptions\FacebookRequestException ;

use Facebook\GraphNodes\GraphUser;
use Facebook\GraphNodes\GraphLocation ;

use SpiceMe\DomainBundle\Entity\Person;

class RegisterController extends Controller
{
    /**
     * Returns a collection of Task
     *
     * 
     * @ApiDoc()
     *
     * @return JsonResponse
     */
    public function getAction(Request $request)
    {
      //          return $request->query->get('distance');

        
        return $this->get('doctrine')
            ->getConnection()
            ->query("SELECT * from `Match`")
            ->fetchAll();
        
//        return array(1,2,3,$result ); 
        
    }
    
     /**
     * Creater a new user
     * 
     * **Request Format**
     * 
     *      {
     *        "birth_latitude": -8.345,
     *        "birth_longitude": 42.3,
     *        "latitude": -8.345,
     *        "longitude": 42.3,
     *        "birthdate_locale":"1982-11-25 13:05:00"
     *        "fb_access_token": "lkjhgytr567yu8iko"
     *      }
     *
     * **Response Format**
     * 
     *      {
     *        "person": {
     *              ...
     *        }
     *      }  
     *   
     * @QueryParam(name="fb_access_token", nullable=false, requirements="\d+")
     * @QueryParam(name="birthdate_locale", nullable=true, requirements="[0-9a-zA-Z: ]+")
     * @QueryParam(name="birth_latitude", nullable=true, requirements="\d+")
     * @QueryParam(name="birth_longitude", nullable=true, requirements="\d+")
     * @QueryParam(name="current_latitude", nullable=true, requirements="\d+")
     * @QueryParam(name="current_longitude", nullable=true, requirements="\d+")
     * @ApiDoc()
     *
     * @return JsonResponse
     */
    
    public function putAction(Request $request)
    {
        
        // *******************  GET CONFIG ****************************/        
        $fbAppId = $this->container->getParameter('spiceme_fb_app_id');
        $fbAppSecret = $this->container->getParameter('spiceme_fb_secret');

/***************  GET Content DATA ********************/
        $content = json_decode($request->getContent());
        if (!$content) {
            throw new HttpException(400, json_encode(['error' => 'Input data is not a valid json file']));
        }        
/*        $birthLatitude = $content->current_latitude;
        $birthLongitude = $content->current_longitude;  */
        $latitude = $content->latitude;
        $longitude = $content->longitude;

        $fbAccessToken = $content->fb_access_token;
        
/******************   CHECK FACEBOOK SESSION ********************/      
        FacebookSession::setDefaultApplication($fbAppId, $fbAppSecret);
        try{
            $session = new FacebookSession($fbAccessToken);
            $request = new FacebookRequest($session, 'GET', '/me');
            $response = $request->execute();
            $graphObject = $response->getGraphObject();;
            // Get the response typed as a GraphUser
            $fbuser = $response->getGraphObject(GraphUser::className());
             
            // Get the response typed as a GraphLocation
            $fblocation = $response->getGraphObject(GraphLocation::className());
            // SessionInfo example
            $fbsession = $session->getSessionInfo();
            
        } catch(FacebookRequestException $ex) {
            // When Facebook returns an error
            throw $this->createNotFoundException('Error on Facebook Authentication');
            //return 'Token Error' ;
        } catch(\Exception $ex) {
            // When validation fails or other local issues
            $this->createNotFoundException();
            throw $this->createNotFoundException();
        }

/************ CONNECT TO DATABASE AND CREATE USER IF NOT EXISTS ***********/        
            $em = $this->getDoctrine()->getManager() ;
            $person = $em->getRepository('SpiceMeDomainBundle:Person')
            ->findOneBy([ 'fbId' => $fbuser->getId() ]);
            
            if (!$person) {
/**********  BEFORE CREATE USER, let's get his avatar image *************/
                $subdir = substr($fbuser->getId(),0,3).'/'.$fbuser->getId() ;
                $imagepath = $this->container->getParameter('spiceme_local_img_path').'/'.$subdir ;
                
                if (!file_exists($imagepath)) {
                    mkdir($imagepath, 0755, true );
                }
                
                $img = file_get_contents('https://graph.facebook.com/'.$fbuser->getId().'/picture?width=600&height=600');
                $file = $imagepath.'/'.$fbuser->getId().'.jpg'; 
                file_put_contents($file, $img);
                /*  define Path for external downloading :*/
               
                
                
                
                $person = new Person() ;
                $person->setLastName($fbuser->getLastName());
                $person->setFirstName($fbuser->getFirstName());
               // $person->setBirthdateLocal() ;
                $person->setLatitude($latitude) ;
                $person->setLongitude($longitude) ;
                
                
                $person->setFbId($fbuser->getId());
                $person->setEmail($fbuser->getProperty('email'));
                $person->setAbout($fbuser->getProperty('bio'));
                $person->setFbAccessToken($fbAccessToken) ;
                $person->setAvatarImg('/'.$subdir.'/'.$fbuser->getId().'.jpg') ; 
                $person->setGender($fbuser->getProperty('gender')) ;
                $person->setLocale($fbuser->getProperty('locale')) ;
                $em->persist($person);                
            }
 
                
// TODO: get others images from this user's albums (until 5 ) : 
/*            $request = new FacebookRequest($session, 'GET', '/me/photos');
            $response = $request->execute();
 */                   
 //   return [$fbuser,$fblocation,$fbsession,$response] ;              
                  
                  
                  
        $em->flush();
        // don't send private information in internet and add external img URL :
        $person->setFbAccessToken(null);
        $person->setAvatarImg($this->container->getParameter('spiceme_external_img_path').'/'.$person->getAvatarImg());
        return $person;

    }

}
