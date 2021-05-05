<?php

namespace App\Form;

use App\Entity\Faq;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FaqType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question', TextType::class, [
                'label'=> "Ecrire la question",
            ])
            ->add('answer', TextType::class, [
                'label'=> "Ecrire le contenu",
            ])
            ->add('Category',ChoiceType::class,[
                'label'=>"Categories",
                'choices'=>[
                    'Général'=>'general',
                    'Hôtes'=>'host',
                    'Voyageurs'=>'travelers'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Faq::class,
        ]);
    }
}
