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
        ->add('raisonSociale', TextType::class, [
            'label' => 'Raison sociale',
            'required' => true,
            'attr' => [
                'class' => 'custom-label-input'
            ]
        ])
        ->add('siret', TextType::class, [
            'label' => 'SIRET',
            'required' => true,
            'attr' => [
                'class' => 'custom-label-input'
            ]
        ])
        ->add('adresse', TextareaType::class, [
            'label' => 'Adresse',
            'required' => true,
            'attr' => [
                'class' => 'custom-label-input'
            ]
        ])
        ->add('urlSite', TextType::class, [
            'label' => 'URL du site',
            'required' => true,
            'attr' => [
                'class' => 'custom-label-input'
            ]
        ])
        ->add('email', EmailType::class, [
            'label' => 'Email',
            'required' => true,
            'attr' => [
                'class' => 'custom-label-input'
            ]
        ])
        ->add('telephone', TelType::class, [
            'label' => 'Téléphone',
            'required' => true,
            'attr' => [
                'class' => 'custom-label-input'
            ]
        ])
        ->add('NomSite', TextType::class, [
            'label' => 'Nom site',
            'required' => true,
            'attr' => [
                'class' => 'custom-label-input'
            ]
        ])
        ->add('DirecteurPublication', TextType::class, [
            'label' => 'Directeur publication',
            'required' => true,
            'attr' => [
                'class' => 'custom-label-input'
            ]
        ])
        ->add('MoyenContact', ChoiceType::class, [
            'label' => 'Moyen de contact',
            'choices' => [
                'Téléphone' => 'Téléphone',
                'Email' => 'Email',
                'Courrier' => 'Courrier',
            ],
            'required' => true,
            'attr' => [
                'class' => 'custom-label-input'
            ]
        ])
        ->add('ModePaiement', TextType::class, [
            'label' => 'Mode paiement',
            'required' => true,
            'attr' => [
                'class' => 'custom-label-input'
            ]
        ])
        ->add('JoursHoraire', TextType::class, [
            'label' => 'Jours/horaire d\'ouverture',
            'required' => true,
            'attr' => [
                'class' => 'custom-label-input'
            ]
        ])
        ->add('delaisLivraison', TextType::class, [
            'label' => 'Délais de livraison',
            'required' => true,
            'attr' => [
                'class' => 'custom-label-input'
            ]
        ])
        ->add('ProduitService', TextType::class, [
            'label' => 'Produit/Service (veuillez écrire le produit et le service si vous avez les deux)',
            'required' => true,
            'attr' => [
                'class' => 'custom-label-input'
            ]
        ])->add('PersonneAContacter', TextType::class, [
            'label' => 'Personne à contacter',
            'required' => true,
            'attr' => [
                'class' => 'custom-label-input'
            ]
        ]);
}

public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults([
        'data_class' => InfoLegalClient::class,
        'attr' => [
            'class' => 'custom-form'
        ]
    ]);
    }
}

?>