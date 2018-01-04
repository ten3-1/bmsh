<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller{
    /**
     * @Route("/admin", name="admin-page")
     */
    function showAdmin(){
        return $this->render("admin/admin.html.twig");
    }
    /**
     * @Route("/admin/{page}", name="admin-{page}")
     */
    public function showAdminPage($page){
        return $this->render("admin/$page.html.twig");
    }
    function addStore(){
        //
    }
    /**
     * @Route("/admin/modifier-produit", name="modifier-modifier")
     */
    function editProd(){
    $produit = $this->getDoctrine()
                    ->getRepository(Produits::class)
                    ->find($id);
    return $this->render("admin/modifier-produit.html.twig");
}
}