<?php

namespace App\Form;

use App\Entity\ContactUs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactUsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'placeholder' => 'Contact@exemple.com'
                ]
            ])
            ->add('first_name', TextType::class, [
                'attr' => [
                    'placeholder' => 'Dubois'
                ]
            ])
            ->add('last_name', TextType::class, [
                'attr' => [
                    'placeholder' => 'Jean'
                ]
            ])
            ->add('reason', ChoiceType::class, [
                'label' => 'Sujet : ',
                'choices' => [
                    'Je souhaite poser une réclamation' => 0,
                    'Je souhaite commander un service supplémentaire' => 1,
                    'Je souhaite en savoir plus sur une suite' => 2,
                    'J\'ai un souci avec cette application' => 3,
                ],
            ])
            ->add('content', TextareaType::class)
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
            'data_class' => ContactUs::class,
        ]);
    }
}
