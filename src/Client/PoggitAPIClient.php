<?php

namespace Aternos\PoggitApi\Client;

use Aternos\PoggitApi\Api\DefaultApi;
use Aternos\PoggitApi\ApiException;
use Aternos\PoggitApi\Configuration;
use Aternos\PoggitApi\Model\ApiVersionsOverview;
use Aternos\PoggitApi\Model\Release as ReleaseModel;
use GuzzleHttp\ClientInterface;
use SplFileObject;

/**
 * Class PoggitApiClient
 *
 * @package Aternos\PoggitApi\Client
 * @description This class is the main entry point for the Poggit API. It provides methods to access all Poggit API endpoints.
 */
class PoggitAPIClient
{

    protected Configuration $configuration;
    protected ?ClientInterface $httpClient;
    protected DefaultApi $api;

    public function __construct(
        ?Configuration   $configuration = null,
        ?ClientInterface $httpClient = null,
        ?string          $userAgent = null,
    )
    {
        $this->httpClient = $httpClient;
        $this->setConfiguration($configuration ?? (new Configuration())
            ->setUserAgent($userAgent ?? "php-poggit-api/1.0.0"));
    }

    /**
     * Set the configuration used for all HTTP requests
     *
     * @param Configuration $configuration
     * @return $this
     */
    public function setConfiguration(Configuration $configuration): static
    {
        $this->configuration = $configuration;
        $this->api = new DefaultApi($this->httpClient, $this->configuration);
        return $this;
    }

    /**
     * Set the user agent used for all HTTP requests
     *
     * @param string $userAgent
     * @return $this
     */
    public function setUserAgent(string $userAgent): static
    {
        $this->configuration->setUserAgent($userAgent);
        return $this->setConfiguration($this->configuration);
    }

    /**
     * Set the HTTP client used for all requests.
     * When null, the default {@link \GuzzleHttp\Client} will be used.
     *
     * @param ClientInterface|null $httpClient
     * @return $this
     */
    public function setHttpClient(?ClientInterface $httpClient): static
    {
        $this->httpClient = $httpClient;
        return $this->setConfiguration($this->configuration);
    }

    /**
     * Returns all releases that match the given {@link SearchOptions}.
     * Attention: This returns an array of {@link Release}s. One plugin can have multiple releases and is only unique by its name or project id.
     *
     * @param SearchOptions $options
     * @return Release[]
     * @throws ApiException
     */
    public function getReleases(SearchOptions $options = new SearchOptions()): array
    {
        $releases = $this->api->getReleases(
            null,
            $options->getMinState(),
            $options->getName(),
            $options->getVersion(),
            $options->getCategory(),
            $options->getOwner(),
            $options->isLatestOnly() ? "true" : "off"
        );
        return array_map(fn(ReleaseModel $release) => new Release($this, $release), $releases);
    }

    /**
     * Get a single release by its release id
     *
     * @param int $releaseId
     * @return Release|null Returns the release or null if not found
     * @throws ApiException
     */
    public function getRelease(int $releaseId): ?Release
    {
        $results = $this->api->getReleases($releaseId);

        if (count($results) === 0) {
            return null;
        }

        return new Release($this, $results[0]);
    }

    /**
     * Get the latest release of a plugin by the plugin name
     *
     * @param string $name name of the plugin
     * @return Release|null Returns the release or null if not found
     * @throws ApiException
     */
    public function getLatestReleaseByPluginName(string $name): ?Release
    {
        $searchOptions = (new SearchOptions())
            ->setName($name)
            ->setLatestOnly(true);

        $results = $this->getReleases($searchOptions);
        return $results[0] ?? null;
    }

    /**
     * Downloads the release file for the given name and version of a plugin.
     *
     * @param string $name Plugin name
     * @param string $version Plugin version
     * @return SplFileObject
     * @throws ApiException
     */
    public function downloadVersion(string $name, string $version): SplFileObject
    {
        return $this->api->getVersion($name, $version);
    }

    /**
     * Get the MD5 hash of the resource with the given resource ID
     *
     * @param int $resourceId
     * @return string
     * @throws ApiException
     */
    public function getMD5Hash(int $resourceId): string
    {
        return $this->api->getMd5($resourceId);
    }

    /**
     * Get the SHA1 hash of the resource with the given resource ID
     *
     * @param int $resourceId
     * @return string
     * @throws ApiException
     */
    public function getSHA1Hash(int $resourceId): string
    {
        return $this->api->getSha1($resourceId);
    }

    /**
     * Get an overview of all API versions
     * @return ApiVersionsOverview
     */
    public function getApiVersions(): ApiVersionsOverview
    {
        return $this->api->getApiVersionsFull();
    }
}
