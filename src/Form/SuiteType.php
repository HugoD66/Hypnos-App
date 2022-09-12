<?php

namespace App\Form;

use App\Entity\Hotel;
use App\Entity\PictureList;
use App\Entity\Suite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SuiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('picture', FileType::class)
            ->add('description')
            ->add('price', IntegerType::class)
            ->add('hotel', EntityType::class, [
                'class' => Hotel::class,
            ])
            ->add('pictureList', CollectionType::class, [
                'entry_type' => PictureListType::class,
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,

            ])
            ->add('submit', SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Suite::class,
        ]);
    }
}
