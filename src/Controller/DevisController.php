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
        $devis->setPrixEcom(2000);
        
        $form = $this->createForm(DevisFormType::class, $devis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $devis->setIdClient($user);
 
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
                'prixSiteEcom' => $devis->getPrixEcom()
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
        ]);
    }
}
?>