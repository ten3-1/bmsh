<?php

// Controller concernant la Boutique
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Contact;
use App\Form\ContactType;
use ORM\EntityManager;
class ContactController extends Controller{
    /**
     * @Route("/base/contact", name="contact")
     */
    function envoyerMessage(Request $request){
        // Creation du formulaire
        $message = new Contact();
        $form = $this->createForm(ContactType::class, $message)
                     ->handleRequest($request);
        // PHP  if (isset($_REQUEST["submit"]) && ($_REQUEST["valid"] == "submit"))
        if($form->isSubmitted() && $form->isValid()){
            // sauve dans la BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();
            // $this->addFlash("success","yay §§§");
        }
        return $this->render("base/contact.html.twig", ["form" => $form->createView()]);
    }
    

}