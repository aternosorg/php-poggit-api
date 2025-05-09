<?php
/**
 * State
 *
 * PHP version 8.1
 *
 * @package  Aternos\PoggitApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Poggit API
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: 1.0
 * @generated Generated by: https://openapi-generator.tech
 * Generator version: 7.12.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Aternos\PoggitApi\Model;

/**
 * State Class Doc Comment
 *
 * @description 0 &#x3D; DRAFT 1 &#x3D; REJECTED 2 &#x3D; SUBMITTED 3 &#x3D; CHECKED 4 &#x3D; VOTED 5 &#x3D; APPROVED 6 &#x3D; FEATURED
 * @package  Aternos\PoggitApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
enum State: int
{
    case DRAFT = 0;

    case REJECTED = 1;

    case SUBMITTED = 2;

    case CHECKED = 3;

    case APPROVED = 5;

    case FEATURED = 6;
}


