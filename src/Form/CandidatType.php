<?php

namespace App\Form;
use App\Entity\Candidat;
use App\Entity\Gender;
use App\Entity\JobCategory;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'first_name',
                    'name' => 'first_name',
                    'required' => true
                ]
            ])
            ->add('lastname', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'last_name',
                    'name' => 'last_name',
                    'required' => true
                ]
            ])
            ->add('address', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'address',
                    'name' => 'address',
                ]
            ])
            ->add('country', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'pays',
                    'name' => 'pays'
                ]
            ])
            ->add('nationality', TextType::class, [
                'attr' => [
                    'id' => 'nationality',
                    'name' => 'nationality'
                ]
            ])

            ->add('currentLocation')
            ->add('birthDate', DateType::class, [
                // 'input' => 'datetime_immutable',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datepicker',
                    'id' => 'birth_date',
                    'name' => 'birth_date',
                ]
            ])
            ->add('birthPlace', TextType::class, [
                'attr' => [
                    'id' => 'birth_place',
                    'name' => 'birth_place',
                ]
            ])
            // ->add('isAvailable')
            ->add('experience', ChoiceType::class, [
                'choices' => [
                    '0-6 month' => '0-6 month',
                    '6 month - 1 year' => '6 month - 1 year',
                    '1 -2 years' => '1 -2 years',
                    '2+ years' => '2+ years',
                ],
                'label' => 'Experience professionnelle',
                'row_attr' => [
                    'class' => 'input-field',
                ]
            ])
            ->add('shortDescription', TextareaType::class, [
                'attr' => [
                    'class' => 'materialize-textarea',
                    'id' => 'description',
                    'name' => 'description',
                    'cols' => '50',
                    'rows' => '10'
                ],
            ])
            // ->add('note')
            ->add('jobCategory', EntityType::class, [
                'class' => JobCategory::class,
                'choice_attr' => [
                    'class' => 'g-3'
                ],
                'label' => 'Catégories de job',
                'row_attr' => [
                    'class' => 'input-field',
                    'style' => 'margin-top: 5px;',
                ],
            ])
            // ->add('user')
            ->add('gender', EntityType::class, [
                'class' => Gender::class,
                'row_attr' => [
                    'class' => 'input-field',
                ]
            ])
            // ->add('cv', FileType::class, [
            //     'required' => false,
            //     'mapped' => false,
            //     'attr' => [
            //         'size' => 20000000,
            //         'accept' => '.pdf,.jpg,.doc,.docx,.png,.gif',
            //         ]
            //     ])
            // ->add('photoProfil', FileType::class, [
            //     'required' => false,
            //     'mapped' => false,
            //     'attr' => [
            //         'size' => 20000000,
            //         'accept' => '.pdf,.jpg,.doc,.docx,.png,.gif',
            //         ]
            //     ])
            // ->add('passeportFichier', FileType::class, [
            //     'required' => false,
            //     'mapped' => false,
            //     'attr' => [
            //         'size' => 20000000,
            //         'accept' => '.pdf,.jpg,.doc,.docx,.png,.gif',
            //         ]
            //     ])
            // ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
