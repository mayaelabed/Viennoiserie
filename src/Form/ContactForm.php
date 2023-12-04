<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactForm extends  AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('Name', TextType::class)
            ->add('Email', TextType::class)->add('message', TextType::class);
    }

    public function getName()
    {
        return "contact";
    }
}
