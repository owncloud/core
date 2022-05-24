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

use Google\Service\Dfareporting\CreativeField;
use Google\Service\Dfareporting\CreativeFieldsListResponse;

/**
 * The "creativeFields" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $creativeFields = $dfareportingService->creativeFields;
 *  </code>
 */
class CreativeFields extends \Google\Service\Resource
{
  /**
   * Deletes an existing creative field. (creativeFields.delete)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Creative Field ID
   * @param array $optParams Optional parameters.
   */
  public function delete($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets one creative field by ID. (creativeFields.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Creative Field ID
   * @param array $optParams Optional parameters.
   * @return CreativeField
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], CreativeField::class);
  }
  /**
   * Inserts a new creative field. (creativeFields.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param CreativeField $postBody
   * @param array $optParams Optional parameters.
   * @return CreativeField
   */
  public function insert($profileId, CreativeField $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], CreativeField::class);
  }
  /**
   * Retrieves a list of creative fields, possibly filtered. This method supports
   * paging. (creativeFields.listCreativeFields)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserIds Select only creative fields that belong to
   * these advertisers.
   * @opt_param string ids Select only creative fields with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for creative fields by name
   * or ID. Wildcards (*) are allowed. For example, "creativefield*2015" will
   * return creative fields with names like "creativefield June 2015",
   * "creativefield April 2015", or simply "creativefield 2015". Most of the
   * searches also add wild-cards implicitly at the start and the end of the
   * search string. For example, a search string of "creativefield" will match
   * creative fields with the name "my creativefield", "creativefield 2015", or
   * simply "creativefield".
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @return CreativeFieldsListResponse
   */
  public function listCreativeFields($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], CreativeFieldsListResponse::class);
  }
  /**
   * Updates an existing creative field. This method supports patch semantics.
   * (creativeFields.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id CreativeField ID.
   * @param CreativeField $postBody
   * @param array $optParams Optional parameters.
   * @return CreativeField
   */
  public function patch($profileId, $id, CreativeField $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], CreativeField::class);
  }
  /**
   * Updates an existing creative field. (creativeFields.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param CreativeField $postBody
   * @param array $optParams Optional parameters.
   * @return CreativeField
   */
  public function update($profileId, CreativeField $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], CreativeField::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreativeFields::class, 'Google_Service_Dfareporting_Resource_CreativeFields');
