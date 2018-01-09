<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Produits;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
// ...

class AdminController extends Controller{
    
    /**
     * @Route("/admin", name="admin-page")
     */
       public function hello(AuthorizationCheckerInterface $authChecker)
    {
        if (false === $authChecker->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException('Unable to access this page!');
        }
        return $this->render("admin/admin.html.twig");
    
        // ...
    }
    /**
     * @Route("/admin/ajou", name="admin-{page}")
     */
    public function showAdminPage($page){
        return $this->render("admin/$page.html.twig");
    }

    function addStore(){
        //
    }
    /**
     * @Route("/admin/modifier-produit", name="modifier-produit")
     */
    function editProd(){
    $produit = $this->getDoctrine()
                    ->getRepository(Produits::class)
                    ->find($id);
    return $this->render("admin/modifier-produit.html.twig");
    }
    /**
     * @Route("/admin/add-product", name="add-product")
     */
    public function addP($obj){
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
}