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

namespace Google\Service\Dfareporting\Resource;

use Google\Service\Dfareporting\ContentCategoriesListResponse;
use Google\Service\Dfareporting\ContentCategory;

/**
 * The "contentCategories" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $contentCategories = $dfareportingService->contentCategories;
 *  </code>
 */
class ContentCategories extends \Google\Service\Resource
{
  /**
   * Deletes an existing content category. (contentCategories.delete)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Content category ID.
   * @param array $optParams Optional parameters.
   */
  public function delete($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets one content category by ID. (contentCategories.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Content category ID.
   * @param array $optParams Optional parameters.
   * @return ContentCategory
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ContentCategory::class);
  }
  /**
   * Inserts a new content category. (contentCategories.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param ContentCategory $postBody
   * @param array $optParams Optional parameters.
   * @return ContentCategory
   */
  public function insert($profileId, ContentCategory $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], ContentCategory::class);
  }
  /**
   * Retrieves a list of content categories, possibly filtered. This method
   * supports paging. (contentCategories.listContentCategories)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ids Select only content categories with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for objects by name or ID.
   * Wildcards (*) are allowed. For example, "contentcategory*2015" will return
   * objects with names like "contentcategory June 2015", "contentcategory April
   * 2015", or simply "contentcategory 2015". Most of the searches also add
   * wildcards implicitly at the start and the end of the search string. For
   * example, a search string of "contentcategory" will match objects with name
   * "my contentcategory", "contentcategory 2015", or simply "contentcategory".
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @return ContentCategoriesListResponse
   */
  public function listContentCategories($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ContentCategoriesListResponse::class);
  }
  /**
   * Updates an existing content category. This method supports patch semantics.
   * (contentCategories.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id ContentCategory ID.
   * @param ContentCategory $postBody
   * @param array $optParams Optional parameters.
   * @return ContentCategory
   */
  public function patch($profileId, $id, ContentCategory $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], ContentCategory::class);
  }
  /**
   * Updates an existing content category. (contentCategories.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param ContentCategory $postBody
   * @param array $optParams Optional parameters.
   * @return ContentCategory
   */
  public function update($profileId, ContentCategory $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], ContentCategory::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContentCategories::class, 'Google_Service_Dfareporting_Resource_ContentCategories');
