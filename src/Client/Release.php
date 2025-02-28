<?php

namespace Aternos\PoggitApi\Client;

use Aternos\PoggitApi\ApiException;
use Aternos\PoggitApi\Model\Release as ReleaseModel;
use SplFileObject;

/**
 * This class wraps what the poggit API refers to as a "release" to provide useful API methods.
 * It contains general information about the plugin as well as version specific details.
 *
 * To access the underlying {@link ReleaseModel} object, use {@link getData()}.
 */
class Release
{
    public function __construct(
        protected PoggitApiClient $client,
        protected ReleaseModel $release
    )
    {
    }

    public function getData(): ReleaseModel
    {
        return $this->release;
    }

    /**
     * Returns all versions of this plugin when there are no additional {@see SearchOptions} provided.
     * When {@see SearchOptions} are provided, the results will be filtered accordingly.
     *
     * @param SearchOptions $searchOptions Optional search options
     * @return Release[]
     * @throws ApiException
     */
    public function getAllVersions(SearchOptions $searchOptions = new SearchOptions()): array
    {
        return $this->client->getReleases($searchOptions->setName($this->getData()->getName()));
    }

    /**
     * Get a single version of this plugin by its name.
     *
     * @param string $versionName
     * @return Release|null The version of the plugin or null if not found
     * @throws ApiException
     */
    public function getVersion(string $versionName): ?Release
    {
        $searchOptions = (new SearchOptions())
            ->setName($this->getData()->getName())
            ->setVersion($versionName);

        $releases = $this->client->getReleases($searchOptions);
        return $releases[0] ?? null;
    }

    /**
     * Get the latest version of this plugin.
     *
     * @return Release|null The latest version of the plugin or null if the plugin does not have any versions
     * @throws ApiException
     */
    public function getLatestVersion(): ?Release
    {
        return $this->client->getLatestReleaseByPluginName($this->getData()->getName());
    }

    /**
     * Determines the total number of downloads of all versions of this plugin.
     *
     * @return int
     * @throws ApiException
     */
    public function getTotalPluginDownloadCount(): int
    {
        $versions = $this->getAllVersions();

        $totalDownloadCount = 0;
        foreach ($versions as $version) {
            $totalDownloadCount += $version->getData()->getDownloads() ?? 0;
        }

        return $totalDownloadCount;
    }

    /**
     * Returns the resource ID of this plugin version, extracted from the artifact url.
     *
     * @return int
     */
    public function getResourceId(): int
    {
        // e.g. https://poggit.pmmp.io/r/209545
        $artifactUrl = $this->getData()->getArtifactUrl();
        // -> 209545
        $resourceId = substr($artifactUrl, strrpos($artifactUrl, '/') + 1);
        return intval($resourceId);
    }

    /**
     * Returns the MD5 hash for the file of this plugin version.
     *
     * @return string
     * @throws ApiException
     */
    public function getMD5Hash(): string
    {
        return $this->client->getMD5Hash($this->getResourceId());
    }

    /**
     * Returns the SHA1 hash for the file of this plugin version.
     *
     * @return string
     * @throws ApiException
     */
    public function getSHA1Hash(): string
    {
        return $this->client->getSHA1Hash($this->getResourceId());
    }

}
