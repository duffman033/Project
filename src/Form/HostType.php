<?php

namespace App\Form;

use App\Entity\Host;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                // ONGLET INFORMATIONS //

            ->add('forVans', CheckboxType::class, array(
                'label'=> 'Vans ',
                'required' => false))
            ->add('forCaravans', CheckboxType::class, array(
                 'label' => 'Caravanes',
                 'required' => false ))
            ->add('forCars', CheckboxType::class, array(
                'label'=> 'Voitures',
                'required' => false))   
            ->add('forTents', CheckboxType::class, array(
                'label' => 'Tentes',
                'required' => false)) 
            ->add('forMotorcycles', CheckboxType::class, array(
                'label' => 'Motos',
                'required' => false)) 
            ->add('superficy', NumberType::class,array(
                'attr'=>[
                    'class'=>"",
                    'placeholder'=>"Saisir la la taille du terrain ..m²" ],))
            ->add('number_of_people', ChoiceType::class, [
                    'mapped' => false,
                    'choices' => range(0,20)])
            ->add('country', CheckboxType::class, array(
                'label' => 'Campagne',
                'required' => false))
            ->add('Mountain', CheckboxType::class, array(
                'label' => 'Montagne',
                'required' => false))
            ->add('Lake', CheckboxType::class, array(
                 'label' => 'Lac',
                 'required' => false))
            ->add('City', CheckboxType::class, array(
                'label'=> 'Ville',
                'required' => false))
            ->add('Sea', CheckboxType::class,array(
                'label' => 'Mer',
                'required' => false))

              // ONGLET DESCRIPTIONS //

              ->add('title', TextType::class, array(
                  'label' => 'Titre de votre annonce'))
            ->add('Summarise', TextareaType::class, array(
                'label'=> 'Résumé'))
            ->add('The_Setting', TextareaType::class,array(
                'label'=> 'Le cadre'))
            ->add('the_pitches', TextareaType::class, array(
                'label' =>'Les emplacements'))
            ->add('The_Sanitary_Facilities', TextareaType::class,array(
                'label' =>'Les sanitaires'))
            ->add('The_Equipement', TextareaType::class,array(
                'label' => 'Les équipements'))
            ->add('Other_Remarks',TextareaType::class,array(
                'label'=> 'Autres remarques'))
            ->add('Loan', CheckboxType::class,array(
                'label'=> 'Prêt de tente possible',
                'required'=> false))
            ->add('Rules_of_the_field', TextareaType::class,array(
                'label'=> 'Règles du terrain',
                'attr'=>[
                    'class'=>"",
                    'placeholder'=>"Listez ici les règles que les voyageurs doivent suivre..." ], )) 

                    //ONGLET ADRESSE//

            ->add('adress', TextType::class, array(
                'attr' => [
                    'label' => 'adresse',
                    'placeholder'=> 'veuillez saisir votre adresse ici' ]))
             ->add('region', ChoiceType::class,[
                    'label'=>"Indiquez la région *",
                    'choices'=>[
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
                    'Provence-Alpes-Côte d’Azur'=>"Provence-Alpes-Côte d’Azur",]])
                
               
            //ONGLET PHOTOS//
            ->add('images', FileType::class,[
                  'label' => false,
                  'multiple' => true,
                  'mapped' => false,
                  'required' => false
            ])

            // ONGLET PRIX //

            ->add('price_of_location', MoneyType::class, array(
                'currency' => 'EUR',
                'label' => "prix de l'emplacement /personnes",
                'scale' => 2, ))
            ->add('price_for_options', MoneyType::class, array(
                 'currency' => 'EUR',
                 'scale' => 2,
            ))

            // ONGLET OPTION //

            ->add('Options',OptionsType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Host::class,
        ]);
    }

}
