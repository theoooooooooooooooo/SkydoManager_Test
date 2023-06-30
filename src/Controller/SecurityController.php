<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Client;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SecurityController extends AbstractController
{
    #[Route(path: '/connexion', name: 'login')]
    public function login(UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager, AuthenticationUtils $authenticationUtils,  Request $request): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        // Get username and password from the request
        $username = $request->request->get('username');
        $password = $request->request->get('password');

        // Vérification de l'administrateur
        $adminRepository = $entityManager->getRepository(User::class);
        $admin = $adminRepository->findOneBy(['username' => $username]);
        if ($admin && $passwordHasher->isPasswordValid($admin, $password)) {
            // Connexion réussie en tant qu'administrateur
            // Réalisez les actions nécessaires et redirigez vers la page d'administration par exemple
               return $this->redirectToRoute('accueil');
        }

        // Vérification de l'utilisateur
        $userRepository = $entityManager->getRepository(Client::class);
        $user = $userRepository->findOneBy(['username' => $username]);
        if ($user && $passwordHasher->isPasswordValid($user, $password)) {
            // Connexion réussie en tant qu'utilisateur
            // Réalisez les actions nécessaires et redirigez vers la page utilisateur par exemple
            return $this->redirectToRoute('accueil');
        }

        // Si aucune correspondance n'a été trouvée, affichez une erreur de connexion
        $this->addFlash('error', 'Identifiants invalides.');

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername, 
            'error' => $error
        ]);
    }

    #[Route(path: '/deconnexion', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route('/accueil', name: 'accueil')]
    public function route1(): Response
    {

        return $this->render('security/Accueil.html.twig');
    }
}

// namespace App\Controller;

// use App\Entity\User;
// use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
// use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
// use Symfony\Component\Security\Csrf\CsrfToken;
// use App\Entity\Client;
// use App\Form\LoginFormType;
// use Doctrine\ORM\EntityManagerInterface;
// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
// use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

// class SecurityController extends AbstractController
// {
//     private $csrfTokenManager;

//     public function __construct(CsrfTokenManagerInterface $csrfTokenManager)
//     {
//         $this->csrfTokenManager = $csrfTokenManager;
//     }

    
//     #[Route('/connexion', name: 'login', methods: ['GET', 'POST'])]
//     public function login(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager, AuthenticationUtils $authenticationUtils)
//     {

//         // get the login error if there is one
//         $error = $authenticationUtils->getLastAuthenticationError();
//         // last username entered by the user
//         $lastUsername = $authenticationUtils->getLastUsername();

//         // Déterminez l'entité cible en fonction de la route actuelle
//         $targetEntity = ($request->attributes->get('_route') === 'login') ? User::class : Client::class;

        

//         $csrfToken = $this->csrfTokenManager->getToken('key_name')->getValue();

//         $form = $this->createForm(LoginFormType::class, null, [
//             'target_entity' => $targetEntity,
//             'csrf_protection' => false, // Désactivez la protection CSRF du formulaire
//         ]);

//         $form->handleRequest($request);

//         if ($form->isSubmitted() && $form->isValid()) {
//             $formData = $form->getData();
//             $username = $formData['username'];
//             $password = $formData['password'];
//             $submittedToken = $request->request->get('_token');

//             if (!$this->csrfTokenManager->isTokenValid(new CsrfToken('key_name', $submittedToken))) {
//                 throw new InvalidCsrfTokenException('Invalid CSRF token.');
//             }

//             // Vérification de l'administrateur
//             $adminRepository = $entityManager->getRepository(User::class);
//             $admin = $adminRepository->findOneBy(['username' => $username]);
//             if ($admin && $passwordHasher->isPasswordValid($admin, $password)) {
//                 // Connexion réussie en tant qu'administrateur
//                 // Réalisez les actions nécessaires et redirigez vers la page d'administration par exemple
//                 return $this->redirectToRoute('accueil');
//             }

//             // Vérification de l'utilisateur
//             $userRepository = $entityManager->getRepository(Client::class);
//             $user = $userRepository->findOneBy(['username' => $username]);
//             if ($user && $passwordHasher->isPasswordValid($user, $password)) {
//                 // Connexion réussie en tant qu'utilisateur
//                 // Réalisez les actions nécessaires et redirigez vers la page utilisateur par exemple
//                 return $this->redirectToRoute('accueil');
//             }

//             // Si aucune correspondance n'a été trouvée, affichez une erreur de connexion
//             $this->addFlash('error', 'Identifiants invalides.');
//         }

//         return $this->render('security/login.html.twig', [
//             'form' => $form->createView(),
//             'error' => $error,
//             'csrf_token' => $csrfToken,
//         ]);
//     }

//     #[Route(path: '/deconnexion', name: 'app_logout')]
//     public function logout(): void
//     {
//         throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
//     }

//     #[Route('/accueil', name: 'accueil')]
//     public function route1(): Response
//     {
//         return $this->render('security/Accueil.html.twig');
//     }
// }
