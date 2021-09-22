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

namespace Google\Service\Docs\Resource;

use Google\Service\Docs\BatchUpdateDocumentRequest;
use Google\Service\Docs\BatchUpdateDocumentResponse;
use Google\Service\Docs\Document;

/**
 * The "documents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $docsService = new Google\Service\Docs(...);
 *   $documents = $docsService->documents;
 *  </code>
 */
class Documents extends \Google\Service\Resource
{
  /**
   * Applies one or more updates to the document. Each request is validated before
   * being applied. If any request is not valid, then the entire request will fail
   * and nothing will be applied. Some requests have replies to give you some
   * information about how they are applied. Other requests do not need to return
   * information; these each return an empty reply. The order of replies matches
   * that of the requests. For example, suppose you call batchUpdate with four
   * updates, and only the third one returns information. The response would have
   * two empty replies, the reply to the third request, and another empty reply,
   * in that order. Because other users may be editing the document, the document
   * might not exactly reflect your changes: your changes may be altered with
   * respect to collaborator changes. If there are no collaborators, the document
   * should reflect your changes. In any case, the updates in your request are
   * guaranteed to be applied together atomically. (documents.batchUpdate)
   *
   * @param string $documentId The ID of the document to update.
   * @param BatchUpdateDocumentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchUpdateDocumentResponse
   */
  public function batchUpdate($documentId, BatchUpdateDocumentRequest $postBody, $optParams = [])
  {
    $params = ['documentId' => $documentId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdate', [$params], BatchUpdateDocumentResponse::class);
  }
  /**
   * Creates a blank document using the title given in the request. Other fields
   * in the request, including any provided content, are ignored. Returns the
   * created document. (documents.create)
   *
   * @param Document $postBody
   * @param array $optParams Optional parameters.
   * @return Document
   */
  public function create(Document $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Document::class);
  }
  /**
   * Gets the latest version of the specified document. (documents.get)
   *
   * @param string $documentId The ID of the document to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string suggestionsViewMode The suggestions view mode to apply to
   * the document. This allows viewing the document with all suggestions inline,
   * accepted or rejected. If one is not specified, DEFAULT_FOR_CURRENT_ACCESS is
   * used.
   * @return Document
   */
  public function get($documentId, $optParams = [])
  {
    $params = ['documentId' => $documentId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Document::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Documents::class, 'Google_Service_Docs_Resource_Documents');
