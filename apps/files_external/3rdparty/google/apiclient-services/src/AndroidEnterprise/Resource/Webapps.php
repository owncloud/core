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

namespace Google\Service\AndroidEnterprise\Resource;

use Google\Service\AndroidEnterprise\WebApp;
use Google\Service\AndroidEnterprise\WebAppsListResponse;

/**
 * The "webapps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidenterpriseService = new Google\Service\AndroidEnterprise(...);
 *   $webapps = $androidenterpriseService->webapps;
 *  </code>
 */
class Webapps extends \Google\Service\Resource
{
  /**
   * Deletes an existing web app. (webapps.delete)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $webAppId The ID of the web app.
   * @param array $optParams Optional parameters.
   */
  public function delete($enterpriseId, $webAppId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'webAppId' => $webAppId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets an existing web app. (webapps.get)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $webAppId The ID of the web app.
   * @param array $optParams Optional parameters.
   * @return WebApp
   */
  public function get($enterpriseId, $webAppId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'webAppId' => $webAppId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], WebApp::class);
  }
  /**
   * Creates a new web app for the enterprise. (webapps.insert)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param WebApp $postBody
   * @param array $optParams Optional parameters.
   * @return WebApp
   */
  public function insert($enterpriseId, WebApp $postBody, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], WebApp::class);
  }
  /**
   * Retrieves the details of all web apps for a given enterprise.
   * (webapps.listWebapps)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param array $optParams Optional parameters.
   * @return WebAppsListResponse
   */
  public function listWebapps($enterpriseId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], WebAppsListResponse::class);
  }
  /**
   * Updates an existing web app. (webapps.update)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $webAppId The ID of the web app.
   * @param WebApp $postBody
   * @param array $optParams Optional parameters.
   * @return WebApp
   */
  public function update($enterpriseId, $webAppId, WebApp $postBody, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'webAppId' => $webAppId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], WebApp::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Webapps::class, 'Google_Service_AndroidEnterprise_Resource_Webapps');
