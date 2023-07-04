<?php
namespace App\Controller;

use App\Entity\Devis;
use App\Form\DevisFormType;
use App\Repository\DevisRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DevisController extends AbstractController 
{
    #[Route('/devis', name: 'devis', methods: ['GET', 'POST'])] 
    public function legalAction(Request $request, DevisRepository $devisRepository)
    {
        $user = $this->getUser(); // Récupère l'utilisateur connecté

        $devis = new Devis();
        $prixTotal = 0;

        // $devis->setPrixEcom(2000);
        
        $form = $this->createForm(DevisFormType::class, $devis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // // Ajouter le prix des autres prestations au prix total
            // $prixTotal += $devis->getPrixEcom();
            // $prixTotal += $devis->getSiteCustom();
            // $prixTotal += $devis->getMaintenance();
            // $prixTotal += $devis->getLogo();
            // $prixTotal += $devis->getIdentiteVisuelle();
            // $prixTotal += $devis->getPrint();
            // $prixTotal += $devis->getShooting();

            // $devis->setPrixTotal($prixTotal);

            $devis->setIdClient($user);


            // Définir les prix par défaut
            $devis->setPrixEcom($form->get('siteEcom')->getData() ? 2000.00 : null);
            $devis->setPrixVitrine($form->get('siret')->getData() ? 1000.00 : null);
            $devis->setPrixCustom($form->get('siteCustom')->getData() ? 2000.00 : null);
            $devis->setPrixMaintenance($form->get('maintenance')->getData() ? 1000.00 : null);
            $devis->setPrixLogo($form->get('logo')->getData() ? 2000.00 : null);
            $devis->setPrixIdVisuelle($form->get('identiteVisuelle')->getData() ? 2000.00 : null);
            $devis->setPrixPrint($form->get('print')->getData() ? 2000.00 : null);
            $devis->setPrixShooting($form->get('shooting')->getData() ? 2000.00 : null);

            // Ajouter le prix des autres prestations au prix total
            $prixTotal += $devis->getPrixEcom() !== null ? (int)$devis->getPrixEcom() : 0;
            $prixTotal += $devis->getPrixVitrine() !== null ? (int)$devis->getPrixVitrine() : 0;
            $prixTotal += $devis->getPrixCustom() !== null ? (int)$devis->getPrixCustom() : 0;
            $prixTotal += $devis->getPrixMaintenance() !== null ? (int)$devis->getPrixMaintenance() : 0;
            $prixTotal += $devis->getPrixLogo() !== null ? (int)$devis->getPrixLogo() : 0;
            $prixTotal += $devis->getPrixIdVisuelle() !== null ? (int)$devis->getPrixIdVisuelle() : 0;
            $prixTotal += $devis->getPrixPrint() !== null ? (int)$devis->getPrixPrint() : 0;
            $prixTotal += $devis->getPrixShooting() !== null ? (int)$devis->getPrixShooting() : 0;
            
            $devis->setPrixTotal($prixTotal);

            $devisRepository->save($devis, true);

            // Redirigez vers une page de confirmation ou autre
            return $this->redirectToRoute('recapitulatif', [
                'id' => $devis->getId(),
                'siteEcom' => $devis->getSiteEcom(),
                'siret' => $devis->getSiret(),
                'siteCustom' => $devis->getSiteCustom(),
                'maintenance' => $devis->getMaintenance(),
                'logo' => $devis->getLogo(),
                'identiteVisuelle' => $devis->getIdentiteVisuelle(),
                'print' => $devis->getPrint(),
                'shooting' => $devis->getShooting(),
                'prixSiteEcom' => $devis->getPrixEcom(),
                'prixVitrine' => $devis->getPrixVitrine(),
                'prixCustom' => $devis->getPrixCustom(),
                'prixMaintenance' => $devis->getPrixMaintenance(),
                'prixLogo' => $devis->getPrixLogo(),
                'prixIdVisuelle' => $devis->getPrixIdVisuelle(),
                'prixPrint' => $devis->getPrixPrint(),
                'prixShooting' => $devis->getPrixShooting(),
                'prixTotal' => $devis->getPrixTotal(),
        ]);
    }
        return $this->render('security/devis/formDevis.html.twig', [
            'form' => $form->createView(),
        ]); 
    }   

    #[Route('/InteractionDevis', name: 'interactionDevis')]
    public function route4(DevisRepository $devisRepositoryy): Response
    {
        $user = $this->getUser(); // Récupère l'utilisateur connecté
        
        $devis = $devisRepositoryy->findBy(['idClient' => $user]);

        return $this->render('security/devis/interaction.html.twig', [
            'devis' => $devis,
        ]);
    }

    #[Route('/recapitulatif/{id}', name: 'recapitulatif', methods: ['GET'])]
    public function recapitulatifAction(int $id,Request $request, DevisRepository $devisRepository): Response
    {
        $devis = $devisRepository->find($id);

        // Récupérer les choix du formulaire depuis les paramètres de l'URL
        $siteEcom = $request->query->get('siteEcom');
        $siret = $request->query->get('siret');
        $siteCustom = $request->query->get('siteCustom');
        $maintenance = $request->query->get('maintenance');
        $logo = $request->query->get('logo');
        $identiteVisuelle = $request->query->get('identiteVisuelle');
        $print = $request->query->get('print');
        $shooting = $request->query->get('shooting');
        $prixSiteEcom = $request->query->get('prixSiteEcom');
        $prixVitrine = $request->query->get('prixVitrine');
        $prixCustom = $request->query->get('prixCustom');
        $prixMaintenance = $request->query->get('prixMaintenance');
        $prixLogo = $request->query->get('prixLogo');
        $prixIdVisuelle = $request->query->get('prixIdVisuelle');
        $prixPrint = $request->query->get('prixPrint');
        $prixShooting = $request->query->get('prixShooting');
        $prixTotal = $request->query->get('prixTotal');

        return $this->render('security/devis/recapitulatif.html.twig', [
            'devis' => $devis,
            'siteEcom' => $siteEcom,
            'siret' => $siret,
            'siteCustom' => $siteCustom,
            'maintenance' => $maintenance,
            'logo' => $logo,
            'identiteVisuelle' => $identiteVisuelle,
            'print' => $print,
            'shooting' => $shooting,
            'prixSiteEcom' => $prixSiteEcom,
            'prixVitrine' => $prixVitrine,
            'prixCustom' => $prixCustom,
            'prixMaintenance' => $prixMaintenance,
            'prixLogo' => $prixLogo,
            'prixIdVisuelle' => $prixIdVisuelle,
            'prixPrint' => $prixPrint,
            'prixShooting' => $prixShooting,
            'prixTotal' => $prixTotal,
        ]);
    }
}
?>