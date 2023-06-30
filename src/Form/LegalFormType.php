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
            ])
            ->add('siret', TextType::class, [
                'label' => 'SIRET',
                'required' => true,
            ])
            ->add('adresse', TextareaType::class, [
                'label' => 'Adresse',
                'required' => true,
            ])
            ->add('urlSite', TextType::class, [
                'label' => 'URL du site',
                'required' => true,
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => true,
            ])
            ->add('telephone', TelType::class, [
                'label' => 'Téléphone',
                'required' => true,
            ])
            ->add('NomSite', TextType::class, [
                'label' => 'Nom site',
                'required' => true,
            ])
            ->add('DirecteurPublication', TextType::class, [
                'label' => 'Directeur publication',
                'required' => true,
            ])
            ->add('MoyenContact', ChoiceType::class, [
                'label' => 'Moyen de contact',
                'choices' => [
                    'Téléphone' => 'Téléphone',
                    'Email' => 'Email',
                    'Courrier' => 'Courrier',
                ],
                'required' => true,
            ])
            ->add('ModePaiement', TextType::class, [
                'label' => 'Mode paiement',
                'required' => true,
            ])
            ->add('JoursHoraire', TextType::class, [
                'label' => 'Jours/horaire d\'ouverture',
                'required' => true,
            ])
            ->add('delaisLivraison', TextType::class, [
                'label' => 'Délais de livraison',
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