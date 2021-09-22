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

use Google\Service\Dfareporting\RemarketingListShare;

/**
 * The "remarketingListShares" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $remarketingListShares = $dfareportingService->remarketingListShares;
 *  </code>
 */
class RemarketingListShares extends \Google\Service\Resource
{
  /**
   * Gets one remarketing list share by remarketing list ID.
   * (remarketingListShares.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $remarketingListId Remarketing list ID.
   * @param array $optParams Optional parameters.
   * @return RemarketingListShare
   */
  public function get($profileId, $remarketingListId, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'remarketingListId' => $remarketingListId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], RemarketingListShare::class);
  }
  /**
   * Updates an existing remarketing list share. This method supports patch
   * semantics. (remarketingListShares.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id RemarketingList ID.
   * @param RemarketingListShare $postBody
   * @param array $optParams Optional parameters.
   * @return RemarketingListShare
   */
  public function patch($profileId, $id, RemarketingListShare $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], RemarketingListShare::class);
  }
  /**
   * Updates an existing remarketing list share. (remarketingListShares.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param RemarketingListShare $postBody
   * @param array $optParams Optional parameters.
   * @return RemarketingListShare
   */
  public function update($profileId, RemarketingListShare $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], RemarketingListShare::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RemarketingListShares::class, 'Google_Service_Dfareporting_Resource_RemarketingListShares');
