<?php
namespace App\Form;

use App\Entity\Devis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class DevisFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('siteEcom', CheckboxType::class, [
            'label' => 'Site Ecommerce',
            'required' => false,
            'attr' => [
                'class' => 'custom-label-checkbox'
            ]
        ])
        ->add('siret', CheckboxType::class, [
            'label' => 'Site Vitrine',
            'required' => false,
            'attr' => [
                'class' => 'custom-label-checkbox'
            ]
        ])
        ->add('siteCustom', CheckboxType::class, [
            'label' => 'Site Custom',
            'required' => false,
            'attr' => [
                'class' => 'custom-label-checkbox'
            ]
        ])
        ->add('maintenance', CheckboxType::class, [
            'label' => 'Maintenance & Sécurisation',
            'required' => false,
            'attr' => [
                'class' => 'custom-label-checkbox'
            ]
        ])
        ->add('logo', CheckboxType::class, [
            'label' => 'Création de logo',
            'required' => false,
            'attr' => [
                'class' => 'custom-label-checkbox'
            ]
        ])
        ->add('identiteVisuelle', CheckboxType::class, [
            'label' => 'Identité Visuelle',
            'required' => false,
            'attr' => [
                'class' => 'custom-label-checkbox'
            ]
        ])
        ->add('print', CheckboxType::class, [
            'label' => 'Flyer - 4/3 - Affiches',
            'required' => false,
            'attr' => [
                'class' => 'custom-label-checkbox'
            ]
        ])
        ->add('shooting', CheckboxType::class, [
            'label' => 'Shooting Photo',
            'required' => false,
            'attr' => [
                'class' => 'custom-label-checkbox'
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Devis::class,
        ]);
    }
}

?>