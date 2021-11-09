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

namespace Google\Service\VersionHistory\Resource;

use Google\Service\VersionHistory\ListPlatformsResponse;

/**
 * The "platforms" collection of methods.
 * Typical usage is:
 *  <code>
 *   $versionhistoryService = new Google\Service\VersionHistory(...);
 *   $platforms = $versionhistoryService->platforms;
 *  </code>
 */
class Platforms extends \Google\Service\Resource
{
  /**
   * Returns list of platforms that are available for a given product. The
   * resource "product" has no resource name in its name.
   * (platforms.listPlatforms)
   *
   * @param string $parent Required. The product, which owns this collection of
   * platforms. Format: {product}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. Optional limit on the number of channels to
   * include in the response. If unspecified, the server will pick an appropriate
   * default.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListChannels` call. Provide this to retrieve the subsequent page.
   * @return ListPlatformsResponse
   */
  public function listPlatforms($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPlatformsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Platforms::class, 'Google_Service_VersionHistory_Resource_Platforms');
