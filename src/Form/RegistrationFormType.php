<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\LessThan;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [
            'attr' => ['placeholder' => 'Nom'],
            'constraints' => [
                new NotBlank(),
                new Regex([
                    'pattern' => '/^[a-zA-Z\s]*$/',
                    'message' => 'Le nom ne doit contenir que des lettres et des espaces.',
                ]),
            ],
        ])
        ->add('prenom', TextType::class, [
            'attr' => ['placeholder' => 'Prénom'],
            'constraints' => [
                new NotBlank(),
                new Regex([
                    'pattern' => '/^[a-zA-Z\s]*$/',
                    'message' => 'Le prénom ne doit contenir que des lettres et des espaces.',
                ]),
            ],
        ])
        ->add('dateNaissance', DateType::class, [
            'widget' => 'single_text',
            'html5' => true,
            'attr' => ['placeholder' => 'Date de Naissance', 'class' => 'form-control datepicker'],
            'constraints' => [
                new NotBlank(),
                new LessThan([
                    'value' => new \DateTime('-18 years'),
                    'message' => 'Vous devez avoir au moins 18 ans.',
                ]),
            ],
        ])
        ->add('numTel', TextType::class, [
            'attr' => ['placeholder' => 'Numéro de Téléphone'],
            'constraints' => [
                new NotBlank(),
                new Regex([
                    'pattern' => '/^[0-9]{8}$/',
                    'message' => 'Le numéro de téléphone doit contenir exactement 8 chiffres.',
                ]),
            ],
        ])
        ->add('email', EmailType::class, [
            'label' => '',
            'attr' => ['placeholder' => 'Email'],
            'constraints' => [
                new NotBlank(),
                new Email(),
            ],
        ])
        ->add('imageUser', FileType::class, [
            'label' => '',
            'mapped' => false,
            'required' => false,
            'attr' => [
                'placeholder' => 'Image (JPEG, JPG or PNG file)',
                'accept' => 'image/jpeg, image/jpg, image/png',
            ],
        ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
