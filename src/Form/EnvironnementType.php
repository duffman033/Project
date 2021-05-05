<?php

namespace App\Form;

use App\Entity\Environnement;
use Symfony\Component\Console\Color;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnvironnementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Title', TextType::class, array(
                "label"=>"Titre",))

            ->add('Region', ChoiceType::class,[
                    'label'=>"Indiquez la région  ", 'choices'=>[
                    'Auvergne-Rhône-Alpes'=>"Auvergne-Rhône-Alpes",
                    'Bourgogne-Franche-Comté'=>"Bourgogne-Franche-Comté",
                    'Bretagne'=>"Bretagne",
                    'Centre-Val de Loires'=>"Centre-Val de Loire",
                    'Corse'=>"Corse",
                    'Grand Est'=>"Grand Est",
                    'Hauts-de-France'=>"Hauts-de-France",
                    'Ile-de-France'=>"Ile-de-Frances",
                    'Normandie'=>"Normandie",
                    'Nouvelle-Aquitaine'=>"Nouvelle-Aquitaine",
                    'Occitanie'=>"Occitanie",
                    'Pays de la Loire'=>"Pays de la Loire",
                    'Provence-Alpes-Côte d’Azur'=>"Provence-Alpes-Côte d’Azur",
                ]
            ])
            ->add('Theme', ChoiceType::class,[
                    'label'=>"Indiquez le thème du lieu ",'choices'=>[
                    'Chateaux' => 'Chateaux',
                    'Lieux Historiques' => 'Lieux Historiques',
                    'Vignerons' => 'Vignerons',
                    'Artisanat' => 'Artisanat',
                    'Cyclotourisme' => 'Cyclotourisme',
                    'En famille' => 'En famille',
                    'Bien-être' => 'Bien-être',
                    'Ferme' => 'Ferme',
                    'Bord de mer' => 'Bord de mer',
                    'Randonnees' => 'Randonnees',
                    'Parcs zoologiques' => 'Parcs zoologiques',
                    'Parcs de loisirs' => 'Parcs de loisirs',
                ]
            ])
            ->add('Description', TextareaType::class,[
                'label'=>"Description",
                'attr'=>[
                'placeholder'=>"Saisissez la description du lieu"
                ]
            ])
            ->add('Adresse', TextareaType::class,[
                'label'=>"Adresse",
                'attr'=>[
                'placeholder'=>"Saisissez l'adresse du lieu"
                ],
                'help'=>"L'adresse n'est pas obligatoire.",
                'required'=>false,
            ])


            ->add('Number_phone', TelType::class,[
                'label'=>"Numéro de téléphone",
                'attr'=>[
                'placeholder'=>"Saisissez votre numéro de téléphone"
                ],
                'help'=>"Le numéro de téléphone n'est pas obligatoire.",
                'help_attr'=>[
                    'class'=>"important"
                ],
                'required'=>false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Environnement::class,
        ]);
    }
}
