<?php

// controlleur generique fourre tout

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends Controller{
    /**
     * @Route("/", name="index")
     */
    // rooting de la page d'accueil qui renvoit vers la racine
    public function showIndex(){
        return $this->render("base/index.html.twig");
    }
    /**
     * @Route("/404", name="error-page")
     */
    // public function show404(){
    //     $page = false;
    //     if (!$page){
    //     throw $this->createNotFoundHttpException();
    //     }
    //     return $this->render("404.html.twig");
    // }
    /**
     * @Route("/{page}", name="{page}")
     */
    // rooting de toutes les pages, il faut cependant que le fichier existe dans le repertoire base
    public function showPage($page){
        return $this->render("base/$page.html.twig");
        // if (!$tpl = false){
        //     return $this->render("404.html.twig");
        }
    /**
     * @Route("contact", name="contact")
     */
    public function callMeMaybe(){
        // ici il y aura un formulaire de contact
        // https://symfony.com/doc/current/forms.html
        // https://openclassrooms.com/courses/developpez-votre-site-web-avec-le-framework-symfony/creer-des-formulaires-avec-symfony
        return $this->render("base/contact.html.twig");
    }
}