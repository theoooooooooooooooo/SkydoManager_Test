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
    #[Route('/devis', name: 'formDevis', methods: ['GET', 'POST'])] 
    public function legalAction(Request $request, DevisRepository $legalRepository)
    {
        $user = $this->getUser(); // Récupère l'utilisateur connecté

        $devis = new Devis();
        $form = $this->createForm(DevisFormType::class, $devis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $devis->setIdClient($user);
 
            $legalRepository->save($devis, true);

            // Redirigez vers une page de confirmation ou autre
            return $this->redirectToRoute('interactionDevis');

        }

        return $this->render('security/legal/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/devis', name: 'devis')]
    public function route0(DevisRepository $devisRepository): Response
    {
        $user = $this->getUser(); // Récupère l'utilisateur connecté
        $legal = $devisRepository->findBy(['idClient' => $user]);

        return $this->render('security/devis/consultDevis.html.twig', [
            'legal' => $legal,
        ]);
    }
}

?>