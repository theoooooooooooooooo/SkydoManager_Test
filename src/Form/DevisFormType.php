<?php
namespace App\Form;

use App\Entity\Devis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class DevisFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('siteEcom', CheckboxType::class, [
                'label' => 'Site Ecommerce',
                'required' => false,
            ])
            ->add('quantiteEcom', IntegerType::class, [
                'label' => 'Quantité Site Ecommerce',
                'required' => false,
            ])
            ->add('siteVitrine', CheckboxType::class, [
                'label' => 'Site Vitrine',
                'required' => false,
            ])
            ->add('quantiteVitrine', IntegerType::class, [
                'label' => 'Quantité Site Vitrine',
                'required' => false,
            ])
            ->add('siteCustom', CheckboxType::class, [
                'label' => 'Site Custom',
                'required' => false,
            ])
            ->add('quantiteCustom', IntegerType::class, [
                'label' => 'Quantité Site Custom',
                'required' => false,
            ])
            ->add('maintenance', CheckboxType::class, [
                'label' => 'Maintenance & Sécurisation',
                'required' => false,
            ])
            ->add('quantiteMaintenance', IntegerType::class, [
                'label' => 'Quantité Maintenance & Sécurisation',
                'required' => false,
            ])
            // Ajoutez les autres services de la même manière
            ->add('logo', CheckboxType::class, [
                'label' => 'Création de logo',
                'required' => false,
            ])
            ->add('quantiteLogo', IntegerType::class, [
                'label' => 'Quantité Création de logo',
                'required' => false,
            ])
            ->add('identiteVisuelle', CheckboxType::class, [
                'label' => 'Identité Visuelle',
                'required' => false,
            ])
            ->add('quantiteIdVisuelle', IntegerType::class, [
                'label' => 'Quantité Identité Visuelle',
                'required' => false,
            ])
            ->add('print', CheckboxType::class, [
                'label' => 'Flyer - 4/3 - Affiches',
                'required' => false,
            ])
            ->add('quantitePrint', IntegerType::class, [
                'label' => 'Quantité Flyer - 4/3 - Affiches',
                'required' => false,
            ])
            ->add('shooting', CheckboxType::class, [
                'label' => 'Shooting Photo',
                'required' => false,
            ])
            ->add('quantiteShooting', IntegerType::class, [
                'label' => 'Quantité Shooting Photo',
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