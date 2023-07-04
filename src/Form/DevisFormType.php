<?php
namespace App\Form;

use App\Entity\InfoLegalClient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class LegalFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('siteEcom', TextType::class, [
                'label' => 'Site Ecommerce',
                'required' => true,
            ])
            ->add('siret', TextType::class, [
                'siteVitrine' => 'Site Vitrine',
                'required' => true,
            ])
            ->add('siteCustom', TextareaType::class, [
                'label' => 'Site Custom',
                'required' => true,
            ])
            ->add('maintenance', TextType::class, [
                'label' => 'Maintenance & Sécurisation',
                'required' => true,
            ])
            ->add('logo', EmailType::class, [
                'label' => 'Création de logo',
                'required' => true,
            ])
            ->add('identiteVisuelle', EmailType::class, [
                'label' => 'Identité Visuelle',
                'required' => true,
            ])
            ->add('print', EmailType::class, [
                'label' => 'Flyer - 4/3 - Affiches',
                'required' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InfoLegalClient::class,
        ]);
    }
}

?>