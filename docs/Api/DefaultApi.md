# Aternos\PoggitApi\DefaultApi

All URIs are relative to https://poggit.pmmp.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**apiRequest()**](DefaultApi.md#apiRequest) | **POST** /api | Make API requests |
| [**getMd5()**](DefaultApi.md#getMd5) | **GET** /r.md5/{resource} | Get MD5 hash |
| [**getPlugins()**](DefaultApi.md#getPlugins) | **GET** /plugins.json | Retrieve a plugin list |
| [**getPlugins_0()**](DefaultApi.md#getPlugins_0) | **GET** /plugins.min.json | Retrieve a plugin list |
| [**getPlugins_1()**](DefaultApi.md#getPlugins_1) | **GET** /plugins.list | Retrieve a plugin list |
| [**getPlugins_2()**](DefaultApi.md#getPlugins_2) | **GET** /releases.json | Retrieve a plugin list |
| [**getPlugins_3()**](DefaultApi.md#getPlugins_3) | **GET** /releases.min.json | Retrieve a plugin list |
| [**getPlugins_4()**](DefaultApi.md#getPlugins_4) | **GET** /releases.list | Retrieve a plugin list |
| [**getResource()**](DefaultApi.md#getResource) | **GET** /r/{resource} | Get resource |
| [**getSha1()**](DefaultApi.md#getSha1) | **GET** /r.sha1/{resource} | Get SHA1 hash |
| [**getVersion()**](DefaultApi.md#getVersion) | **GET** /get/{name}/{version} | Get a version |


## `apiRequest()`

```php
apiRequest($api_request_request): \Aternos\PoggitApi\Model\Project[]
```

Make API requests

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Aternos\PoggitApi\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_request_request = new \Aternos\PoggitApi\Model\ApiRequestRequest(); // \Aternos\PoggitApi\Model\ApiRequestRequest

try {
    $result = $apiInstance->apiRequest($api_request_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->apiRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **api_request_request** | [**\Aternos\PoggitApi\Model\ApiRequestRequest**](../Model/ApiRequestRequest.md)|  | [optional] |

### Return type

[**\Aternos\PoggitApi\Model\Project[]**](../Model/Project.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `text/html`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMd5()`

```php
getMd5($resource, $access_token, $authorization): string
```

Get MD5 hash

Get a MD5 hash of a resource

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Aternos\PoggitApi\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$resource = 'resource_example'; // string | Resource path
$access_token = 'access_token_example'; // string | Access token
$authorization = 'authorization_example'; // string | Authorization for access token

try {
    $result = $apiInstance->getMd5($resource, $access_token, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getMd5: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **resource** | **string**| Resource path | |
| **access_token** | **string**| Access token | [optional] |
| **authorization** | **string**| Authorization for access token | [optional] |

### Return type

**string**

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `text/plain`, `text/html`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPlugins()`

```php
getPlugins($id, $min_state, $name, $version, $category, $repo_owner, $latest_only, $fields): \Aternos\PoggitApi\Model\Project[]
```

Retrieve a plugin list

You may retrieve a list of voted/approved plugins using this endpoint (along with some aliases which are functionally identical)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Aternos\PoggitApi\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 56; // int | Release ID
$min_state = 56; // int | Min state
$name = 'name_example'; // string | Project name
$version = 'version_example'; // string | Project version
$category = 56; // int | 1 = General 2 = Admin Tools 3 = Informational 4 = Anti-Griefing Tools 5 = Chat-Related 6 = Teleportation 7 = Mechanics 8 = Economy 9 = Minigame 10 = Fun 11 = World Editing and Management 12 = World Generators 13 = Developer Tools 14 = Educational 15 = Miscellaneous 16 = API plugins 17 = Vanilla Mechanics
$repo_owner = 'repo_owner_example'; // string | Repository owner
$latest_only = off; // string | Only latest?
$fields = array('fields_example'); // string[] | List of fields to include in response

try {
    $result = $apiInstance->getPlugins($id, $min_state, $name, $version, $category, $repo_owner, $latest_only, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getPlugins: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Release ID | [optional] |
| **min_state** | **int**| Min state | [optional] |
| **name** | **string**| Project name | [optional] |
| **version** | **string**| Project version | [optional] |
| **category** | **int**| 1 &#x3D; General 2 &#x3D; Admin Tools 3 &#x3D; Informational 4 &#x3D; Anti-Griefing Tools 5 &#x3D; Chat-Related 6 &#x3D; Teleportation 7 &#x3D; Mechanics 8 &#x3D; Economy 9 &#x3D; Minigame 10 &#x3D; Fun 11 &#x3D; World Editing and Management 12 &#x3D; World Generators 13 &#x3D; Developer Tools 14 &#x3D; Educational 15 &#x3D; Miscellaneous 16 &#x3D; API plugins 17 &#x3D; Vanilla Mechanics | [optional] |
| **repo_owner** | **string**| Repository owner | [optional] |
| **latest_only** | **string**| Only latest? | [optional] |
| **fields** | [**string[]**](../Model/string.md)| List of fields to include in response | [optional] |

### Return type

[**\Aternos\PoggitApi\Model\Project[]**](../Model/Project.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `text/html`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPlugins_0()`

```php
getPlugins_0($id, $min_state, $name, $version, $category, $repo_owner, $latest_only, $fields): \Aternos\PoggitApi\Model\Project[]
```

Retrieve a plugin list

You may retrieve a list of voted/approved plugins using this endpoint (along with some aliases which are functionally identical)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Aternos\PoggitApi\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 56; // int | Release ID
$min_state = 56; // int | Min state
$name = 'name_example'; // string | Project name
$version = 'version_example'; // string | Project version
$category = 56; // int | 1 = General 2 = Admin Tools 3 = Informational 4 = Anti-Griefing Tools 5 = Chat-Related 6 = Teleportation 7 = Mechanics 8 = Economy 9 = Minigame 10 = Fun 11 = World Editing and Management 12 = World Generators 13 = Developer Tools 14 = Educational 15 = Miscellaneous 16 = API plugins 17 = Vanilla Mechanics
$repo_owner = 'repo_owner_example'; // string | Repository owner
$latest_only = off; // string | Only latest?
$fields = array('fields_example'); // string[] | List of fields to include in response

try {
    $result = $apiInstance->getPlugins_0($id, $min_state, $name, $version, $category, $repo_owner, $latest_only, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getPlugins_0: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Release ID | [optional] |
| **min_state** | **int**| Min state | [optional] |
| **name** | **string**| Project name | [optional] |
| **version** | **string**| Project version | [optional] |
| **category** | **int**| 1 &#x3D; General 2 &#x3D; Admin Tools 3 &#x3D; Informational 4 &#x3D; Anti-Griefing Tools 5 &#x3D; Chat-Related 6 &#x3D; Teleportation 7 &#x3D; Mechanics 8 &#x3D; Economy 9 &#x3D; Minigame 10 &#x3D; Fun 11 &#x3D; World Editing and Management 12 &#x3D; World Generators 13 &#x3D; Developer Tools 14 &#x3D; Educational 15 &#x3D; Miscellaneous 16 &#x3D; API plugins 17 &#x3D; Vanilla Mechanics | [optional] |
| **repo_owner** | **string**| Repository owner | [optional] |
| **latest_only** | **string**| Only latest? | [optional] |
| **fields** | [**string[]**](../Model/string.md)| List of fields to include in response | [optional] |

### Return type

[**\Aternos\PoggitApi\Model\Project[]**](../Model/Project.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `text/html`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPlugins_1()`

```php
getPlugins_1($id, $min_state, $name, $version, $category, $repo_owner, $latest_only, $fields): \Aternos\PoggitApi\Model\Project[]
```

Retrieve a plugin list

You may retrieve a list of voted/approved plugins using this endpoint (along with some aliases which are functionally identical)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Aternos\PoggitApi\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 56; // int | Release ID
$min_state = 56; // int | Min state
$name = 'name_example'; // string | Project name
$version = 'version_example'; // string | Project version
$category = 56; // int | 1 = General 2 = Admin Tools 3 = Informational 4 = Anti-Griefing Tools 5 = Chat-Related 6 = Teleportation 7 = Mechanics 8 = Economy 9 = Minigame 10 = Fun 11 = World Editing and Management 12 = World Generators 13 = Developer Tools 14 = Educational 15 = Miscellaneous 16 = API plugins 17 = Vanilla Mechanics
$repo_owner = 'repo_owner_example'; // string | Repository owner
$latest_only = off; // string | Only latest?
$fields = array('fields_example'); // string[] | List of fields to include in response

try {
    $result = $apiInstance->getPlugins_1($id, $min_state, $name, $version, $category, $repo_owner, $latest_only, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getPlugins_1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Release ID | [optional] |
| **min_state** | **int**| Min state | [optional] |
| **name** | **string**| Project name | [optional] |
| **version** | **string**| Project version | [optional] |
| **category** | **int**| 1 &#x3D; General 2 &#x3D; Admin Tools 3 &#x3D; Informational 4 &#x3D; Anti-Griefing Tools 5 &#x3D; Chat-Related 6 &#x3D; Teleportation 7 &#x3D; Mechanics 8 &#x3D; Economy 9 &#x3D; Minigame 10 &#x3D; Fun 11 &#x3D; World Editing and Management 12 &#x3D; World Generators 13 &#x3D; Developer Tools 14 &#x3D; Educational 15 &#x3D; Miscellaneous 16 &#x3D; API plugins 17 &#x3D; Vanilla Mechanics | [optional] |
| **repo_owner** | **string**| Repository owner | [optional] |
| **latest_only** | **string**| Only latest? | [optional] |
| **fields** | [**string[]**](../Model/string.md)| List of fields to include in response | [optional] |

### Return type

[**\Aternos\PoggitApi\Model\Project[]**](../Model/Project.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `text/html`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPlugins_2()`

```php
getPlugins_2($id, $min_state, $name, $version, $category, $repo_owner, $latest_only, $fields): \Aternos\PoggitApi\Model\Project[]
```

Retrieve a plugin list

You may retrieve a list of voted/approved plugins using this endpoint (along with some aliases which are functionally identical)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Aternos\PoggitApi\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 56; // int | Release ID
$min_state = 56; // int | Min state
$name = 'name_example'; // string | Project name
$version = 'version_example'; // string | Project version
$category = 56; // int | 1 = General 2 = Admin Tools 3 = Informational 4 = Anti-Griefing Tools 5 = Chat-Related 6 = Teleportation 7 = Mechanics 8 = Economy 9 = Minigame 10 = Fun 11 = World Editing and Management 12 = World Generators 13 = Developer Tools 14 = Educational 15 = Miscellaneous 16 = API plugins 17 = Vanilla Mechanics
$repo_owner = 'repo_owner_example'; // string | Repository owner
$latest_only = off; // string | Only latest?
$fields = array('fields_example'); // string[] | List of fields to include in response

try {
    $result = $apiInstance->getPlugins_2($id, $min_state, $name, $version, $category, $repo_owner, $latest_only, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getPlugins_2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Release ID | [optional] |
| **min_state** | **int**| Min state | [optional] |
| **name** | **string**| Project name | [optional] |
| **version** | **string**| Project version | [optional] |
| **category** | **int**| 1 &#x3D; General 2 &#x3D; Admin Tools 3 &#x3D; Informational 4 &#x3D; Anti-Griefing Tools 5 &#x3D; Chat-Related 6 &#x3D; Teleportation 7 &#x3D; Mechanics 8 &#x3D; Economy 9 &#x3D; Minigame 10 &#x3D; Fun 11 &#x3D; World Editing and Management 12 &#x3D; World Generators 13 &#x3D; Developer Tools 14 &#x3D; Educational 15 &#x3D; Miscellaneous 16 &#x3D; API plugins 17 &#x3D; Vanilla Mechanics | [optional] |
| **repo_owner** | **string**| Repository owner | [optional] |
| **latest_only** | **string**| Only latest? | [optional] |
| **fields** | [**string[]**](../Model/string.md)| List of fields to include in response | [optional] |

### Return type

[**\Aternos\PoggitApi\Model\Project[]**](../Model/Project.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `text/html`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPlugins_3()`

```php
getPlugins_3($id, $min_state, $name, $version, $category, $repo_owner, $latest_only, $fields): \Aternos\PoggitApi\Model\Project[]
```

Retrieve a plugin list

You may retrieve a list of voted/approved plugins using this endpoint (along with some aliases which are functionally identical)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Aternos\PoggitApi\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 56; // int | Release ID
$min_state = 56; // int | Min state
$name = 'name_example'; // string | Project name
$version = 'version_example'; // string | Project version
$category = 56; // int | 1 = General 2 = Admin Tools 3 = Informational 4 = Anti-Griefing Tools 5 = Chat-Related 6 = Teleportation 7 = Mechanics 8 = Economy 9 = Minigame 10 = Fun 11 = World Editing and Management 12 = World Generators 13 = Developer Tools 14 = Educational 15 = Miscellaneous 16 = API plugins 17 = Vanilla Mechanics
$repo_owner = 'repo_owner_example'; // string | Repository owner
$latest_only = off; // string | Only latest?
$fields = array('fields_example'); // string[] | List of fields to include in response

try {
    $result = $apiInstance->getPlugins_3($id, $min_state, $name, $version, $category, $repo_owner, $latest_only, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getPlugins_3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Release ID | [optional] |
| **min_state** | **int**| Min state | [optional] |
| **name** | **string**| Project name | [optional] |
| **version** | **string**| Project version | [optional] |
| **category** | **int**| 1 &#x3D; General 2 &#x3D; Admin Tools 3 &#x3D; Informational 4 &#x3D; Anti-Griefing Tools 5 &#x3D; Chat-Related 6 &#x3D; Teleportation 7 &#x3D; Mechanics 8 &#x3D; Economy 9 &#x3D; Minigame 10 &#x3D; Fun 11 &#x3D; World Editing and Management 12 &#x3D; World Generators 13 &#x3D; Developer Tools 14 &#x3D; Educational 15 &#x3D; Miscellaneous 16 &#x3D; API plugins 17 &#x3D; Vanilla Mechanics | [optional] |
| **repo_owner** | **string**| Repository owner | [optional] |
| **latest_only** | **string**| Only latest? | [optional] |
| **fields** | [**string[]**](../Model/string.md)| List of fields to include in response | [optional] |

### Return type

[**\Aternos\PoggitApi\Model\Project[]**](../Model/Project.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `text/html`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPlugins_4()`

```php
getPlugins_4($id, $min_state, $name, $version, $category, $repo_owner, $latest_only, $fields): \Aternos\PoggitApi\Model\Project[]
```

Retrieve a plugin list

You may retrieve a list of voted/approved plugins using this endpoint (along with some aliases which are functionally identical)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Aternos\PoggitApi\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 56; // int | Release ID
$min_state = 56; // int | Min state
$name = 'name_example'; // string | Project name
$version = 'version_example'; // string | Project version
$category = 56; // int | 1 = General 2 = Admin Tools 3 = Informational 4 = Anti-Griefing Tools 5 = Chat-Related 6 = Teleportation 7 = Mechanics 8 = Economy 9 = Minigame 10 = Fun 11 = World Editing and Management 12 = World Generators 13 = Developer Tools 14 = Educational 15 = Miscellaneous 16 = API plugins 17 = Vanilla Mechanics
$repo_owner = 'repo_owner_example'; // string | Repository owner
$latest_only = off; // string | Only latest?
$fields = array('fields_example'); // string[] | List of fields to include in response

try {
    $result = $apiInstance->getPlugins_4($id, $min_state, $name, $version, $category, $repo_owner, $latest_only, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getPlugins_4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Release ID | [optional] |
| **min_state** | **int**| Min state | [optional] |
| **name** | **string**| Project name | [optional] |
| **version** | **string**| Project version | [optional] |
| **category** | **int**| 1 &#x3D; General 2 &#x3D; Admin Tools 3 &#x3D; Informational 4 &#x3D; Anti-Griefing Tools 5 &#x3D; Chat-Related 6 &#x3D; Teleportation 7 &#x3D; Mechanics 8 &#x3D; Economy 9 &#x3D; Minigame 10 &#x3D; Fun 11 &#x3D; World Editing and Management 12 &#x3D; World Generators 13 &#x3D; Developer Tools 14 &#x3D; Educational 15 &#x3D; Miscellaneous 16 &#x3D; API plugins 17 &#x3D; Vanilla Mechanics | [optional] |
| **repo_owner** | **string**| Repository owner | [optional] |
| **latest_only** | **string**| Only latest? | [optional] |
| **fields** | [**string[]**](../Model/string.md)| List of fields to include in response | [optional] |

### Return type

[**\Aternos\PoggitApi\Model\Project[]**](../Model/Project.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `text/html`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getResource()`

```php
getResource($resource, $access_token, $authorization): \SplFileObject
```

Get resource

Get a resource

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Aternos\PoggitApi\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$resource = 'resource_example'; // string | Resource path
$access_token = 'access_token_example'; // string | Access token
$authorization = 'authorization_example'; // string | Authorization for access token

try {
    $result = $apiInstance->getResource($resource, $access_token, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getResource: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **resource** | **string**| Resource path | |
| **access_token** | **string**| Access token | [optional] |
| **authorization** | **string**| Authorization for access token | [optional] |

### Return type

**\SplFileObject**

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `text/plain`, `text/html`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSha1()`

```php
getSha1($resource, $access_token, $authorization): string
```

Get SHA1 hash

Get a SHA1 hash of a resource

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Aternos\PoggitApi\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$resource = 'resource_example'; // string | Resource path
$access_token = 'access_token_example'; // string | Access token
$authorization = 'authorization_example'; // string | Authorization for access token

try {
    $result = $apiInstance->getSha1($resource, $access_token, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getSha1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **resource** | **string**| Resource path | |
| **access_token** | **string**| Access token | [optional] |
| **authorization** | **string**| Authorization for access token | [optional] |

### Return type

**string**

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `text/plain`, `text/html`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getVersion()`

```php
getVersion($name, $version, $prerelease, $state, $api): \SplFileObject
```

Get a version

Get a version of a resource

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Aternos\PoggitApi\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = 'name_example'; // string | Resource name
$version = 'version_example'; // string | Resource version
$prerelease = off; // string | Get pre releases?
$state = new \Aternos\PoggitApi\Model\State(); // State | State
$api = 'api_example'; // string | API Version

try {
    $result = $apiInstance->getVersion($name, $version, $prerelease, $state, $api);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getVersion: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **name** | **string**| Resource name | |
| **version** | **string**| Resource version | |
| **prerelease** | **string**| Get pre releases? | [optional] |
| **state** | [**State**](../Model/.md)| State | [optional] |
| **api** | **string**| API Version | [optional] |

### Return type

**\SplFileObject**

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `text/plain`, `text/html`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
