<?php

namespace App\Form;

use App\Entity\Hotel;
use App\Entity\Manager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateManagerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email du Manager : ',
            ])
            ->add('first_name', TextType::class, [
                'label' => 'Votre nom : ',
            ])
            ->add('last_name', TextType::class, [
                'label' => 'Votre prénom : ',
            ])
            ->add('hotel', EntityType::class, [
                'class' => Hotel::class,
                'multiple' => false,
            ])
            ->add('submit', SubmitType::class, [
                'attr' => array(
                    'class' => 'buttonSendForm'
                )
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Manager::class,
        ]);
    }
}
