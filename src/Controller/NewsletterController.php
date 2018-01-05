<?php

// Controller concernant la newsletter
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Newsletter;
use App\Form\NewsletterType;

class NewsletterController extends Controller{
    /**
     * @Route("newsletter", name="newsletter")
     */
    function subscribeNewsletter(Request $request){
        // Creation du formulaire
        $newsletter = new Newsletter();
        $form = $this->createForm(NewsletterType::class,$newsletter)
                     ->handleRequest($request);
        // PHP  if (isset($_REQUEST["submit"]) && ($_REQUEST["valid"] == "submit"))
        if($form->isSubmitted() && $form->isValid()){
            // sauve dans la BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($newsletter);
            $em->flush();
            // $this->addFlash("success","yay §§§");
        }
        return $this->render("base/newsletter.html.twig", ["form" => $form->createView()]);
    }

    function addNewsletter(){
        // écrire une newsletter
    }

    function sendNewsletter(){
      // envoie la newsletter aux inscrits
    }
}