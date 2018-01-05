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

class CatalogueController extends Controller{
    /**
     * @Route("/admin/ajouter-produit", name="ajouter-produit")
     */
    public function addProduct($obj){
        // lie aux functions GET du repository
        $nom    = $obj->getProduit();
        $cat    = $obj->getCat();
        $label  = $obj->getLabel();
        $desc   = $obj->getDesc();
        $photo  = $obj->getUploadedFile();

        // si le formulaire est soumis et valide
        if($form->isSubmitted() && $form->isValid()){
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
    function hideProducts($actif){
        $product = new Produits();
        $product->getActive($actif);
        if ($product == 1){
            // afficher le produit
        }
        else{
            echo "";
        }
    }
    public function updateProduct($id){
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository(Produits::class)
                      ->find($id);
        //
    }
    // liste toutes les categories
    public function listCat(){
        $categories = $this->getDoctrine() // utilise doctrine
                           ->getRepository(Categories::class) // lie à la bdd Categories dans le repository
                           ->findAll(); // affiche tout
        // transforme $categories local en variable utilisable dans le fichier catalogue.html.twig
        return $this->render("base/catalogue.html.twig", ["categories" => $categories]);
    }

    // function listProd($id){<
    //     $produit = $this->getDoctrine()
    //                      ->getRepository(Produits::class)
    //                      ->findBy(["id" => $id]);
    //     return $this->render("base/liste/list.html.twig",["produit" => $produits]);
    // }
}