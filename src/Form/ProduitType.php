<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProduitType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $option){
        $builder->add("nom_produit",TextType::class,
                    [   "label" => "Ajouter un nouveau produit",
                        "attr"  => ["placeholder" => "Email"] ])
                ->add("description", TextareaType::class,
                    [   "label" => "Ajouter un nouveau produit" ])
                ->add("photo",TextType::class)
                ->add("nom_categorie", EntityType::class,
                    [   "class"       => Categorie::class,
                        "empty_value" => "Choisissez une catégorie"
                    ])
                ->add("allergene",CheckboxType::class,
                [])
                ->add("Ajouter",SubmitType::class);
    }
}