# Aternos/php-poggit-client
An API client for the Poggit API written in PHP. This client is a combination of
code generated by OpenAPI Generator and some wrappers around it to improve the
usability.

The generated code can be found in `src/Api` and `src/Model`. It is recommended
to use the Wrappers in `src/Client` instead of the generated code.

## Installation
Install the package via composer:
```bash
composer require aternos/poggit-api
```

## Usage

The main entry point for the API is the `PoggitAPIClient` class.
```php
<?php
use Aternos\PoggitApi\Client\PoggitAPIClient;

// create an API client. This is the main entry point for the API
$poggitClient = new PoggitAPIClient();

// set a user agent (recommended)
$poggitClient->setUserAgent('aternos/php-poggit-api-example');
```

## Releases
The Poggit API does not seperate projects and versions. It only provides `Release`
objects which contain data about a project and a specific version. You can get a
list of releases for a project with the `getReleases()` method.
```php
$releases = $poggitClient->getReleases("poggit/project");

foreach ($releases as $release) {
    echo $release->getData()->getName() . PHP_EOL;
}
```

Pagination is not supported by the Poggit API. The `getReleases()` method will return
a list of all releases of all plugins by default.

### Searching for Releases with options
You can filter the releases using search options:
```php
use \Aternos\PoggitApi\Client\SearchOptions;
use \Aternos\PoggitApi\Model\State;
use \Aternos\PoggitApi\Model\CategoryId;

$searchOptions = new SearchOptions();

// Only get approved releases
$searchOptions->setMinStability(State::APPROVED);

// Only show versions of a specific project by name
$searchOptions->setName("AdminTrollV2");

// Only get a specific version of a project
$searchOptions->setName("AdminTrollV2")
              ->setVersion("1.2.1");

// Get releases in a certain category
$searchOptions->setCategory(CategoryId::ADMIN_TOOLS);

// Only show releases by a specific author
$searchOptions->setOwner("JavierLeon9966");

// Only get the latest version of every project
$searchOptions->setLatestOnly(true);

$releases = $poggitClient->getReleases($searchOptions);
```

### Get a specific release by ID

You can get a specific release by its ID:
```php
$release = $poggitClient->getRelease(1234);
```

### Get the latest release of a plugin by name
You can get the latest release of a plugin by its name:
```php
$release = $poggitClient->getLatestReleaseByPluginName("AdminTrollV2");
```

### Download a release
You can download a release by the project name and version:
```php
$release = $poggitClient->downloadVersion("AdminTrollV2", "1.2.1");
```

> [!NOTE]
> This method downloads the release to a new file in the current working directory.
> There is no option to specify a download location. Using the artifact URL from a release
> and downloading it with a HTTP client is recommended for more control over the download process.

### Get hashes of a release
You can get the hashes of a release by the project name and version:
```php
$release = $poggitClient->getLatestReleaseByPluginName("AdminTrollV2");

$md5 = $release->getMD5Hash();
$sha1 = $release->getSHA1Hash();
```

## Updating the generated code
The generated code can be updated by installing the [openapi generator](https://openapi-generator.tech/docs/installation) and running the following command:
```bash
openapi-generator-cli generate -c config.yaml
```
