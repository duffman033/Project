<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
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
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label'=> "Mot de passe",
                'mapped' => false,
                'attr'=> [
                    'placeholder'=> "Saisir votre mot de passe"
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ecrivez votre mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Minimum 6 caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 30,
                        'maxMessage' => 'Maximum 30 caractères',
                    ]),
                ],
            ])

            // Confirm Password 
            ->add('confirm_password', PasswordType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
