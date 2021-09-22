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

use Google\Service\Dfareporting\CreativeFieldValue;
use Google\Service\Dfareporting\CreativeFieldValuesListResponse;

/**
 * The "creativeFieldValues" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $creativeFieldValues = $dfareportingService->creativeFieldValues;
 *  </code>
 */
class CreativeFieldValues extends \Google\Service\Resource
{
  /**
   * Deletes an existing creative field value. (creativeFieldValues.delete)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $creativeFieldId Creative field ID for this creative field
   * value.
   * @param string $id Creative Field Value ID
   * @param array $optParams Optional parameters.
   */
  public function delete($profileId, $creativeFieldId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'creativeFieldId' => $creativeFieldId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets one creative field value by ID. (creativeFieldValues.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $creativeFieldId Creative field ID for this creative field
   * value.
   * @param string $id Creative Field Value ID
   * @param array $optParams Optional parameters.
   * @return CreativeFieldValue
   */
  public function get($profileId, $creativeFieldId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'creativeFieldId' => $creativeFieldId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], CreativeFieldValue::class);
  }
  /**
   * Inserts a new creative field value. (creativeFieldValues.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $creativeFieldId Creative field ID for this creative field
   * value.
   * @param CreativeFieldValue $postBody
   * @param array $optParams Optional parameters.
   * @return CreativeFieldValue
   */
  public function insert($profileId, $creativeFieldId, CreativeFieldValue $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'creativeFieldId' => $creativeFieldId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], CreativeFieldValue::class);
  }
  /**
   * Retrieves a list of creative field values, possibly filtered. This method
   * supports paging. (creativeFieldValues.listCreativeFieldValues)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $creativeFieldId Creative field ID for this creative field
   * value.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ids Select only creative field values with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for creative field values by
   * their values. Wildcards (e.g. *) are not allowed.
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @return CreativeFieldValuesListResponse
   */
  public function listCreativeFieldValues($profileId, $creativeFieldId, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'creativeFieldId' => $creativeFieldId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], CreativeFieldValuesListResponse::class);
  }
  /**
   * Updates an existing creative field value. This method supports patch
   * semantics. (creativeFieldValues.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $creativeFieldId CreativeField ID.
   * @param string $id CreativeFieldValue ID.
   * @param CreativeFieldValue $postBody
   * @param array $optParams Optional parameters.
   * @return CreativeFieldValue
   */
  public function patch($profileId, $creativeFieldId, $id, CreativeFieldValue $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'creativeFieldId' => $creativeFieldId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], CreativeFieldValue::class);
  }
  /**
   * Updates an existing creative field value. (creativeFieldValues.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $creativeFieldId Creative field ID for this creative field
   * value.
   * @param CreativeFieldValue $postBody
   * @param array $optParams Optional parameters.
   * @return CreativeFieldValue
   */
  public function update($profileId, $creativeFieldId, CreativeFieldValue $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'creativeFieldId' => $creativeFieldId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], CreativeFieldValue::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreativeFieldValues::class, 'Google_Service_Dfareporting_Resource_CreativeFieldValues');
