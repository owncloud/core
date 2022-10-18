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

use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1CreateDocumentRequest;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1CreateDocumentResponse;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1DeleteDocumentRequest;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1Document;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1FetchAclRequest;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1FetchAclResponse;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1GetDocumentRequest;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1ListLinkedSourcesRequest;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1ListLinkedSourcesResponse;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1ListLinkedTargetsRequest;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1ListLinkedTargetsResponse;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1SearchDocumentsRequest;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1SearchDocumentsResponse;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1SetAclRequest;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1SetAclResponse;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1UpdateDocumentRequest;
use Google\Service\Contentwarehouse\GoogleCloudContentwarehouseV1UpdateDocumentResponse;
use Google\Service\Contentwarehouse\GoogleProtobufEmpty;

/**
 * The "documents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentwarehouseService = new Google\Service\Contentwarehouse(...);
 *   $documents = $contentwarehouseService->documents;
 *  </code>
 */
class ProjectsLocationsDocuments extends \Google\Service\Resource
{
  /**
   * Creates a document. (documents.create)
   *
   * @param string $parent Required. The parent name. Format:
   * projects/{project_number}/locations/{location}.
   * @param GoogleCloudContentwarehouseV1CreateDocumentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContentwarehouseV1CreateDocumentResponse
   */
  public function create($parent, GoogleCloudContentwarehouseV1CreateDocumentRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudContentwarehouseV1CreateDocumentResponse::class);
  }
  /**
   * Deletes a document. Returns NOT_FOUND if the document does not exist.
   * (documents.delete)
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
   * Gets the access control policy for a resource. Returns NOT_FOUND error if the
   * resource does not exist. Returns an empty policy if the resource exists but
   * does not have a policy set. (documents.fetchAcl)
   *
   * @param string $resource Required. REQUIRED: The resource for which the policy
   * is being requested. Format for document:
   * projects/{project_number}/locations/{location}/documents/{document_id}.
   * Format for project: projects/{project_number}.
   * @param GoogleCloudContentwarehouseV1FetchAclRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContentwarehouseV1FetchAclResponse
   */
  public function fetchAcl($resource, GoogleCloudContentwarehouseV1FetchAclRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('fetchAcl', [$params], GoogleCloudContentwarehouseV1FetchAclResponse::class);
  }
  /**
   * Gets a document. Returns NOT_FOUND if the document does not exist.
   * (documents.get)
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
   * Return all source document-links from the document. (documents.linkedSources)
   *
   * @param string $parent Required. The name of the document, for which all
   * source links are returned. Format: projects/{project_number}/locations/{locat
   * ion}/documents/{source_document_id}.
   * @param GoogleCloudContentwarehouseV1ListLinkedSourcesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContentwarehouseV1ListLinkedSourcesResponse
   */
  public function linkedSources($parent, GoogleCloudContentwarehouseV1ListLinkedSourcesRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('linkedSources', [$params], GoogleCloudContentwarehouseV1ListLinkedSourcesResponse::class);
  }
  /**
   * Return all target document-links from the document. (documents.linkedTargets)
   *
   * @param string $parent Required. The name of the document, for which all
   * target links are returned. Format: projects/{project_number}/locations/{locat
   * ion}/documents/{target_document_id}.
   * @param GoogleCloudContentwarehouseV1ListLinkedTargetsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContentwarehouseV1ListLinkedTargetsResponse
   */
  public function linkedTargets($parent, GoogleCloudContentwarehouseV1ListLinkedTargetsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('linkedTargets', [$params], GoogleCloudContentwarehouseV1ListLinkedTargetsResponse::class);
  }
  /**
   * Updates a document. Returns INVALID_ARGUMENT if the name of the document is
   * non-empty and does not equal the existing name. (documents.patch)
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
  /**
   * Searches for documents using provided SearchDocumentsRequest. This call only
   * returns documents that the caller has permission to search against.
   * (documents.search)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * documents. Format: projects/{project_number}/locations/{location}.
   * @param GoogleCloudContentwarehouseV1SearchDocumentsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContentwarehouseV1SearchDocumentsResponse
   */
  public function search($parent, GoogleCloudContentwarehouseV1SearchDocumentsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], GoogleCloudContentwarehouseV1SearchDocumentsResponse::class);
  }
  /**
   * Sets the access control policy for a resource. Replaces any existing policy.
   * (documents.setAcl)
   *
   * @param string $resource Required. REQUIRED: The resource for which the policy
   * is being requested. Format for document:
   * projects/{project_number}/locations/{location}/documents/{document_id}.
   * Format for project: projects/{project_number}.
   * @param GoogleCloudContentwarehouseV1SetAclRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContentwarehouseV1SetAclResponse
   */
  public function setAcl($resource, GoogleCloudContentwarehouseV1SetAclRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setAcl', [$params], GoogleCloudContentwarehouseV1SetAclResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsDocuments::class, 'Google_Service_Contentwarehouse_Resource_ProjectsLocationsDocuments');
