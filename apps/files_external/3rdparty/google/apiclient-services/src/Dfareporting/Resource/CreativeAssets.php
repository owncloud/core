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

use Google\Service\Dfareporting\CreativeAssetMetadata;

/**
 * The "creativeAssets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $creativeAssets = $dfareportingService->creativeAssets;
 *  </code>
 */
class CreativeAssets extends \Google\Service\Resource
{
  /**
   * Inserts a new creative asset. (creativeAssets.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $advertiserId Advertiser ID of this creative. This is a
   * required field.
   * @param CreativeAssetMetadata $postBody
   * @param array $optParams Optional parameters.
   * @return CreativeAssetMetadata
   */
  public function insert($profileId, $advertiserId, CreativeAssetMetadata $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'advertiserId' => $advertiserId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], CreativeAssetMetadata::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreativeAssets::class, 'Google_Service_Dfareporting_Resource_CreativeAssets');
