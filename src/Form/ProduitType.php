<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Categorie;
use App\Entity\Allergene;

class ProduitType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $option){
        $builder->add("nom_produit",TextType::class,
                    [   "label" => "Ajouter un nouveau produit",
                        "attr"  => ["placeholder" => "Email"] ])
                ->add("description", TextareaType::class,
                    [   "label" => "Description" ])
                ->add("photo",TextType::class)
                ->add("categorie", EntityType::class,
                    [   "class"       => Categorie::class,
                    "choice_label" => "nom_categorie"
                    ])
                    ->add("allergene", EntityType::class,
                    [   "class"       => Allergene::class,
                    "choice_label" => "nom_allergene",
                    "multiple" => true,
                    "expanded" => true
                    ])
                ->add("Ajouter",SubmitType::class);
    }
}
