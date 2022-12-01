<?php

namespace App\Form;

use App\Entity\Booking;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('start_date', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'yyyy-mm-dd',
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('end_date', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'yyyy-mm-dd',
                'attr' => ['class' => 'js-datepicker'],
                'placeholder' => [
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                ],
            ])
            ->add('suite')
            ->add('submit', SubmitType::class, [
                'attr' => array(
                    'class' => 'buttonSendForm',
                )
            ])
        ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
