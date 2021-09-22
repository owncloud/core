<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Apigee\Resource;

use Google\Service\Apigee\GoogleCloudApigeeV1Attributes;
use Google\Service\Apigee\GoogleCloudApigeeV1Developer;
use Google\Service\Apigee\GoogleCloudApigeeV1DeveloperBalance;
use Google\Service\Apigee\GoogleCloudApigeeV1DeveloperMonetizationConfig;
use Google\Service\Apigee\GoogleCloudApigeeV1ListOfDevelopersResponse;
use Google\Service\Apigee\GoogleProtobufEmpty;

/**
 * The "developers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $developers = $apigeeService->developers;
 *  </code>
 */
class OrganizationsDevelopers extends \Google\Service\Resource
{
  /**
   * Updates developer attributes. This API replaces the existing attributes with
   * those specified in the request. Add new attributes, and include or exclude
   * any existing attributes that you want to retain or remove, respectively. The
   * custom attribute limit is 18. **Note**: OAuth access tokens and Key
   * Management Service (KMS) entities (apps, developers, and API products) are
   * cached for 180 seconds (default). Any custom attributes associated with these
   * entities are cached for at least 180 seconds after the entity is accessed at
   * runtime. Therefore, an `ExpiresIn` element on the OAuthV2 policy won't be
   * able to expire an access token in less than 180 seconds.
   * (developers.attributes)
   *
   * @param string $parent Required. Email address of the developer for which
   * attributes are being updated. Use the following structure in your request:
   * `organizations/{org}/developers/{developer_email}`
   * @param GoogleCloudApigeeV1Attributes $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Attributes
   */
  public function attributes($parent, GoogleCloudApigeeV1Attributes $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('attributes', [$params], GoogleCloudApigeeV1Attributes::class);
  }
  /**
   * Creates a developer. Once created, the developer can register an app and
   * obtain an API key. At creation time, a developer is set as `active`. To
   * change the developer status, use the SetDeveloperStatus API.
   * (developers.create)
   *
   * @param string $parent Required. Name of the Apigee organization in which the
   * developer is created. Use the following structure in your request:
   * `organizations/{org}`.
   * @param GoogleCloudApigeeV1Developer $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Developer
   */
  public function create($parent, GoogleCloudApigeeV1Developer $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudApigeeV1Developer::class);
  }
  /**
   * Deletes a developer. All apps and API keys associated with the developer are
   * also removed. **Warning**: This API will permanently delete the developer and
   * related artifacts. To avoid permanently deleting developers and their
   * artifacts, set the developer status to `inactive` using the
   * SetDeveloperStatus API. **Note**: The delete operation is asynchronous. The
   * developer app is deleted immediately, but its associated resources, such as
   * apps and API keys, may take anywhere from a few seconds to a few minutes to
   * be deleted. (developers.delete)
   *
   * @param string $name Required. Email address of the developer. Use the
   * following structure in your request:
   * `organizations/{org}/developers/{developer_email}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Developer
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleCloudApigeeV1Developer::class);
  }
  /**
   * Returns the developer details, including the developer's name, email address,
   * apps, and other information. **Note**: The response includes only the first
   * 100 developer apps. (developers.get)
   *
   * @param string $name Required. Email address of the developer. Use the
   * following structure in your request:
   * `organizations/{org}/developers/{developer_email}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string action Status of the developer. Valid values are `active`
   * or `inactive`.
   * @return GoogleCloudApigeeV1Developer
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudApigeeV1Developer::class);
  }
  /**
   * Gets the account balance for the developer. (developers.getBalance)
   *
   * @param string $name Required. Account balance for the developer. Use the
   * following structure in your request:
   * `organizations/{org}/developers/{developer}/balance`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1DeveloperBalance
   */
  public function getBalance($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getBalance', [$params], GoogleCloudApigeeV1DeveloperBalance::class);
  }
  /**
   * Gets the monetization configuration for the developer.
   * (developers.getMonetizationConfig)
   *
   * @param string $name Required. Monetization configuration for the developer.
   * Use the following structure in your request:
   * `organizations/{org}/developers/{developer}/monetizationConfig`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1DeveloperMonetizationConfig
   */
  public function getMonetizationConfig($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getMonetizationConfig', [$params], GoogleCloudApigeeV1DeveloperMonetizationConfig::class);
  }
  /**
   * Lists all developers in an organization by email address. By default, the
   * response does not include company developers. Set the `includeCompany` query
   * parameter to `true` to include company developers. **Note**: A maximum of
   * 1000 developers are returned in the response. You paginate the list of
   * developers returned using the `startKey` and `count` query parameters.
   * (developers.listOrganizationsDevelopers)
   *
   * @param string $parent Required. Name of the Apigee organization. Use the
   * following structure in your request: `organizations/{org}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string app Optional. List only Developers that are associated with
   * the app. Note that start_key, count are not applicable for this filter
   * criteria.
   * @opt_param string count Optional. Number of developers to return in the API
   * call. Use with the `startKey` parameter to provide more targeted filtering.
   * The limit is 1000.
   * @opt_param bool expand Specifies whether to expand the results. Set to `true`
   * to expand the results. This query parameter is not valid if you use the
   * `count` or `startKey` query parameters.
   * @opt_param string ids Optional. List of IDs to include, separated by commas.
   * @opt_param bool includeCompany Flag that specifies whether to include company
   * details in the response.
   * @opt_param string startKey **Note**: Must be used in conjunction with the
   * `count` parameter. Email address of the developer from which to start
   * displaying the list of developers. For example, if the an unfiltered list
   * returns: ``` westley@example.com fezzik@example.com buttercup@example.com ```
   * and your `startKey` is `fezzik@example.com`, the list returned will be ```
   * fezzik@example.com buttercup@example.com ```
   * @return GoogleCloudApigeeV1ListOfDevelopersResponse
   */
  public function listOrganizationsDevelopers($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudApigeeV1ListOfDevelopersResponse::class);
  }
  /**
   * Sets the status of a developer. A developer is `active` by default. If you
   * set a developer's status to `inactive`, the API keys assigned to the
   * developer apps are no longer valid even though the API keys are set to
   * `approved`. Inactive developers can still sign in to the developer portal and
   * create apps; however, any new API keys generated during app creation won't
   * work. To set the status of a developer, set the `action` query parameter to
   * `active` or `inactive`, and the `Content-Type` header to `application/octet-
   * stream`. If successful, the API call returns the following HTTP status code:
   * `204 No Content` (developers.setDeveloperStatus)
   *
   * @param string $name Required. Name of the developer. Use the following
   * structure in your request: `organizations/{org}/developers/{developer_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string action Status of the developer. Valid values are `active`
   * and `inactive`.
   * @return GoogleProtobufEmpty
   */
  public function setDeveloperStatus($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('setDeveloperStatus', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Updates a developer. This API replaces the existing developer details with
   * those specified in the request. Include or exclude any existing details that
   * you want to retain or delete, respectively. The custom attribute limit is 18.
   * **Note**: OAuth access tokens and Key Management Service (KMS) entities
   * (apps, developers, and API products) are cached for 180 seconds (current
   * default). Any custom attributes associated with these entities are cached for
   * at least 180 seconds after the entity is accessed at runtime. Therefore, an
   * `ExpiresIn` element on the OAuthV2 policy won't be able to expire an access
   * token in less than 180 seconds. (developers.update)
   *
   * @param string $name Required. Email address of the developer. Use the
   * following structure in your request:
   * `organizations/{org}/developers/{developer_email}`
   * @param GoogleCloudApigeeV1Developer $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Developer
   */
  public function update($name, GoogleCloudApigeeV1Developer $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], GoogleCloudApigeeV1Developer::class);
  }
  /**
   * Updates the monetization configuration for the developer.
   * (developers.updateMonetizationConfig)
   *
   * @param string $name Required. Monetization configuration for the developer.
   * Use the following structure in your request:
   * `organizations/{org}/developers/{developer}/monetizationConfig`
   * @param GoogleCloudApigeeV1DeveloperMonetizationConfig $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1DeveloperMonetizationConfig
   */
  public function updateMonetizationConfig($name, GoogleCloudApigeeV1DeveloperMonetizationConfig $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateMonetizationConfig', [$params], GoogleCloudApigeeV1DeveloperMonetizationConfig::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsDevelopers::class, 'Google_Service_Apigee_Resource_OrganizationsDevelopers');
