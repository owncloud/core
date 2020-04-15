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

/**
 * The "webapps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidenterpriseService = new Google_Service_AndroidEnterprise(...);
 *   $webapps = $androidenterpriseService->webapps;
 *  </code>
 */
class Google_Service_AndroidEnterprise_Resource_Webapps extends Google_Service_Resource
{
  /**
   * Deletes an existing web app. (webapps.delete)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $webAppId The ID of the web app.
   * @param array $optParams Optional parameters.
   */
  public function delete($enterpriseId, $webAppId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'webAppId' => $webAppId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets an existing web app. (webapps.get)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $webAppId The ID of the web app.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_WebApp
   */
  public function get($enterpriseId, $webAppId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'webAppId' => $webAppId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidEnterprise_WebApp");
  }
  /**
   * Creates a new web app for the enterprise. (webapps.insert)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param Google_Service_AndroidEnterprise_WebApp $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_WebApp
   */
  public function insert($enterpriseId, Google_Service_AndroidEnterprise_WebApp $postBody, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_AndroidEnterprise_WebApp");
  }
  /**
   * Retrieves the details of all web apps for a given enterprise.
   * (webapps.listWebapps)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_WebAppsListResponse
   */
  public function listWebapps($enterpriseId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidEnterprise_WebAppsListResponse");
  }
  /**
   * Updates an existing web app. (webapps.update)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $webAppId The ID of the web app.
   * @param Google_Service_AndroidEnterprise_WebApp $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_WebApp
   */
  public function update($enterpriseId, $webAppId, Google_Service_AndroidEnterprise_WebApp $postBody, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'webAppId' => $webAppId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_AndroidEnterprise_WebApp");
  }
}
