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
     * @Route("accueil", name="accueil")
     */
    function showAccueil(){
        return $this->render("base/accueil.html.twig");
    }
    /**
     * @Route("pierre-ragot", name="philo")
     */
    function showAbout(){
        return $this->render("base/pierre-ragot.html.twig");
    }
    /**
     * @Route("", name="savoir-faire")", name="philo")
     */
    function showPhilo(){
        return $this->render("base/savoir-faire.html.twig");
    }

    // /**
    //  * @Route("{page}", name="{page}")
    //  */
    // routing de toutes les pages, il faut cependant que le fichier existe dans le repertoire base
    // public function showStaticPage($page){
    //     return $this->render("static/$page.html.twig");
    //     // if (!$tpl = false){
    //     //     return $this->render("404.html.twig");
    //     }

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