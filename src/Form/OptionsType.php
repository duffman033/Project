<?php

namespace App\Form;

use App\Entity\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OptionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('animals', CheckboxType::class,array(
                'label'=> 'Animaux acceptés',
                'required'=> false))
            ->add('drinking_water', CheckboxType::class,array(
                'label'=> 'Eau potable',
                'required'=> false))
            ->add('barbecue',CheckboxType::class,array(
                'label'=> "Barbecue",
                'required'=> false))
            ->add('electricity',CheckboxType::class,array(
                "label"=> "Electricité",
                'required'=> false ))
            ->add('swimming_pool', CheckboxType::class,array(
                'label'=> 'Piscine',
                'required'=> false ))
            ->add('washing_machine',CheckboxType::class,array(
                'label'=> 'Machine à laver',
                'required'=> false ))
            ->add('dryer',CheckboxType::class,array(
                'label'=> 'Sèche linge',
                'required'=> false ))
            ->add('wardrobe',CheckboxType::class,array(
                'label'=>'Etendoir',
                'required'=> false ))
            ->add('toilet_1',CheckboxType::class, array(
                'label'=>"Toilettes (chez l'habitant)",
                'required'=> false ))
            ->add('toilet_2', CheckboxType::class,array(
                'label'=> 'toilettes indépendantes',
                'required'=> false))
            ->add('independent_shower', CheckboxType::class,array(
                'label' => 'Douche indépendante',
                'required' => false))
            ->add('shower_at_home',CheckboxType::class,array(
                'label' => "Douche chez l'habitant",
                'required'=> false ))
            ->add('kitchen_at_home',CheckboxType::class,array(
                'label' => "cuisine chez l'habitant",
                'required'=> false))
            ->add('independent_kitchen',CheckboxType::class,array(
                'label'=> 'Cuisine indépendante',
                'required' => false))
            ->add('independent_refrigerator', CheckboxType::class,array(
                'label' => 'Réfrigérateur indépendant',
                'required' => false ))
            ->add('refrigerator_at_home', CheckboxType::class,array(
                'label' => "Réfrigerateur chez l'habitant",
                'required'=> false ))
            ->add('permitted_naturism',CheckboxType::class,array(
                'label'=> 'Naturisme autorisé',
                'required'=> false ))
            ->add('private_parking',CheckboxType::class,array(
                'label'=> 'Parking privé',
                'required' => false ))
            ->add('garden_table',CheckboxType::class,array(
                'label'=> 'Table de jardin',
                'required'=> false ))
            ->add('permitted_campfire',CheckboxType::class,array(
                'label'=> 'Feu de camp autorisé',
                'required'=> false ))
            ->add('enclosed_terrain',CheckboxType::class,array(
                'label' => 'Terrain clos',
                'required'=> false ))
            ->add('train_or_bus', CheckboxType::class,array(
                'label' => 'Train ou bus',
                'required' => false))
            ->add('shops', CheckboxType::class,array(
                'label'=> 'Commerces',
                'required'=> false ))
            ->add('water_discharges',CheckboxType::class,array(
                'label'=> 'Rejet des eaux usées',
                'required'=> false ))
            ->add('childrens_games',CheckboxType::class,array(
                'label'=> 'Jeux pour enfants',
                'required'=> false ))
            ->add('handicapped_access',CheckboxType::class,array(
                'label'=> 'Accès handicapé',
                'required'=> false ))
            ->add('independent_access',CheckboxType::class,array(
                'label'=> 'Accès independant',
                'required' => false))
            ->add('electrical_charge',CheckboxType::class,array(
                'label'=> 'Borne de recharge électrique',
                'required' => false))
            ->add('internet',CheckboxType::class,array(
                'label'=> 'Accès internet',
                'required' => false))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Options::class,
        ]);
    }
}
