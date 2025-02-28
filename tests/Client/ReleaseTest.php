<?php

namespace Aternos\PoggitApi\Test\Client;

use Aternos\PoggitApi\Client\Release;
use Aternos\PoggitApi\Test\PoggitAPITestCase;

class ReleaseTest extends PoggitAPITestCase
{

    protected ?Release $release = null;

    public function setUp(): void
    {
        parent::setUp();

        // Sets $this->version to the latest version of the plugin "_NewAlias"
        $this->release = $this->client->getRelease(11849);
    }

    public function testGetNameReturnsCorrectName(): void
    {
        $this->assertEquals("_NewAlias", $this->release->getData()->getName());
    }
    public function testGetAllVersions(): void
    {
        $versions = $this->release->getAllVersions();
        $this->assertIsArray($versions);
        $this->assertNotEmpty($versions);
        $this->assertContainsOnlyInstancesOf(Release::class, $versions);
        foreach ($versions as $version) {
            $this->assertEquals("_NewAlias", $version->getData()->getName());
        }
    }

    public function testGetVersionReturnsCorrectVersion(): void
    {
        $version = $this->release->getVersion("1.5.1");
        $this->assertNotNull($version);
        $this->assertEquals("1.5.1", $version->getData()->getVersion());
    }

    public function testGetVersionReturnsNullWhenUnknown(): void
    {
        $version = $this->release->getVersion("999.999.999");
        $this->assertNull($version);
    }

    public function testGetLatestVersionReturnsCorrectVersion(): void
    {
        $version = $this->release->getLatestVersion();
        $this->assertIsString($version->getData()->getVersion());
    }

    public function testTotalDownloadCount(): void
    {
        $versions = $this->release->getAllVersions();

        $totalDownloadCount = 0;
        foreach ($versions as $version) {
            $totalDownloadCount += $version->getData()->getDownloads() ?? 0;
        }

        $this->assertEquals($totalDownloadCount, $this->release->getTotalPluginDownloadCount());
    }

    public function testGetResourceIdReturnsCorrectId(): void
    {
        // 214555 is the resource id of version 1.5.1 of the plugin "_NewAlias"
        // taken from the artifact_url (https://poggit.pmmp.io/r/214555)
        $this->assertEquals(214555, $this->release->getResourceId());
    }

    public function testGetFileReturnsSplFileObject(): void
    {
        $this->assertInstanceOf(\SplFileObject::class, $this->release->getFile());
    }

    public function testGetMd5HashReturnsCorrectHash(): void
    {
        $this->assertEquals("bf0191ae45bb52700961d214bbf1d6ab", $this->release->getMD5Hash());
    }

    public function testGetSha1HashReturnsCorrectHash(): void
    {
        $this->assertEquals("50e1d18433df6ba676e04e4fbedce8c2dceec3b4", $this->release->getSHA1Hash());
    }

}
