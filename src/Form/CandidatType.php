<?php

namespace App\Form;
use App\Entity\Candidat;
use App\Entity\Gender;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('lastname')
            ->add('address')
            ->add('country')
            ->add('nationality')
            ->add('currentLocation')
            // ->add('birthDate')
            ->add('birthPlace')
            ->add('isAvailable')
            ->add('experience')
            ->add('shortDescription')
            ->add('note')
            // ->add('dateCreated')
            // ->add('dateUpdated')
            // ->add('jobCategory')
            // ->add('user')
            // ->add('gender', EntityType::class, [
            //     'class' => Gender::class,
            //     'choices' => $genderRepository->getAll(),
            //     'choice_label' => 'genderName',
            // ])
            ->add ('gender', EntityType::class,[
                'class' => Gender::class
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
