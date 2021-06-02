<?php

namespace App\Form;

use App\Entity\Album;
use App\Entity\Photo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intoAlbum', EntityType::class, [
                'label' => 'Picbook',
                'class' => Album::class,
                'choice_label' => 'Name'
            ])
            ->add('pictureFile', VichImageType::class, [
                'label' => 'Upload an other Pic',
                'required' => false,
                'download_uri' => true,
                'image_uri' => true,
                'required' => false,
                'allow_delete' => false,
                'delete_label' => '...',
                'download_label' => 'Download this Pic',


            ])
            ->add(
                'name',
                TextType::class,
                [
                    'label' => 'Name',
                    'empty_data' => ' Default value ',

                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Photo::class,
            'empty_data' => ' Default value '
        ]);
    }
}
