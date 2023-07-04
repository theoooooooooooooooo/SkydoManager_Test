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

        $form = $this->createForm(DevisFormType::class, $devis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

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

    #[Route('/recapitulatif', name: 'recapitulatif', methods: ['GET'])]
    public function recapitulatifAction(Request $request, Security $security): Response
    {
        $user = $security->getUser(); // Récupère l'utilisateur connecté

        // Vérifiez si l'utilisateur est connecté
        if (!$user) {
            // Gérez le cas où l'utilisateur n'est pas connecté, par exemple, redirigez-le vers la page de connexion
            return $this->redirectToRoute('app_login');
        }

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
            'user' => $user, // Passer l'objet utilisateur au template
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