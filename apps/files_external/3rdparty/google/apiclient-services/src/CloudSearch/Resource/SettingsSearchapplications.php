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

use Google\Service\CloudSearch\ListSearchApplicationsResponse;
use Google\Service\CloudSearch\Operation;
use Google\Service\CloudSearch\ResetSearchApplicationRequest;
use Google\Service\CloudSearch\SearchApplication;

/**
 * The "searchapplications" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudsearchService = new Google\Service\CloudSearch(...);
 *   $searchapplications = $cloudsearchService->searchapplications;
 *  </code>
 */
class SettingsSearchapplications extends \Google\Service\Resource
{
  /**
   * Creates a search application. **Note:** This API requires an admin account to
   * execute. (searchapplications.create)
   *
   * @param SearchApplication $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function create(SearchApplication $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a search application. **Note:** This API requires an admin account to
   * execute. (searchapplications.delete)
   *
   * @param string $name The name of the search application to be deleted. Format:
   * applications/{application_id}.
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
   * Gets the specified search application. **Note:** This API requires an admin
   * account to execute. (searchapplications.get)
   *
   * @param string $name The name of the search application. Format:
   * searchapplications/{application_id}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool debugOptions.enableDebugging If you are asked by Google to
   * help with debugging, set this field. Otherwise, ignore this field.
   * @return SearchApplication
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], SearchApplication::class);
  }
  /**
   * Lists all search applications. **Note:** This API requires an admin account
   * to execute. (searchapplications.listSettingsSearchapplications)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool debugOptions.enableDebugging If you are asked by Google to
   * help with debugging, set this field. Otherwise, ignore this field.
   * @opt_param int pageSize The maximum number of items to return.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any. The default value is 10
   * @return ListSearchApplicationsResponse
   */
  public function listSettingsSearchapplications($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListSearchApplicationsResponse::class);
  }
  /**
   * Updates a search application. **Note:** This API requires an admin account to
   * execute. (searchapplications.patch)
   *
   * @param string $name The name of the Search Application. Format:
   * searchapplications/{application_id}.
   * @param SearchApplication $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Update mask to control which fields to update.
   * If update_mask is non-empty then only the fields specified in the update_mask
   * are updated. If you specify a field in the update_mask, but don't specify its
   * value in the search_application then that field will be cleared. If the
   * update_mask is not present or empty or has the value * then all fields will
   * be updated. Some example field paths: search_application.name,
   * search_application.display_name
   * @return Operation
   */
  public function patch($name, SearchApplication $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Resets a search application to default settings. This will return an empty
   * response. **Note:** This API requires an admin account to execute.
   * (searchapplications.reset)
   *
   * @param string $name The name of the search application to be reset. Format:
   * applications/{application_id}.
   * @param ResetSearchApplicationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function reset($name, ResetSearchApplicationRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('reset', [$params], Operation::class);
  }
  /**
   * Updates a search application. **Note:** This API requires an admin account to
   * execute. (searchapplications.update)
   *
   * @param string $name The name of the Search Application. Format:
   * searchapplications/{application_id}.
   * @param SearchApplication $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Update mask to control which fields to update.
   * If update_mask is non-empty then only the fields specified in the update_mask
   * are updated. If you specify a field in the update_mask, but don't specify its
   * value in the search_application then that field will be cleared. If the
   * update_mask is not present or empty or has the value * then all fields will
   * be updated. Some example field paths: search_application.name,
   * search_application.display_name
   * @return Operation
   */
  public function update($name, SearchApplication $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SettingsSearchapplications::class, 'Google_Service_CloudSearch_Resource_SettingsSearchapplications');
