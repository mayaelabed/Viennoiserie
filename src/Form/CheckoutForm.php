<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CheckoutForm extends  AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextType::class)
            ->add('email', TextType::class)
            ->add('phone', TextType::class)
            ->add('address', TextType::class)
            ->add('country', TextType::class);
    }

    public function getName()
    {
        return "Checkout";
    }
}

