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

namespace Google\Service\CloudResourceManager\Resource;

use Google\Service\CloudResourceManager\ListEffectiveTagsResponse;

/**
 * The "effectiveTags" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudresourcemanagerService = new Google\Service\CloudResourceManager(...);
 *   $effectiveTags = $cloudresourcemanagerService->effectiveTags;
 *  </code>
 */
class EffectiveTags extends \Google\Service\Resource
{
  /**
   * Return a list of effective tags for the given cloud resource, as specified in
   * `parent`. (effectiveTags.listEffectiveTags)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of effective tags to
   * return in the response. The server allows a maximum of 300 effective tags to
   * return in a single page. If unspecified, the server will use 100 as the
   * default.
   * @opt_param string pageToken Optional. A pagination token returned from a
   * previous call to `ListEffectiveTags` that indicates from where this listing
   * should continue.
   * @opt_param string parent Required. The full resource name of a resource for
   * which you want to list the effective tags. E.g.
   * "//cloudresourcemanager.googleapis.com/projects/123"
   * @return ListEffectiveTagsResponse
   */
  public function listEffectiveTags($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListEffectiveTagsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EffectiveTags::class, 'Google_Service_CloudResourceManager_Resource_EffectiveTags');
