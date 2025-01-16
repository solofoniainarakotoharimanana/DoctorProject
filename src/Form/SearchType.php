<?php

namespace App\Form;

use App\Class\Search;
use App\Entity\Speciality;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => false, 
                'required' => false,
                'attr' => [
                    'placeholder' => "Recherche par nom ou prénom",
                ]
            ])
            ->add('specilaities', EntityType::class, [
                'required' => false,
                'expanded' => false,
                'multiple' => true,
                'class' => Speciality::class
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'method' => 'GET',
            'csrf_protection' => false,
            'data_class' => Search::class
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
