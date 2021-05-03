<?php

namespace App\Form;

use App\Entity\Blogpost;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BlogpostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content')
            ->add('images', FileType::class,[
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => false
            ])
            ->add('Status',CheckboxType::class,[
                'label' => 'Post Important?',
                'attr'=>[
                    'help'=>'Permet au post de s\'afficher en haut de la page du blog'
                ],
                'required'=>false,
            ])
            ->add('category',ChoiceType::class,[
                'label'=>'Catégories',
                'choices'=>[
                    'Législation'=>"Législation",
                    'Sanitaire'=>"Sanitaire",
                    'Astuce'=>"Astuce",
                    'Voyager'=>"Voyager",
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Blogpost::class,
        ]);
    }
}
