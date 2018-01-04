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
        $nom    = $obj->getProduit();
        $cat    = $obj->getCat();
        $label  = $obj->getLabel();
        $desc   = $obj->getDesc();
        $photo  = $obj->getUploadedFile();

        if($form->isSubmitted() && $form->isValid()){
        // Entity Manager c'est le truc qui sert à faire des choses dans la BDD sans rien connaître au langage SQL
        $em = $this->getDoctrine()->getManager();
        $product = new Produits();
        $product->setProduit($nom)->setCat($cat)->setPhoto($photo)->setLabel($label)->setActive($actif)->setDescription($desc);
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
        $product = $em->getRepository(Produits::class)->find($id);
        //
    }
    /**
     * @Route("/catalogue", name="list")
     */
    // la liste des categories (marche OK)
    public function listCat(){
        $repository = $this->getDoctrine()->getRepository(Categories::class);
        $categories = $repository->findAll();
        return $this->render('base/catalogue.html.twig', array('categories' => $categories));
    }

    // function listProd($id){
    //     $produit = $this->getDoctrine()
    //                      ->getRepository(Produits::class)
    //                      ->findBy(["id" => $id]);
    //     return $this->render("base/liste/list.html.twig",["produit" => $produits]);
    // }

    // function showByCat($cat){
    //     $listCat = $this->getDoctrine()->getRepository(Produits::class)->findBy(["cat"=> $cat]);
    //     return $this->render("base/$cat.html.twig",array('cat' => $listcat));
    // }
}