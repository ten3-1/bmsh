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
    // function showProductByCat($nomCategorie, $nomProduit)
    // {
    //     $em = $this->getDoctrine()->getManager();
    //     $produit = $this->getDoctrine()
    //                     ->getRepository(Produits::class)
    //                     ->findOneBy(["nom_produit" => $nomProduit, "nom_categorie"=>$nomCategorie]);
    //     return $this->render("base/catalogue.html.twig", ["produit" => $produit]);
    // }
    /**
      * @Route("/admin/add", name="add")
      */
    function newProduit($nomProduit,$description,$photo,$nomCategorie,$nomAllergene, Request $request)
    {
		// création de l'entité Produit
		$produit = new Produit();
		$produit->setNomProduit(["nom_produit" => $nomProduit])
				->setDescription(["description" => $description])
				->setPhoto(["photo" => $photo])
				->setLabel(0)
				->setActive(1);

		// création de l'entité Categorie
		$categorie = new Categorie();
		$categorie->setNomCategorie(["nom_categorie" => $nomCategorie]);
		// création de l'entité Allergene
		$allergene = new Allergene();
		$allergene->setNomAllergene(["nom_allergene" => $nomAllergene]);

		// relie le produit à la catégorie
		$product->setCategorie($categorie);
		// relie l'allergene au produit
		$product->setAllergene($allergene);

		// création du formulaire
		$form = $this->createForm(ProduitType::class, $product)
					 ->handleRequest($request);

					 if($form->isSubmitted() && $form->isValid()){
			// On récupère l'EntityManager
			$this->getDoctrine()->getManager()
					->persist($produit)
					->persist($categorie)
					->persist($allergene)
					->flush();
		}
		return $this->render("admin/ajouter-produit.html.twig", ["produit" => $produit,"form" => $form->createView()]);
  	}
}

// return $this->createQueryBuilder('a')
// ->where('a.something = :value')->setParameter('value', $value)
// ->orderBy('a.id', 'ASC')
// ->setMaxResults(10)
// ->getQuery()
// ->getResult()
// ;