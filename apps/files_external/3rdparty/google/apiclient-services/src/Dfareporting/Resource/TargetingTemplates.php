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

use Google\Service\Dfareporting\TargetingTemplate;
use Google\Service\Dfareporting\TargetingTemplatesListResponse;

/**
 * The "targetingTemplates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $targetingTemplates = $dfareportingService->targetingTemplates;
 *  </code>
 */
class TargetingTemplates extends \Google\Service\Resource
{
  /**
   * Gets one targeting template by ID. (targetingTemplates.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Targeting template ID.
   * @param array $optParams Optional parameters.
   * @return TargetingTemplate
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], TargetingTemplate::class);
  }
  /**
   * Inserts a new targeting template. (targetingTemplates.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param TargetingTemplate $postBody
   * @param array $optParams Optional parameters.
   * @return TargetingTemplate
   */
  public function insert($profileId, TargetingTemplate $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], TargetingTemplate::class);
  }
  /**
   * Retrieves a list of targeting templates, optionally filtered. This method
   * supports paging. (targetingTemplates.listTargetingTemplates)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId Select only targeting templates with this
   * advertiser ID.
   * @opt_param string ids Select only targeting templates with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for objects by name or ID.
   * Wildcards (*) are allowed. For example, "template*2015" will return objects
   * with names like "template June 2015", "template April 2015", or simply
   * "template 2015". Most of the searches also add wildcards implicitly at the
   * start and the end of the search string. For example, a search string of
   * "template" will match objects with name "my template", "template 2015", or
   * simply "template".
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @return TargetingTemplatesListResponse
   */
  public function listTargetingTemplates($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], TargetingTemplatesListResponse::class);
  }
  /**
   * Updates an existing targeting template. This method supports patch semantics.
   * (targetingTemplates.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id TargetingTemplate ID.
   * @param TargetingTemplate $postBody
   * @param array $optParams Optional parameters.
   * @return TargetingTemplate
   */
  public function patch($profileId, $id, TargetingTemplate $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], TargetingTemplate::class);
  }
  /**
   * Updates an existing targeting template. (targetingTemplates.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param TargetingTemplate $postBody
   * @param array $optParams Optional parameters.
   * @return TargetingTemplate
   */
  public function update($profileId, TargetingTemplate $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], TargetingTemplate::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetingTemplates::class, 'Google_Service_Dfareporting_Resource_TargetingTemplates');
