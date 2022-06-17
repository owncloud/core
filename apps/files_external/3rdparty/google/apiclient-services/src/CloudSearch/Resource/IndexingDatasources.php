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

use Google\Service\CloudSearch\Operation;
use Google\Service\CloudSearch\Schema;
use Google\Service\CloudSearch\UpdateSchemaRequest;

/**
 * The "datasources" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudsearchService = new Google\Service\CloudSearch(...);
 *   $datasources = $cloudsearchService->datasources;
 *  </code>
 */
class IndexingDatasources extends \Google\Service\Resource
{
  /**
   * Deletes the schema of a data source. **Note:** This API requires an admin or
   * service account to execute. (datasources.deleteSchema)
   *
   * @param string $name The name of the data source to delete Schema. Format:
   * datasources/{source_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool debugOptions.enableDebugging If you are asked by Google to
   * help with debugging, set this field. Otherwise, ignore this field.
   * @return Operation
   */
  public function deleteSchema($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('deleteSchema', [$params], Operation::class);
  }
  /**
   * Gets the schema of a data source. **Note:** This API requires an admin or
   * service account to execute. (datasources.getSchema)
   *
   * @param string $name The name of the data source to get Schema. Format:
   * datasources/{source_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool debugOptions.enableDebugging If you are asked by Google to
   * help with debugging, set this field. Otherwise, ignore this field.
   * @return Schema
   */
  public function getSchema($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getSchema', [$params], Schema::class);
  }
  /**
   * Updates the schema of a data source. This method does not perform incremental
   * updates to the schema. Instead, this method updates the schema by overwriting
   * the entire schema. **Note:** This API requires an admin or service account to
   * execute. (datasources.updateSchema)
   *
   * @param string $name The name of the data source to update Schema. Format:
   * datasources/{source_id}
   * @param UpdateSchemaRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function updateSchema($name, UpdateSchemaRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateSchema', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingDatasources::class, 'Google_Service_CloudSearch_Resource_IndexingDatasources');
