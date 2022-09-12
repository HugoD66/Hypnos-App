<?php

namespace App\Form;

use App\Entity\PictureList;
use App\Entity\Suite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PictureListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pic_one', FileType::class, [
                'mapped' => false,
                'label' => 'Photo suite 1 : ',
            ])
            ->add('pic_two', FileType::class, [
                'mapped' => false,
                'label' => 'Photo suite 2 : ',

            ])
            ->add('pic_three', FileType::class, [
                'mapped' => false,
                'label' => 'Photo suite 3 : ',

            ])
            ->add('suite', EntityType::class, [
                'class' => Suite::class
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PictureList::class,
        ]);
    }
}
