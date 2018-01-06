<?php

// Controller concernant le catalogue
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Produits;
use App\Entity\Categories;

use Doctrine\DBAL\Driver\Connection;

class CatalogueController extends Controller
{
    /**
     * @Route("/admin/ajouter-produit", name="ajouter-produit")
     */
    public function addProduct($obj)
    {
        // lie aux functions GET du repository
        $nom    = $obj->getProduit();
        $cat    = $obj->getCat();
        $label  = $obj->getLabel();
        $desc   = $obj->getDesc();
        $photo  = $obj->getUploadedFile();

        // si le formulaire est soumis et valide
        if($form->isSubmitted() && $form->isValid())
        {
            // Entity Manager c'est le truc qui sert à faire des choses dans la BDD sans rien connaître au langage SQL
            $em = $this->getDoctrine()->getManager();
            $product = new Produits();
            $product->setProduit($nom)
                    ->setCat($cat)
                    ->setPhoto($photo)
                    ->setLabel($label)
                    ->setActive($actif)
                    ->setDescription($desc);
            // une fois sur le throne, se concentre bien
            $em->persist($product);
            // tire la chasse
            $em->flush();
        }
        return new Response("<strong>$product a été ajouté dans la base de donnée</strong>");
    }

    function hideProducts($actif)
    {
        $product = new Produits();
        $product->getActive($actif);
        if ($product == 1){
            // afficher le produit
        }
        else{
            echo "";
        }
    }

    public function updateProduct($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository(Produits::class)
                      ->find($id);
        //
    }




    /**
     * @Route("catalogue", name="catalogue")
     */
    // liste toutes les categories
   public function listCatalogue()
    {
        $categories = $this->getDoctrine() // utilise doctrine
                           ->getRepository(Categories::class) // lie à la bdd Categories dans le repository
                           ->findAll(); // affiche tout
        // transforme $categories local en variable utilisable dans le fichier catalogue.html.twig
        return $this->render("base/catalogue.html.twig", ["categories" => $categories]);
    }




    /**
     * @Route("catalogue/{categories}", name="categorie")
     */
    // liste toutes les categories
   public function listCategories($categories)
    {
        $categories = $this->getDoctrine() // utilise doctrine
                           ->getRepository(Categories::class) // lie à la bdd Categories dans le repository
                           ->findBy(["cat" => $categories]);
        // transforme $categories local en variable utilisable dans le fichier catalogue.html.twig
        return $this->render("base/catalogue.html.twig", ["categories" => $categories]);
    }











// ------------------ TEST affichage tous produits par catégorie
// ------------------- PLANTAGE de la page !!!!
    /**
     * @Route("catalogue/{categories}/{produits}", name="produits")
     */
    // liste toutes les categories
    public function listProduitsParCategorie($produits, $categories)
    {
        $objetProduits = $this->getDoctrine() // utilise doctrine
                         ->getRepository(Produits::class); // lie à la bdd Categories dans le repository
                         // ->findAll();

        $objetCategories = $this->getDoctrine() // utilise doctrine
                           ->getRepository(Categories::class); // lie à la bdd Categories dans le repository
                           // ->findBy(["cat" => $categories]);

        $tabResultat = $objetProduits->findBy([]);


        foreach ($tabResultat as $produit) {
            $idProd     = $produit->getId();
            $produitName    = $produit->getProduit();
            $description = $produit->getDescription();


            $idCat = $produit->getId();
            // $categorie = $objetCategories->find($id);
        }


        // transforme $categories local en variable utilisable dans le fichier catalogue.html.twig
        // return $this->render("base/catalogue.html.twig", 
        //     ["produits" => $produits]);
        return $this->render("base/catalogue.html.twig", 
            ["produit" => $categories ]);
 
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