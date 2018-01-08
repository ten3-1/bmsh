<?php

// Controller Ajouter / Modifier Boutiques

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Boutiques;
use App\Form\BoutiquesType;
use ORM\EntityManager;


class BoutiqueController extends Controller{
    /**
     * @Route("/admin/ajouter-boutique", name="ajouter-boutique")
     */
    function ajouterBoutique(Request $request){
        // Creation du formulaire
        $boutiques = new Boutiques();
        $form = $this->createForm(BoutiquesType::class, $boutiques)
                     ->handleRequest($request); 
        // PHP  if (isset($_REQUEST["submit"]) && ($_REQUEST["valid"] == "submit"))
        if($form->isSubmitted() && $form->isValid()){
            // sauve dans la BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($boutiques);
            $em->flush();
            // $this->addFlash("success","yay §§§");
        }
        return $this->render("base/boutique.html.twig", ["form" => $form->createView()]);
    }
}
    /*
       function updateBoutique ($objectRequest, $objectConnection, $objectEntityManager, $filePathSymfony)
    {
        // RECUPERER LES INFOS DU FORMULAIRE
        // ->get("email", "")
        // VA CHERCHER L'INFO DANS LE FORMULAIRE HTML name="email"
        // ET SI L'INFO N'EST PAS PRESENTE 
        //  ALORS ON RETOURNE LA VALEUR PAR DEFAUT ""
        
        $nomBoutique          = $objectRequest->get("nomBoutique", "");       
        $adressBoutique       = $objectRequest->get("adressBoutique", "");       
        $horaires             = $objectRequest->get("horaires", "");   
        $telephone            = $objectRequest->get("telephone", "");   
        
         $idUpdate = intval($idUpdate);
       
        
        // SECURITE TRES BASIQUE
            if (($idUpdate >0) && ($nomBoutique  != "") && ($adressBoutique != "") && ($horaires!= "") && ($telephone!= "")) 
           
            {
                
                // COMPLETER LES INFOS MANQUANTES
                $dateModification = date("Y-m-d H:i:s");
                // ON MET AUSSI A JOUR L'AUTEUR DE L'ARTICLE
                $idUser           = $objectSession->get("id");
                
                // AJOUTER L'ARTICLE DANS LA BASE DE DONNEES
                // ON VA UTILISER $objetConnection FOURNI PAR SYMFONY
                // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#insert
                $objectConnection->update("boutiques", 
                                        [   "nomBoutique "              => $nomBoutique , 
                                            "adressBoutique "           => $adressBoutique ,
                                            "horaires"                  => $horaires ,
                                            "telephone"                 => $telephone,
                                           
                                            ],
                                            
                
                $objectEntityManager->flush();
                
                // MESSAGE SUCCESS
                echo "BOUTIQUE MODIFIED";
            }
            */
        

    