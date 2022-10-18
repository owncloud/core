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

use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1CreateDocumentLinkRequest;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1DeleteDocumentLinkRequest;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1DocumentLink;
use Google\Service\Contentwarehouse\GoogleProtobufEmpty;

/**
 * The "documentLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentwarehouseService = new Google\Service\Contentwarehouse(...);
 *   $documentLinks = $contentwarehouseService->documentLinks;
 *  </code>
 */
class ProjectsLocationsDocumentsDocumentLinks extends \Google\Service\Resource
{
  /**
   * Create a link between a source document and a target document.
   * (documentLinks.create)
   *
   * @param string $parent Required. Parent of the document-link to be created.
   * parent of document-link should be a document. Format: projects/{project_numbe
   * r}/locations/{location}/documents/{source_document_id}.
   * @param GoogleCloudContentwarehouseV1CreateDocumentLinkRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContentwarehouseV1DocumentLink
   */
  public function create($parent, GoogleCloudContentwarehouseV1CreateDocumentLinkRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudContentwarehouseV1DocumentLink::class);
  }
  /**
   * Remove the link between the source and target documents.
   * (documentLinks.delete)
   *
   * @param string $name Required. The name of the document-link to be deleted.
   * Format: projects/{project_number}/locations/{location}/documents/{source_docu
   * ment_id}/documentLinks/{document_link_id}.
   * @param GoogleCloudContentwarehouseV1DeleteDocumentLinkRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, GoogleCloudContentwarehouseV1DeleteDocumentLinkRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsDocumentsDocumentLinks::class, 'Google_Service_Contentwarehouse_Resource_ProjectsLocationsDocumentsDocumentLinks');
