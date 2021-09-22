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

namespace Google\Service\CloudSearch\Resource;

use Google\Service\CloudSearch\DataSource;
use Google\Service\CloudSearch\ListDataSourceResponse;
use Google\Service\CloudSearch\Operation;
use Google\Service\CloudSearch\UpdateDataSourceRequest;

/**
 * The "datasources" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudsearchService = new Google\Service\CloudSearch(...);
 *   $datasources = $cloudsearchService->datasources;
 *  </code>
 */
class SettingsDatasources extends \Google\Service\Resource
{
  /**
   * Creates a datasource. **Note:** This API requires an admin account to
   * execute. (datasources.create)
   *
   * @param DataSource $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function create(DataSource $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
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
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
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
   * @return DataSource
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], DataSource::class);
  }
  /**
   * Lists datasources. **Note:** This API requires an admin account to execute.
   * (datasources.listSettingsDatasources)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool debugOptions.enableDebugging If you are asked by Google to
   * help with debugging, set this field. Otherwise, ignore this field.
   * @opt_param int pageSize Maximum number of datasources to fetch in a request.
   * The max value is 100. The default value is 10
   * @opt_param string pageToken Starting index of the results.
   * @return ListDataSourceResponse
   */
  public function listSettingsDatasources($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListDataSourceResponse::class);
  }
  /**
   * Updates a datasource. **Note:** This API requires an admin account to
   * execute. (datasources.update)
   *
   * @param string $name Name of the datasource resource. Format:
   * datasources/{source_id}. The name is ignored when creating a datasource.
   * @param UpdateDataSourceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function update($name, UpdateDataSourceRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SettingsDatasources::class, 'Google_Service_CloudSearch_Resource_SettingsDatasources');
