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

namespace Google\Service\AndroidManagement\Resource;

use Google\Service\AndroidManagement\AndroidmanagementEmpty;
use Google\Service\AndroidManagement\ListWebAppsResponse;
use Google\Service\AndroidManagement\WebApp;

/**
 * The "webApps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidmanagementService = new Google\Service\AndroidManagement(...);
 *   $webApps = $androidmanagementService->webApps;
 *  </code>
 */
class EnterprisesWebApps extends \Google\Service\Resource
{
  /**
   * Creates a web app. (webApps.create)
   *
   * @param string $parent The name of the enterprise in the form
   * enterprises/{enterpriseId}.
   * @param WebApp $postBody
   * @param array $optParams Optional parameters.
   * @return WebApp
   */
  public function create($parent, WebApp $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], WebApp::class);
  }
  /**
   * Deletes a web app. (webApps.delete)
   *
   * @param string $name The name of the web app in the form
   * enterprises/{enterpriseId}/webApps/{packageName}.
   * @param array $optParams Optional parameters.
   * @return AndroidmanagementEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], AndroidmanagementEmpty::class);
  }
  /**
   * Gets a web app. (webApps.get)
   *
   * @param string $name The name of the web app in the form
   * enterprises/{enterpriseId}/webApp/{packageName}.
   * @param array $optParams Optional parameters.
   * @return WebApp
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], WebApp::class);
  }
  /**
   * Lists web apps for a given enterprise. (webApps.listEnterprisesWebApps)
   *
   * @param string $parent The name of the enterprise in the form
   * enterprises/{enterpriseId}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The requested page size. The actual page size may be
   * fixed to a min or max value.
   * @opt_param string pageToken A token identifying a page of results returned by
   * the server.
   * @return ListWebAppsResponse
   */
  public function listEnterprisesWebApps($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListWebAppsResponse::class);
  }
  /**
   * Updates a web app. (webApps.patch)
   *
   * @param string $name The name of the web app in the form
   * enterprises/{enterpriseId}/webApps/{packageName}.
   * @param WebApp $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The field mask indicating the fields to update.
   * If not set, all modifiable fields will be modified.
   * @return WebApp
   */
  public function patch($name, WebApp $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], WebApp::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterprisesWebApps::class, 'Google_Service_AndroidManagement_Resource_EnterprisesWebApps');
