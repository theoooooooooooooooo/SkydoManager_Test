<?php

namespace App\Security;

use App\Repository\UserRepository;
use App\Repository\ClientRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge; 
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;

class AuthentificatorAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'login';

    public function __construct(private UrlGeneratorInterface $urlGenerator, private UserRepository $userRepository, private ClientRepository $clientRepository)
    {
    }

    public function authenticate(Request $request): Passport
{
    $username = $request->request->get('username', '');

    $request->getSession()->set(Security::LAST_USERNAME, $username);

    return new Passport(
        new UserBadge($username, function ($userIdentifier) {
            $userRepository = $this->userRepository;
            $clientRepository = $this->clientRepository;

            // Recherche d'un utilisateur dans l'entité User
            $user = $userRepository->findOneByUsername($userIdentifier);
            if ($user) {
                return $user;
            }

            // Recherche d'un utilisateur dans l'entité Client
            $client = $clientRepository->findOneByUsername($userIdentifier);
            if ($client) {
                return $client;
            }

            return null;
        }),
        new PasswordCredentials($request->request->get('password', '')),
        [
            new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
        ]
    );
}

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        // For example:
        return new RedirectResponse($this->urlGenerator->generate('accueil'));
        // throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
