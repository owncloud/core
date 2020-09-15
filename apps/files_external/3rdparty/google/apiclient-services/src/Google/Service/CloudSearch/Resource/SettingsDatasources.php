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
 * The "datasources" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudsearchService = new Google_Service_CloudSearch(...);
 *   $datasources = $cloudsearchService->datasources;
 *  </code>
 */
class Google_Service_CloudSearch_Resource_SettingsDatasources extends Google_Service_Resource
{
  /**
   * Creates a datasource. **Note:** This API requires an admin account to
   * execute. (datasources.create)
   *
   * @param Google_Service_CloudSearch_DataSource $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudSearch_Operation
   */
  public function create(Google_Service_CloudSearch_DataSource $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudSearch_Operation");
  }
  /**
   * Deletes a datasource. **Note:** This API requires an admin account to
   * execute. (datasources.delete)
   *
   * @param string $name Name of the datasource. Format: datasources/{source_id}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool debugOptions.enableDebugging If you are asked by Google to
   * help with debugging, set this field. Otherwise, ignore this field.
   * @return Google_Service_CloudSearch_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudSearch_Operation");
  }
  /**
   * Gets a datasource. **Note:** This API requires an admin account to execute.
   * (datasources.get)
   *
   * @param string $name Name of the datasource resource. Format:
   * datasources/{source_id}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool debugOptions.enableDebugging If you are asked by Google to
   * help with debugging, set this field. Otherwise, ignore this field.
   * @return Google_Service_CloudSearch_DataSource
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudSearch_DataSource");
  }
  /**
   * Lists datasources. **Note:** This API requires an admin account to execute.
   * (datasources.listSettingsDatasources)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of datasources to fetch in a request.
   * The max value is 100. The default value is 10
   * @opt_param bool debugOptions.enableDebugging If you are asked by Google to
   * help with debugging, set this field. Otherwise, ignore this field.
   * @opt_param string pageToken Starting index of the results.
   * @return Google_Service_CloudSearch_ListDataSourceResponse
   */
  public function listSettingsDatasources($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudSearch_ListDataSourceResponse");
  }
  /**
   * Updates a datasource. **Note:** This API requires an admin account to
   * execute. (datasources.update)
   *
   * @param string $name Name of the datasource resource. Format:
   * datasources/{source_id}. The name is ignored when creating a datasource.
   * @param Google_Service_CloudSearch_UpdateDataSourceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudSearch_Operation
   */
  public function update($name, Google_Service_CloudSearch_UpdateDataSourceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_CloudSearch_Operation");
  }
}
