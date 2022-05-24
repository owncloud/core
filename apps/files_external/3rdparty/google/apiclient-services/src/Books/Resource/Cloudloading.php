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

namespace Google\Service\Books\Resource;

use Google\Service\Books\BooksCloudloadingResource;
use Google\Service\Books\BooksEmpty;

/**
 * The "cloudloading" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google\Service\Books(...);
 *   $cloudloading = $booksService->cloudloading;
 *  </code>
 */
class Cloudloading extends \Google\Service\Resource
{
  /**
   * Add a user-upload volume and triggers processing. (cloudloading.addBook)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string drive_document_id A drive document id. The
   * upload_client_token must not be set.
   * @opt_param string mime_type The document MIME type. It can be set only if the
   * drive_document_id is set.
   * @opt_param string name The document name. It can be set only if the
   * drive_document_id is set.
   * @opt_param string upload_client_token Scotty upload token.
   * @return BooksCloudloadingResource
   */
  public function addBook($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('addBook', [$params], BooksCloudloadingResource::class);
  }
  /**
   * Remove the book and its contents (cloudloading.deleteBook)
   *
   * @param string $volumeId The id of the book to be removed.
   * @param array $optParams Optional parameters.
   * @return BooksEmpty
   */
  public function deleteBook($volumeId, $optParams = [])
  {
    $params = ['volumeId' => $volumeId];
    $params = array_merge($params, $optParams);
    return $this->call('deleteBook', [$params], BooksEmpty::class);
  }
  /**
   * Updates a user-upload volume. (cloudloading.updateBook)
   *
   * @param BooksCloudloadingResource $postBody
   * @param array $optParams Optional parameters.
   * @return BooksCloudloadingResource
   */
  public function updateBook(BooksCloudloadingResource $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateBook', [$params], BooksCloudloadingResource::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Cloudloading::class, 'Google_Service_Books_Resource_Cloudloading');
