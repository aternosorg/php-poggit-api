<?php

namespace Aternos\PoggitApi\Client;

use Aternos\PoggitApi\Model\CategoryId;
use Aternos\PoggitApi\Model\Release;
use Aternos\PoggitApi\Model\State;

class SearchOptions
{
    /**
     * Minimum state
     * @see State
     * @var State|null
     */
    protected ?State $minState = null;

    /**
     * Name
     *
     * @var string|null
     */
    protected ?string $name = null;

    /**
     * Version
     *
     * @var string|null
     */
    protected ?string $version = null;

    /**
     * Category ID
     * @see CategoryId
     * @var CategoryId|null
     */
    protected ?CategoryId $category = null;

    /**
     * Name of the owner
     *
     * @var string|null
     */
    protected ?string $owner = null;

    /**
     * Only show latest versions
     *
     * @var bool
     */
    protected bool $latestOnly = false;

    /**
     * Get the minimum state
     * @return State|null
     */
    public function getMinState(): ?State
    {
        return $this->minState;
    }

    /**
     * Set the minimum state
     * @param State|null $minState
     * @return $this
     */
    public function setMinState(?State $minState): SearchOptions
    {
        $this->minState = $minState;
        return $this;
    }

    /**
     * Get the plugin name
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the plugin name
     * @param string|null $name
     * @return $this
     */
    public function setName(?string $name): SearchOptions
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the version string
     * @return string|null
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * Set the version string
     * @param string|null $version
     * @return $this
     */
    public function setVersion(?string $version): SearchOptions
    {
        $this->version = $version;
        return $this;
    }

    /**
     * Get the category ID
     * @return CategoryId|null
     */
    public function getCategory(): ?CategoryId
    {
        return $this->category;
    }

    /**
     * Set the category ID
     * @param CategoryId|null $category
     * @return $this
     */
    public function setCategory(?CategoryId $category): SearchOptions
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get the owner name
     * @return string|null
     */
    public function getOwner(): ?string
    {
        return $this->owner;
    }

    /**
     * Set the owner name
     * @param string|null $owner
     * @return $this
     */
    public function setOwner(?string $owner): SearchOptions
    {
        $this->owner = $owner;
        return $this;
    }

    /**
     * Should only latest versions be shown
     * @return bool
     */
    public function isLatestOnly(): bool
    {
        return $this->latestOnly;
    }

    /**
     * Set whether only latest versions should be shown
     * @param bool $latestOnly
     * @return $this
     */
    public function setLatestOnly(bool $latestOnly): SearchOptions
    {
        $this->latestOnly = $latestOnly;
        return $this;
    }
}
