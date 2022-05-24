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

namespace Google\Service\Analytics\Resource;

use Google\Service\Analytics\Webproperties;
use Google\Service\Analytics\Webproperty;

/**
 * The "webproperties" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google\Service\Analytics(...);
 *   $webproperties = $analyticsService->webproperties;
 *  </code>
 */
class ManagementWebproperties extends \Google\Service\Resource
{
  /**
   * Gets a web property to which the user has access. (webproperties.get)
   *
   * @param string $accountId Account ID to retrieve the web property for.
   * @param string $webPropertyId ID to retrieve the web property for.
   * @param array $optParams Optional parameters.
   * @return Webproperty
   */
  public function get($accountId, $webPropertyId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Webproperty::class);
  }
  /**
   * Create a new property if the account has fewer than 20 properties. Web
   * properties are visible in the Google Analytics interface only if they have at
   * least one profile. (webproperties.insert)
   *
   * @param string $accountId Account ID to create the web property for.
   * @param Webproperty $postBody
   * @param array $optParams Optional parameters.
   * @return Webproperty
   */
  public function insert($accountId, Webproperty $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Webproperty::class);
  }
  /**
   * Lists web properties to which the user has access.
   * (webproperties.listManagementWebproperties)
   *
   * @param string $accountId Account ID to retrieve web properties for. Can
   * either be a specific account ID or '~all', which refers to all the accounts
   * that user has access to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max-results The maximum number of web properties to include in
   * this response.
   * @opt_param int start-index An index of the first entity to retrieve. Use this
   * parameter as a pagination mechanism along with the max-results parameter.
   * @return Webproperties
   */
  public function listManagementWebproperties($accountId, $optParams = [])
  {
    $params = ['accountId' => $accountId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], Webproperties::class);
  }
  /**
   * Updates an existing web property. This method supports patch semantics.
   * (webproperties.patch)
   *
   * @param string $accountId Account ID to which the web property belongs
   * @param string $webPropertyId Web property ID
   * @param Webproperty $postBody
   * @param array $optParams Optional parameters.
   * @return Webproperty
   */
  public function patch($accountId, $webPropertyId, Webproperty $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Webproperty::class);
  }
  /**
   * Updates an existing web property. (webproperties.update)
   *
   * @param string $accountId Account ID to which the web property belongs
   * @param string $webPropertyId Web property ID
   * @param Webproperty $postBody
   * @param array $optParams Optional parameters.
   * @return Webproperty
   */
  public function update($accountId, $webPropertyId, Webproperty $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Webproperty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagementWebproperties::class, 'Google_Service_Analytics_Resource_ManagementWebproperties');
