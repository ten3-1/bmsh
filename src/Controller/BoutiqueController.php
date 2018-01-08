<?php

// Controller Ajouter / Modifier Boutique

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Boutique;
use App\Form\BoutiqueType;
use ORM\EntityManager;


class BoutiqueController extends Controller{
    /**
     * @Route("/admin/ajouter-boutique", name="ajouter-boutique")
     */
    function ajouterBoutique(Request $request){
        // Creation du formulaire
        $boutique = new Boutique();
        $form = $this->createForm(BoutiqueType::class, $boutique)
                     ->handleRequest($request);
        // PHP  if (isset($_REQUEST["submit"]) && ($_REQUEST["valid"] == "submit"))
        if($form->isSubmitted() && $form->isValid()){
            // sauve dans la BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($boutique);
            $em->flush();
            // $this->addFlash("success","yay §§§");
        }
        return $this->render("base/boutique.html.twig", ["form" => $form->createView()]);
    }
}