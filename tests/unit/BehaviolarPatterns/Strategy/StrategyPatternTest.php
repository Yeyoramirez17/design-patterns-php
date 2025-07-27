<?php
declare(strict_types=1);

use DesignPatterns\BehaviolarPatterns\Strategy\GoogleProvider;
use DesignPatterns\BehaviolarPatterns\Strategy\OauthProvider;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

final class StrategyPatternTest extends TestCase
{
    #[TestDox("You can authenticate by specifying different providers.")]
    public function testCanAutenticateWithGoogleProvider(): void
    {
        $google = new GoogleProvider([
            "api_key"       => "GOOGLE_API_KEY",
            "client_id"     => "GOOGLE_CLIENT_ID",
            "client_secret" => "GOOGLE_SECRET_CLIENT",
        ]);

        $provider = new OauthProvider($google);

        $this->assertFalse($provider->isAuthorized());

        $provider->getAuthorization();
        $this->assertTrue($provider->isAuthorized());

        $this->assertIsArray($provider->getUser());
        $this->assertArrayHasKey('access_token', $provider->getUser());
        $this->assertEquals("jhon@doe.com", $provider->getUser()["user"]["email"]);

    }
}