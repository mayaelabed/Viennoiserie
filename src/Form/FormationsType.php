<?php

namespace App\Form;

use phpDocumentor\Reflection\Types\Float_;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class FormationsType extends  AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('Nom',TextType::class)
            ->add('date_debut', DateType::class)
            ->add('date_fin', DateType::class)
            ->add('prix_formation',Float_::class)
            ->add('duration', DateType::class);
    }
    public function getName()
    {
        return "Formation";
    }


}