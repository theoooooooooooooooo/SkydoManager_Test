<?php
namespace App\Controller;

use App\Entity\InfoLegalClient;
use App\Form\LegalFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\InfoLegalClientRepository;
use Symfony\Component\HttpFoundation\Response;

class LegalController extends AbstractController 
{
    #[Route('/legal', name: 'legal', methods: ['GET', 'POST'])] 
    public function legalAction(Request $request, InfoLegalClientRepository $legalRepository)
    {
        $user = $this->getUser(); // Récupère l'utilisateur connecté

        $legal = new InfoLegalClient();
        $form = $this->createForm(LegalFormType::class, $legal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $legal->setIdClient($user);
 
            $legalRepository->save($legal, true);

            // Redirigez vers une page de confirmation ou autre
            return $this->redirectToRoute('interaction');

        }

        return $this->render('security/legal/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/Interaction', name: 'interaction')]
    public function route0(InfoLegalClientRepository $legalRepository): Response
    {
        $user = $this->getUser(); // Récupère l'utilisateur connecté
        $legal = $legalRepository->findBy(['idClient' => $user]);

        return $this->render('security/legal/interaction.html.twig', [
            'legal' => $legal,
        ]);
    }

    #[Route('/mentionLegale/{id}', name: 'mentionLegale', methods: ['GET'])] 
    public function route1(int $id, InfoLegalClientRepository $legalRepository): Response
    {
        $legal = $legalRepository->find($id);

        return $this->render('security/legal/mentionLegale.html.twig', [
            'legal' => $legal,
        ]);
    }

    #[Route('/CGV/{id}', name: 'cgv', methods: ['GET'])] 
    public function route2(int $id, InfoLegalClientRepository $legalRepository): Response
    {
        $legal = $legalRepository->find($id);

        return $this->render('security/legal/cgv.html.twig', [
            'legal' => $legal,
        ]);
    }
}

?>