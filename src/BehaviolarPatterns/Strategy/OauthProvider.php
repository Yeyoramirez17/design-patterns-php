<?php
declare(strict_types=1);

namespace DesignPatterns\BehaviolarPatterns\Strategy;

use DesignPatterns\BehaviolarPatterns\Strategy\IOauthProvider;

readonly class OauthProvider
{
    /**
     * Provider for OAuth authentication.
     * 
     * @var IOauthProvider
     */
    private IOauthProvider $provider;

    public function __construct(IOauthProvider $provider) 
    {
        $this->provider = $provider;
    }

    /**
     * Performs the authentication process, according to the provided provider.
     * 
     * @return void
     */
    public function getAuthorization(): void 
    {
        $this->provider->authenticate();
    }

    public function getUser(): array
    {
        return $this->provider->getUserAuthenticated();
    }

    public function isAuthorized(): bool
    {
        return $this->provider->isAuthorized();
    }
}