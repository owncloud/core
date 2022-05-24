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

use Google\Service\Dfareporting\DynamicTargetingKey;
use Google\Service\Dfareporting\DynamicTargetingKeysListResponse;

/**
 * The "dynamicTargetingKeys" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $dynamicTargetingKeys = $dfareportingService->dynamicTargetingKeys;
 *  </code>
 */
class DynamicTargetingKeys extends \Google\Service\Resource
{
  /**
   * Deletes an existing dynamic targeting key. (dynamicTargetingKeys.delete)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $objectId ID of the object of this dynamic targeting key. This
   * is a required field.
   * @param string $name Name of this dynamic targeting key. This is a required
   * field. Must be less than 256 characters long and cannot contain commas. All
   * characters are converted to lowercase.
   * @param string $objectType Type of the object of this dynamic targeting key.
   * This is a required field.
   * @param array $optParams Optional parameters.
   */
  public function delete($profileId, $objectId, $name, $objectType, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'objectId' => $objectId, 'name' => $name, 'objectType' => $objectType];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Inserts a new dynamic targeting key. Keys must be created at the advertiser
   * level before being assigned to the advertiser's ads, creatives, or
   * placements. There is a maximum of 1000 keys per advertiser, out of which a
   * maximum of 20 keys can be assigned per ad, creative, or placement.
   * (dynamicTargetingKeys.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param DynamicTargetingKey $postBody
   * @param array $optParams Optional parameters.
   * @return DynamicTargetingKey
   */
  public function insert($profileId, DynamicTargetingKey $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], DynamicTargetingKey::class);
  }
  /**
   * Retrieves a list of dynamic targeting keys.
   * (dynamicTargetingKeys.listDynamicTargetingKeys)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId Select only dynamic targeting keys whose
   * object has this advertiser ID.
   * @opt_param string names Select only dynamic targeting keys exactly matching
   * these names.
   * @opt_param string objectId Select only dynamic targeting keys with this
   * object ID.
   * @opt_param string objectType Select only dynamic targeting keys with this
   * object type.
   * @return DynamicTargetingKeysListResponse
   */
  public function listDynamicTargetingKeys($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], DynamicTargetingKeysListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DynamicTargetingKeys::class, 'Google_Service_Dfareporting_Resource_DynamicTargetingKeys');
