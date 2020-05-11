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
class Google_Service_CloudSearch_Resource_IndexingDatasources extends Google_Service_Resource
{
  /**
   * Deletes the schema of a data source.
   *
   * **Note:** This API requires an admin or service account to execute.
   * (datasources.deleteSchema)
   *
   * @param string $name Name of the data source to delete Schema.  Format:
   * datasources/{source_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool debugOptions.enableDebugging If you are asked by Google to
   * help with debugging, set this field. Otherwise, ignore this field.
   * @return Google_Service_CloudSearch_Operation
   */
  public function deleteSchema($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('deleteSchema', array($params), "Google_Service_CloudSearch_Operation");
  }
  /**
   * Gets the schema of a data source.
   *
   * **Note:** This API requires an admin or service account to execute.
   * (datasources.getSchema)
   *
   * @param string $name Name of the data source to get Schema.  Format:
   * datasources/{source_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool debugOptions.enableDebugging If you are asked by Google to
   * help with debugging, set this field. Otherwise, ignore this field.
   * @return Google_Service_CloudSearch_Schema
   */
  public function getSchema($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getSchema', array($params), "Google_Service_CloudSearch_Schema");
  }
  /**
   * Updates the schema of a data source. This method does not perform incremental
   * updates to the schema. Instead, this method updates the schema by overwriting
   * the entire schema.
   *
   * **Note:** This API requires an admin or service account to execute.
   * (datasources.updateSchema)
   *
   * @param string $name Name of the data source to update Schema.  Format:
   * datasources/{source_id}
   * @param Google_Service_CloudSearch_UpdateSchemaRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudSearch_Operation
   */
  public function updateSchema($name, Google_Service_CloudSearch_UpdateSchemaRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateSchema', array($params), "Google_Service_CloudSearch_Operation");
  }
}
