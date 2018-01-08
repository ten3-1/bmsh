<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Categorie;
use App\Entity\Produit;

class PeterController extends Controller{
    /**
     * @Route("catalogue/{id}", name="id categproe")
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
     return $this->render("base/manytoone.html.twig", ["categorie" => $categorie, "listProduits" => $listProduits]);
   }
    /**
      * @Route("/catalogue/{nomCategorie}/{nomProduit}", name="OneToMany")
      */
    // fonction d'affichage d'un seul produit par categorie
    function showProductByCat($nomCategorie, $nomProduit)
    {
        $em = $this->getDoctrine()->getManager();
        $produit = $this->getDoctrine()
                        ->getRepository(Produits::class)
                        ->findOneBy(["nom_produit" => $nomProduit, "nom_categorie"=>$nomCategorie]);
        return $this->render("base/catalogue.html.twig", ["produit" => $produit]);
    }
    /**
      * @Route("/admin/add", name="add")
      */
    function nvProduit()
    {
            // Création de l'entité Advert
            $produit = new Produit($nomProduit,$description);
            $produit->setNomProduit($nomProduit)
                    ->setDescription($description)
                    ->setPhoto($photo)
                    ->setLabel(0)
                    ->setActive(1);
            // On récupère l'EntityManager
            $em = $this->getDoctrine()->getManager();
            $em->persist($produit)
               ->flush();
            return $this->render("admin/ajouter-produit.html.twig", ["produit" => $produit]);
    }
}

// return $this->createQueryBuilder('a')
// ->where('a.something = :value')->setParameter('value', $value)
// ->orderBy('a.id', 'ASC')
// ->setMaxResults(10)
// ->getQuery()
// ->getResult()
// ;