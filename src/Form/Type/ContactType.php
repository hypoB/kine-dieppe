<?php

namespace App\Form\Type;

use Gregwar\CaptchaBundle\Type\CaptchaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civilite', ChoiceType::class, [
                'label' => 'Civilité',
                'choices' => [
                    'Homme' => 'homme',
                    'Femme' => 'femme',
                ],
                'attr' => [
                    'class' => 'form-check',
                ],
                'label_attr' => [
                    'class' => 'radio-inline',
                ],
                'constraints' => [new NotNull()],
                'expanded' => true,
                'required' => true
            ])
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'constraints' => [new NotNull([], 'Veuillez saisir votre nom')],
                'attr' => [
                    'placeholder' => 'Votre nom',
                    'class' => 'form-control',
                ],
                'required' => false,
            ])
            ->add('email_contact', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Votre email',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotNull([], 'Veuillez saisir un email valide'),
                    new Email([], 'Veuillez saisir un email valide'),
                ],
                'required' => false,
            ])
            ->add('telephone', TelType::class, [
                'label' => 'Téléphone',
                'attr' => [
                    'placeholder' => 'Votre numéro de téléphone',
                    'class' => 'form-control',
                ],
                'constraints' => [new NotNull([], 'Veuillez saisir votre numéro de téléphone')],

                'required' => false,
            ])
            ->add('raison', ChoiceType::class, [
                'label' => "Motif du rendez-vous",
                'choices' => [
                    'Rhumatologie' => 'rhumatologie',
                    'Orthopédie/traumatologie' => 'ortho',
                    "Réabilitation à l'effort" => 'reabilitation',
                    'Oncologie' => 'oncologie',
                    'Kinésithérapie du sport' => 'kinesport',
                ],
                'attr' => [
                    'class' => 'form-check',
                ],
                'constraints' => [
                    new Choice(
                        [
                            'choices' => ['rhumatologie', 'ortho', 'reabilitation', 'oncologie', 'kinesport'],
                            'message' => 'Valeur selectionnée invalide'
                        ]
                    )
                ],

                'expanded' => false,
                'required' => true,
            ])
            ->add('avec', ChoiceType::class,
                [
                    'label' => "Je souhaite avoir rendez-vous (si disponible) avec",
                    'choices' => [
                        'La personne la plus rapidement disponible' => 'La personne la plus rapidement disponible',
                        'Sacha Moreau' => 'Sacha Moreau',
                        "Marion Masse" => 'Marion Masse',
                        'Brieuc Burette' => 'Brieuc Burette',
                        'Jeanne Ribot' => 'Jeanne Ribot',
                    ],
                    'attr' => [
                        'class' => 'form-check',
                    ],
                    'required' => true,
                    'expanded' => false,
                ])
            ->add('disponibilite', ChoiceType::class,
                [
                    'label' => "Vos disponibilités pour venir à vos rendez-vous (du lundi au vendredi). Possibilité de cocher
plusieurs cases",
                    'choices' => [
                        'Toute la journée' => 'Toute la journée',
                        'Toute la matinée' => 'Toute la matinée',
                        "Toute l'après-midi" => "Toute l'après-midi",
                        'Le soir après 18h00' => 'Le soir après 18h00',
                        'Avant 09h00' => 'Avant 09h00',
                        'Horaires variables selon les jours' => 'Horaires variables selon les jours',
                    ],
                    'attr' => [
                        'class' => 'form-check',
                    ],
                    'constraints' => [
                        new Choice(
                            [
                                'choices' => [
                                    'Toute la journée' => 'Toute la journée',
                                    'Toute la matinée' => 'Toute la matinée',
                                    "Toute l'après-midi" => "Toute l'après-midi",
                                    'Le soir après 18h00' => 'Le soir après 18h00',
                                    'Avant 09h00' => 'Avant 09h00',
                                    'Horaires variables selon les jours' => 'Horaires variables selon les jours',
                                ],
                                'message' => 'Valeur selectionnée invalide',
                                'multiple' => true,
                                'min' => 1,
                                'minMessage' => 'Veuillez selectionner au moins une valeur',
                            ]
                        )
                    ],
                    'required' => false,
                    'multiple' => true,
                    'expanded' => true,
                ])
            ->add('description', TextareaType::class, [
                'label' => 'Description de votre demande de soins (150 caractères max)',
                'row_attr' => [
                    'class' => 'description'
                ],
                'constraints' => [
                    new Length(
                        [
                            'max' => 150,
                            'maxMessage' => 'Votre description ne doit pas dépasser 150 caractères',
                        ]
                    )
                ],
                'required' => false,
            ])
            ->add('charges', ChoiceType::class,
                [
                    'label' => "Si vous bénéficiez d'une prise en charge spéciale pour cette ordonnance (autre que maladie), merci de le préciser ci-dessous : (sinon ne rien cocher)",
                    'choices' => [
                        'ALD (affection longue durée)' => 'ALD',
                        'AT (accident du travail)' => 'AT',
                        "Maternité" => 'Maternité',
                        'Invalidité' => 'Invalidité',
                        'CMU (partielle ou totale)' => 'CMU',
                        'AME (aide médicale état)' => 'AME',
                    ],
                    'attr' => [
                        'class' => 'form-check',
                    ],
                    'constraints' => [
                        new Choice(
                            [
                                'choices' => [
                                    'ALD (affection longue durée)' => 'ALD',
                                    'AT (accident du travail)' => 'AT',
                                    "Maternité" => 'Maternité',
                                    'Invalidité' => 'Invalidité',
                                    'CMU (partielle ou totale)' => 'CMU',
                                    'AME (aide médicale état)' => 'AME',
                                ],
                                'multiple' => true,
                                'min' => 0,
                            ]
                        )
                    ],
                    'required' => false,
                    'multiple' => true,
                    'expanded' => true,
                ])
            ->add('captcha', CaptchaType::class, ['attr' => ['class' => 'feedback-captcha']])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
            ]);
    }
}