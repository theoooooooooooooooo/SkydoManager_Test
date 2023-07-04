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
        ])
        ->add('siret', CheckboxType::class, [
            'label' => 'Site Vitrine',
            'required' => false,
        ])
        ->add('siteCustom', CheckboxType::class, [
            'label' => 'Site Custom',
            'required' => false,
        ])
        ->add('maintenance', CheckboxType::class, [
            'label' => 'Maintenance & Sécurisation',
            'required' => false,
        ])
        ->add('logo', CheckboxType::class, [
            'label' => 'Création de logo',
            'required' => false,
        ])
        ->add('identiteVisuelle', CheckboxType::class, [
            'label' => 'Identité Visuelle',
            'required' => false,
        ])
        ->add('print', CheckboxType::class, [
            'label' => 'Flyer - 4/3 - Affiches',
            'required' => false,
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