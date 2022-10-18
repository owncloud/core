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

use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1DeleteDocumentRequest;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1Document;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1GetDocumentRequest;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1UpdateDocumentRequest;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1UpdateDocumentResponse;
use Google\Service\Contentwarehouse\GoogleProtobufEmpty;

/**
 * The "referenceId" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentwarehouseService = new Google\Service\Contentwarehouse(...);
 *   $referenceId = $contentwarehouseService->referenceId;
 *  </code>
 */
class ProjectsLocationsDocumentsReferenceId extends \Google\Service\Resource
{
  /**
   * Deletes a document. Returns NOT_FOUND if the document does not exist.
   * (referenceId.delete)
   *
   * @param string $name Required. The name of the document to delete. Format:
   * projects/{project_number}/locations/{location}/documents/{document_id} or pro
   * jects/{project_number}/locations/{location}/documents/referenceId/{reference_
   * id}.
   * @param GoogleCloudContentwarehouseV1DeleteDocumentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, GoogleCloudContentwarehouseV1DeleteDocumentRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets a document. Returns NOT_FOUND if the document does not exist.
   * (referenceId.get)
   *
   * @param string $name Required. The name of the document to retrieve. Format:
   * projects/{project_number}/locations/{location}/documents/{document_id} or pro
   * jects/{project_number}/locations/{location}/documents/referenceId/{reference_
   * id}.
   * @param GoogleCloudContentwarehouseV1GetDocumentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContentwarehouseV1Document
   */
  public function get($name, GoogleCloudContentwarehouseV1GetDocumentRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudContentwarehouseV1Document::class);
  }
  /**
   * Updates a document. Returns INVALID_ARGUMENT if the name of the document is
   * non-empty and does not equal the existing name. (referenceId.patch)
   *
   * @param string $name Required. The name of the document to update. Format:
   * projects/{project_number}/locations/{location}/documents/{document_id} or pro
   * jects/{project_number}/locations/{location}/documents/referenceId/{reference_
   * id}.
   * @param GoogleCloudContentwarehouseV1UpdateDocumentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContentwarehouseV1UpdateDocumentResponse
   */
  public function patch($name, GoogleCloudContentwarehouseV1UpdateDocumentRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudContentwarehouseV1UpdateDocumentResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsDocumentsReferenceId::class, 'Google_Service_Contentwarehouse_Resource_ProjectsLocationsDocumentsReferenceId');
