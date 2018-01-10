<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Categorie;
use App\Entity\Produit;


class AurelieController extends Controller
{


    /**
     * @Route("/catalogue/{id}", name="id categorie")
     */
    // liste tous les produits dans une categorie
    public function listEachProductFromCat($id)
    {
     $em = $this->getDoctrine()->getManager();
     			
     // récupère l'îd de la categorie
     $categorie = $em->getRepository(Categorie::class)
     				->findOneBy(["id" => $id]);

     // récupère la liste des produits de cette categorie
     $listProduits = $em->getRepository(Produit::class)
                        ->findBy(["categorie" => $categorie]);

     // récupère la photo de ce produit
      $urlPhoto = $em->getRepository(Produit::class)
       			 ->findBy(["photo" => $listProduits]);
       			 

     return $this->render("base/list.html.twig", ["categorie" => $categorie, "listProduits" => $listProduits, "photo" => $urlPhoto]);
   }




   


// -------------- NE PAS SUPPRIMER ------------
// ces deux fonctions ci-dessous FONCTIONNENT !!!



// la fonction suivante devrait afficher un seul produit avec l'url "/catalogue/{categories}/{produit}"
// mais pour l'instant elle marche avec l'url "/catalogue/{produit}"

     /**
      * @Route("/list/{name}", name="name")
      */
    // // fonction d'affichage d'un seul produit
    function showProduct($name)
    {
        $produits = $this->getDoctrine()
                        ->getRepository(Produits::class)
                        ->findBy(["produits" => $name]);
        return $this->render("base/list.html.twig", ["produits" => $produits]);
    }




// fonction d'affichage de tous les produits d'une même catégorie
        // https://zestedesavoir.com/tutoriels/620/developpez-votre-site-web-avec-le-framework-symfony2/395_gerer-la-base-de-donnees-avec-doctrine2/1999_recuperer-ses-entites-avec-doctrine2/
    
    /*function showListProducts($categories)
    {
        $produits = $this->getDoctrine()
                        ->getRepository(Produits::class)
                        ->findBy(array("produit" => $categories));
        return $this->render("base/list.html.twig", ["produit" => $produits]);
    }
*/






}