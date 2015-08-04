<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\itemList;
use Symfony\Component\HttpFoundation\Response;

class todoController extends Controller
{
    /**
     * @Route("/", name="To-do List")
     */
   public function indexAction()
   {
       $repository = $this->getDoctrine()->getRepository('AppBundle:itemList')->findAll();
       
       if (!$repository) 
       {
           throw $this->createNotFoundException(
            'Error: Unable to access database.'
        );
       }  
       return $this->render('default/index.html.twig', array('itemList' => $repository));
   }
    
    /**
     * @Route("/create", name="Create item")
     */
    public function createAction()
    {
        $item = new itemList();
        $item->setItem($_POST["item"]);
        $item->setStatus(true);

        $em = $this->getDoctrine()->getManager();
        $em->persist($item);
        $em->flush();
        
         return $this->redirectToRoute("homepage");
    }

    /**
     * @Route("/delete/{slug}", name="Delete item")
     */
    public function deleteAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $item = $this->getDoctrine()->getRepository('AppBundle:itemList') ->find($slug);
        $em->remove($item);
        $em->flush();
        return $this->redirectToRoute("homepage");
    }
    
    /**
     * @Route("/status/{slug}", name="Change item status")
     */
    public function statusAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $item = $this->getDoctrine()->getRepository('AppBundle:itemList') ->find($slug);
        $item->setStatus(false);
        $em->persist($item);
        $em->flush();
        return $this->redirectToRoute("homepage");
    }

    /**
     * @Route("/deleteall", name="Delete completed")
     */
public function deleteAction2()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('AppBundle:itemList') ->findAll();
        foreach($repository as $item) { 
            if($item->getStatus() == false){
                $em->remove($item);
            }
        }
        $em->flush();
        return $this->redirectToRoute("homepage");
    }
}
