<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Blank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        // Email
            ->add('email', EmailType::class, [
                'label'=> "Votre adresse email",
                'required'=> true,
                'attr'=> [
                    'placeholder'=> "Saisir votre email"
                ],

                'constraints' =>[
                    new NotBlank([
                        'message'=> "L'adresse email est obligatoire"
                    ]),
                    new Email([
                        'message'=> "L'adresse email n'est pas valide"
                    ])
                ]

            ])
        // Firstname    
            ->add('firstname', TextType::class, [
                'label'=> "Votre prénom",
                'required'=> true,
                'attr'=> [
                    'placeholder'=>"Ecrivez votre prénom"
                ],

                'constraints'=> [
                    new NotBlank([
                        'message'=> "Ce champ est obligatoire"
                    ])
                ]
            ])

        //Lastname
            ->add('lastname', TextType::class, [
                'label'=>"Votre nom",
                'required'=> true,
                'attr'=> [
                    'placeholder'=>"Ecrivez votre nom"
                ],
                'constraints'=>[
                    new NotBlank([
                        'message'=>"Ce champ est obligatoire"
                    ])
                ]

            ])


            ->add('isHost', CheckboxType::class, [
                    'mapped' => false,
                    'label'=>"S'inscrire en tant qu'Hote."
            ])

        //Birthday
            ->add('birthdate', BirthdayType::class, [
                'label'=>"Votre date de naissance",
                'required'=> true,
                'placeholder'=>[
                    'year'=> "Année",
                    'month'=>"Mois",
                    'day'=> "Jour",
                ],

                'constraints'=>[
                    new NotBlank([
                        'message'=>"Ce champ est obligatoire"
                    ])
                ]
            ])

        // Agree Terms
            ->add('agreeTerms', CheckboxType::class, [
                'label'=> "j'accepte les termes et conditions",
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
        
                
            //Password 
            ->add('plainPassword', RepeatedType::class, [
                'type'=> PasswordType::class,

                // Pas de label sur le champ "repeated
                'label'=>false,

                'required'=> true,
                'mapped'=> false,

                // Option du premier champ
                'first_options'=> [
                    'label' =>"Mot de passe",
                    'attr'=>[
                        'placeholder'=> "Saisir votre mot de passe",
                    ],
                    'constraints'=> [
                        new NotBlank([
                            'message'=> "Nouveau mot de passe requis",
                        ]),
                        new Length([
                            'min'=> 6,
                            'minMessage'=> "Minimum de 6 caractères",
                            'max'=> 32,
                            'maxMessage'=> "Maximum de 32 caractères",
                        ]),
                    ]
                ],

                // Option du second champ
                'second_options'=> [
                    'label'=> "Confirmation du mot de passe",
                    'attr'=>[
                        'placeholder'=> "Répétez votre mot de passe",
                    ]
                ],
          
                // Message d'erreur
                'invalid_message'=> "Les champs ne sont pas identiques",
            ])


    
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
