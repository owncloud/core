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

namespace Google\Service\Contentwarehouse\Resource;

use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1DocumentSchema;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1ListDocumentSchemasResponse;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1UpdateDocumentSchemaRequest;
use Google\Service\Contentwarehouse\GoogleProtobufEmpty;

/**
 * The "documentSchemas" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentwarehouseService = new Google\Service\Contentwarehouse(...);
 *   $documentSchemas = $contentwarehouseService->documentSchemas;
 *  </code>
 */
class ProjectsLocationsDocumentSchemas extends \Google\Service\Resource
{
  /**
   * Creates a document schema. (documentSchemas.create)
   *
   * @param string $parent Required. The parent name.
   * @param GoogleCloudContentwarehouseV1DocumentSchema $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContentwarehouseV1DocumentSchema
   */
  public function create($parent, GoogleCloudContentwarehouseV1DocumentSchema $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudContentwarehouseV1DocumentSchema::class);
  }
  /**
   * Deletes a document schema. Returns NOT_FOUND if the document schema does not
   * exist. (documentSchemas.delete)
   *
   * @param string $name Required. The name of the document schema to delete.
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets a document schema. Returns NOT_FOUND if the document schema does not
   * exist. (documentSchemas.get)
   *
   * @param string $name Required. The name of the document schema to retrieve.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContentwarehouseV1DocumentSchema
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudContentwarehouseV1DocumentSchema::class);
  }
  /**
   * Lists document schemas.
   * (documentSchemas.listProjectsLocationsDocumentSchemas)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * document schemas. Format: projects/{project_number}/locations/{location}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of document schemas to return. The
   * service may return fewer than this value. If unspecified, at most 50 document
   * schemas will be returned. The maximum value is 1000; values above 1000 will
   * be coerced to 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListDocumentSchemas` call. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `ListDocumentSchemas` must
   * match the call that provided the page token.
   * @return GoogleCloudContentwarehouseV1ListDocumentSchemasResponse
   */
  public function listProjectsLocationsDocumentSchemas($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudContentwarehouseV1ListDocumentSchemasResponse::class);
  }
  /**
   * Updates a Document Schema. Returns INVALID_ARGUMENT if the name of the
   * Document Schema is non-empty and does not equal the existing name. Supports
   * only appending new properties and updating existing properties will result
   * into INVALID_ARGUMENT. (documentSchemas.patch)
   *
   * @param string $name Required. The name of the document schema to update.
   * Format: projects/{project_number}/locations/{location}/documentSchemas/{docum
   * ent_schema_id}.
   * @param GoogleCloudContentwarehouseV1UpdateDocumentSchemaRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContentwarehouseV1DocumentSchema
   */
  public function patch($name, GoogleCloudContentwarehouseV1UpdateDocumentSchemaRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudContentwarehouseV1DocumentSchema::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsDocumentSchemas::class, 'Google_Service_Contentwarehouse_Resource_ProjectsLocationsDocumentSchemas');
