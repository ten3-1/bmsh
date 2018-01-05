<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class NewsletterType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $option){
        $builder->add("email",EmailType::class,["label" => false, "attr" => ["placeholder" => "Email"]])
                ->add("inscription",SubmitType::class);

                // ->add("inscription",SubmitType::class);
                //["attr" => ["placeholder" => "Email"]]
    }
}