<?php

namespace Aternos\PoggitApi\Test\Client;

use Aternos\PoggitApi\ApiException;
use Aternos\PoggitApi\Client\Plugin;
use Aternos\PoggitApi\Client\Release;
use Aternos\PoggitApi\Client\SearchOptions;
use Aternos\PoggitApi\Model\ApiVersion;
use Aternos\PoggitApi\Model\CategoryId;
use Aternos\PoggitApi\Model\State;
use Aternos\PoggitApi\Test\PoggitAPITestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class PoggitAPIClientTest extends PoggitAPITestCase
{

    public function testGetReleasesWithoutSearchOptions(): void
    {
        $releases = $this->client->getReleases();
        $this->assertIsArray($releases);
        $this->assertNotEmpty($releases);
    }

    public function testGetReleasesWithSearchOptions(): void
    {
        $searchOptions = (new SearchOptions())
            ->setCategory(CategoryId::DEVELOPER_TOOLS)
            ->setMinState(State::APPROVED);

        $releases = $this->client->getReleases($searchOptions);
        $this->assertIsArray($releases);
        $this->assertNotEmpty($releases);
    }

    public function testGetReleasesReturnsSameReleaseMultipleTimes(): void
    {
        $pluginName = "_NewAlias";

        $searchOptions = (new SearchOptions())->setName($pluginName);
        $releases = $this->client->getReleases($searchOptions);
        $this->assertIsArray($releases);
        $this->assertNotEmpty($releases);
        $this->assertGreaterThan(1, count($releases));

        foreach ($releases as $release) {
            $this->assertEquals($pluginName, $release->getData()->getName());
        }
    }

    public function testGetReleasesByOwner(): void
    {
        $owner = "JavierLeon9966";

        $searchOptions = (new SearchOptions())->setOwner($owner);
        $releases = $this->client->getReleases($searchOptions);
        $this->assertIsArray($releases);
        $this->assertNotEmpty($releases);
        $this->assertGreaterThan(1, count($releases));

        foreach ($releases as $release) {
            $this->assertStringStartsWith($owner . "/", $release->getData()->getRepoName());
        }
    }

    public function testGetReleaseReturnsRelease(): void
    {
        // 11849 is the release id of version 1.5.1 of the plugin "_NewAlias"
        $release = $this->client->getRelease(11849);
        $this->assertInstanceOf(Release::class, $release);
        $this->assertEquals("_NewAlias", $release->getData()->getName());
    }

    public function testGetReleaseReturnsNullWhenUnknown(): void
    {
        $release = $this->client->getRelease(999999999);
        $this->assertNull($release);
    }
    public function testGetLatestReleaseByPluginName(): void
    {
        $release = $this->client->getLatestReleaseByPluginName("_NewAlias");
        $this->assertNotNull($release);
        $this->assertEquals("_NewAlias", $release->getData()->getName());
    }

    public function testGetLatestReleaseByPluginNameNull(): void
    {
        $release = $this->client->getLatestReleaseByPluginName("UnknownPluginName");
        $this->assertNull($release);
    }

    public function testGetReleaseVersionFileReturnsSplFileObject(): void
    {
        $file = $this->client->downloadVersion("_NewAlias", "1.5.1");
        $this->assertNotNull($file);
        $this->assertInstanceOf(\SplFileObject::class, $file);
    }

    public function testGetReleaseFileThrowsExceptionWhenUnknown(): void
    {
        $this->expectException(ApiException::class);
        $this->client->downloadVersion("UnknownPluginName", "1.0.0");
    }

    public function testGetMd5HashReturnsCorrectHash(): void
    {
        // 214555 is the resource id of version 1.5.1 of the plugin "_NewAlias"
        // taken from the artifact_url (https://poggit.pmmp.io/r/214555)
        $md5Hash = $this->client->getMD5Hash(214555);
        $this->assertEquals("bf0191ae45bb52700961d214bbf1d6ab", $md5Hash);
    }

    public function testGetMd5HashThrowsExceptionWhenUnknown(): void
    {
        $this->expectException(ApiException::class);
        $this->client->getMD5Hash(999999999);
    }

    public function testGetSha1HashReturnsCorrectHash(): void
    {
        // 214555 is the resource id of version 1.5.1 of the plugin "_NewAlias"
        // taken from the artifact_url (https://poggit.pmmp.io/r/214555)
        $md5Hash = $this->client->getSHA1Hash(214555);
        $this->assertEquals("50e1d18433df6ba676e04e4fbedce8c2dceec3b4", $md5Hash);
    }

    public function testGetSha1HashThrowsExceptionWhenUnknown(): void
    {
        $this->expectException(ApiException::class);
        $this->client->getSHA1Hash(999999999);
    }

    public function testSetApiClient(): void
    {
        $mockHandler = new MockHandler();
        $handlerStack = new HandlerStack($mockHandler);
        $httpClient = new Client(['handler' => $handlerStack]);

        $this->client->setHttpClient($httpClient);

        $mockHandler->append(new Response(200, [], "[]"));
        $releases = $this->client->getReleases();
        $this->assertIsArray($releases);
        $this->assertEmpty($releases);
    }

    public function testGetApiVersions(): void
    {
        $apiVersions = $this->client->getApiVersions();
        $this->assertNotNull($apiVersions);
        $this->assertIsArray($apiVersions->getVersions());
        $this->assertNotEmpty($apiVersions->getVersions());
        foreach ($apiVersions->getVersions() as $version => $data) {
            $this->assertIsString($version);
            $this->assertInstanceOf(ApiVersion::class, $data);
            $this->assertNotNull($data->getId());
            $this->assertNotNull($data->getSupported());
        }
    }
}
