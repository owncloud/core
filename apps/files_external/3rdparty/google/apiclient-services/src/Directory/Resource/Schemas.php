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

namespace Google\Service\Directory\Resource;

use Google\Service\Directory\Schema;
use Google\Service\Directory\Schemas as SchemasModel;

/**
 * The "schemas" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google\Service\Directory(...);
 *   $schemas = $adminService->schemas;
 *  </code>
 */
class Schemas extends \Google\Service\Resource
{
  /**
   * Deletes a schema. (schemas.delete)
   *
   * @param string $customerId Immutable ID of the Google Workspace account.
   * @param string $schemaKey Name or immutable ID of the schema.
   * @param array $optParams Optional parameters.
   */
  public function delete($customerId, $schemaKey, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'schemaKey' => $schemaKey];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves a schema. (schemas.get)
   *
   * @param string $customerId Immutable ID of the Google Workspace account.
   * @param string $schemaKey Name or immutable ID of the schema.
   * @param array $optParams Optional parameters.
   * @return Schema
   */
  public function get($customerId, $schemaKey, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'schemaKey' => $schemaKey];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Schema::class);
  }
  /**
   * Creates a schema. (schemas.insert)
   *
   * @param string $customerId Immutable ID of the Google Workspace account.
   * @param Schema $postBody
   * @param array $optParams Optional parameters.
   * @return Schema
   */
  public function insert($customerId, Schema $postBody, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Schema::class);
  }
  /**
   * Retrieves all schemas for a customer. (schemas.listSchemas)
   *
   * @param string $customerId Immutable ID of the Google Workspace account.
   * @param array $optParams Optional parameters.
   * @return SchemasModel
   */
  public function listSchemas($customerId, $optParams = [])
  {
    $params = ['customerId' => $customerId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], SchemasModel::class);
  }
  /**
   * Patches a schema. (schemas.patch)
   *
   * @param string $customerId Immutable ID of the Google Workspace account.
   * @param string $schemaKey Name or immutable ID of the schema.
   * @param Schema $postBody
   * @param array $optParams Optional parameters.
   * @return Schema
   */
  public function patch($customerId, $schemaKey, Schema $postBody, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'schemaKey' => $schemaKey, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Schema::class);
  }
  /**
   * Updates a schema. (schemas.update)
   *
   * @param string $customerId Immutable ID of the Google Workspace account.
   * @param string $schemaKey Name or immutable ID of the schema.
   * @param Schema $postBody
   * @param array $optParams Optional parameters.
   * @return Schema
   */
  public function update($customerId, $schemaKey, Schema $postBody, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'schemaKey' => $schemaKey, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Schema::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Schemas::class, 'Google_Service_Directory_Resource_Schemas');
