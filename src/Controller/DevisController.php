<?php
namespace App\Controller;

use App\Entity\Devis;
use App\Form\DevisFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\DevisRepository;
use Symfony\Component\HttpFoundation\Response;

class DevisController extends AbstractController 
{
    #[Route('/devis', name: 'devis', methods: ['GET', 'POST'])] 
    public function legalAction(Request $request, DevisRepository $devisRepository)
    {
        $user = $this->getUser(); // Récupère l'utilisateur connecté

        $devis = new Devis();

        $form = $this->createForm(DevisFormType::class, $devis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $devis->setIdClient($user);


            // Définir les prix par défaut
            $devis->setPrixEcom(2000,00);
            $devis->setPrixVitrine(1000,00);
            $devis->setPrixCustom(2000,0);
            $devis->setPrixMaintenance(1000,00);
            $devis->setPrixLogo(2000,00 );
            $devis->setPrixIdVisuelle(2000,00 );
            $devis->setPrixPrint(2000,00);
            $devis->setPrixShooting(2000,00);
 
            $devisRepository->save($devis, true);

            // Redirigez vers une page de confirmation ou autre
            return $this->redirectToRoute('recapitulatif', [
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
        ]);
        }  
        return $this->render('security/devis/formDevis.html.twig', [
            'form' => $form->createView(),
        ]); 
    }   

    #[Route('/recapitulatif', name: 'recapitulatif')]
    public function recapitulatifAction(Request $request): Response
    {
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

        return $this->render('security/devis/recapitulatif.html.twig', [
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
        ]);
    }
}
?>