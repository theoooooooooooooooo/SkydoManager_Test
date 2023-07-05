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
public function devisAction(Request $request, DevisRepository $devisRepository): Response
{
    $user = $this->getUser(); // Get the logged-in user

    $devis = new Devis();
    $prixTotal = 0;

    $form = $this->createForm(DevisFormType::class, $devis);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $devis->setIdClient($user);

        // Calculate the prices based on the form data
        $prixTotal = 0;
        $services = [
            'siteEcom' => ['price' => 2000.00, 'quantity' => $form->get('siteEcom')->getData()],
            'siteVitrine' => ['price' => 1000.00, 'quantity' => $form->get('siteVitrine')->getData()],
            'siteCustom' => ['price' => 2000.00, 'quantity' => $form->get('siteCustom')->getData()],
            'maintenance' => ['price' => 1000.00, 'quantity' => $form->get('maintenance')->getData()],
            'logo' => ['price' => 2000.00, 'quantity' => $form->get('logo')->getData()],
            'identiteVisuelle' => ['price' => 2000.00, 'quantity' => $form->get('identiteVisuelle')->getData()],
            'print' => ['price' => 2000.00, 'quantity' => $form->get('print')->getData()],
            'shooting' => ['price' => 2000.00, 'quantity' => $form->get('shooting')->getData()],
        ];

        foreach ($services as $service => $data) {
            $price = $data['price'];
            $quantity = $data['quantity'];

            $devis->{'setPrix' . ucfirst($service)}($quantity > 0 ? $price : null);

            $prixTotal += $quantity * $price;
        }

        $devis->setPrixTotal($prixTotal);

        $devisRepository->save($devis, true);

        // Redirect to a confirmation page or any other page
        return $this->redirectToRoute('recapitulatif', [
            'siteEcom' => $form->get('siteEcom')->getData(),
            'siteVitrine' => $form->get('siteVitrine')->getData(),
            'siteCustom' => $form->get('siteCustom')->getData(),
            'maintenance' => $form->get('maintenance')->getData(),
            'logo' => $form->get('logo')->getData(),
            'identiteVisuelle' => $form->get('identiteVisuelle')->getData(),
            'print' => $form->get('print')->getData(),
            'shooting' => $form->get('shooting')->getData(),
            'prixEcom' => $devis->getPrixSiteEcom(),
            'prixVitrine' => $devis->getPrixSiteVitrine(),
            'prixCustom' => $devis->getPrixSiteCustom(),
            'prixMaintenance' => $devis->getPrixMaintenance(),
            'prixLogo' => $devis->getPrixLogo(),
            'prixIdVisuelle' => $devis->getPrixIdentiteVisuelle(),
            'prixPrint' => $devis->getPrixPrint(),
            'prixShooting' => $devis->getPrixShooting(),
            'prixTotal' => $devis->getPrixTotal(),
            'quantiteSiteEcom' => $form->get('siteEcom')->getData(),
            'quantiteSiteVitrine' => $form->get('siteVitrine')->getData(),
            'quantiteSiteCustom' => $form->get('siteCustom')->getData(),
            'quantiteMaintenance' => $form->get('maintenance')->getData(),
            'quantiteLogo' => $form->get('logo')->getData(),
            'quantiteIdVisuelle' => $form->get('identiteVisuelle')->getData(),
            'quantitePrint' => $form->get('print')->getData(),
            'quantiteShooting' => $form->get('shooting')->getData(),
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
        $siteVitrine = $request->query->get('siteVitrine');
        $siteCustom = $request->query->get('siteCustom');
        $maintenance = $request->query->get('maintenance');
        $logo = $request->query->get('logo');
        $identiteVisuelle = $request->query->get('identiteVisuelle');
        $print = $request->query->get('print');
        $shooting = $request->query->get('shooting');
        // Récupérer les prix pour chaque service choisi depuis le formulaire
        $prixEcom = $request->query->get('prixEcom');
        $prixVitrine = $request->query->get('prixVitrine');
        $prixCustom = $request->query->get('prixCustom');
        $prixMaintenance = $request->query->get('prixMaintenance');
        $prixLogo = $request->query->get('prixLogo');
        $prixIdVisuelle = $request->query->get('prixIdVisuelle');
        $prixPrint = $request->query->get('prixPrint');
        $prixShooting = $request->query->get('prixShooting');
        $prixTotal = $request->query->get('prixTotal');
        // Récupérer les quantités pour chaque service choisi depuis le formulaire
        $quantiteSiteEcom = $request->request->get('quantiteEcom');
        $quantiteSiteVitrine = $request->request->get('quantiteVitrine');
        $quantiteSiteCustom = $request->request->get('quantiteCustom');
        $quantiteMaintenance = $request->request->get('quantiteMaintenance');
        $quantiteLogo = $request->request->get('quantiteLogo');
        $quantiteIdVisuelle = $request->request->get('quantiteIdVisuelle');
        $quantitePrint = $request->request->get('quantitePrint');
        $quantiteShooting = $request->request->get('quantiteShooting');

        return $this->render('security/devis/recapitulatif.html.twig', [
            'user' => $user, // Passer l'objet utilisateur au template
            'siteEcom' => $siteEcom,
            'siteVitrine' => $siteVitrine,
            'siteCustom' => $siteCustom,
            'maintenance' => $maintenance,
            'logo' => $logo,
            'identiteVisuelle' => $identiteVisuelle,
            'print' => $print,
            'shooting' => $shooting,
            'prixEcom' => $prixEcom,
            'prixVitrine' => $prixVitrine,
            'prixCustom' => $prixCustom,
            'prixMaintenance' => $prixMaintenance,
            'prixLogo' => $prixLogo,
            'prixIdVisuelle' => $prixIdVisuelle,
            'prixPrint' => $prixPrint,
            'prixShooting' => $prixShooting,
            'prixTotal' => $prixTotal,
            'quantiteEcom' => $quantiteSiteEcom,
            'quantiteVitrine' => $quantiteSiteVitrine,
            'quantiteCustom' => $quantiteSiteCustom,
            'quantiteMaintenance' => $quantiteMaintenance,
            'quantiteLogo' => $quantiteLogo,
            'quantiteIdVisuelle' => $quantiteIdVisuelle,
            'quantitePrint' => $quantitePrint,
            'quantiteShooting' => $quantiteShooting,
        ]);
    }
    
}
?>