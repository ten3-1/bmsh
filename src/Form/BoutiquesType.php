<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BoutiquesType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $option){
        $builder->add("nom_boutique",TextType::class,["label" => "Nom de boutique", "attr" => ["placeholder" => "Nom de boutique ici"]])
                ->add("adress_boutique",TextareaType::class,["label" => "Adress de boutique", "attr" => ["placeholder" => "Adress ici"]])
                ->add("horaires",TextareaType::class,["label" => "Horaires de boutique", "attr" => ["placeholder" => "Horaires de boutique"]])
                ->add("telephone",NumberType::class,["label" => "Numero de telephone pour la boutique", "attr" => ["placeholder" => "numero ici"]])
                ->add("inscription",SubmitType::class);

                // ->add("inscription",SubmitType::class);
                //["attr" => ["placeholder" => "Email"]]
    }
}