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

namespace Google\Service\FirebaseDynamicLinks\Resource;

use Google\Service\FirebaseDynamicLinks\DynamicLinkStats;
use Google\Service\FirebaseDynamicLinks\GetIosPostInstallAttributionRequest;
use Google\Service\FirebaseDynamicLinks\GetIosPostInstallAttributionResponse;
use Google\Service\FirebaseDynamicLinks\GetIosReopenAttributionRequest;
use Google\Service\FirebaseDynamicLinks\GetIosReopenAttributionResponse;

/**
 * The "v1" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebasedynamiclinksService = new Google\Service\FirebaseDynamicLinks(...);
 *   $v1 = $firebasedynamiclinksService->v1;
 *  </code>
 */
class V1 extends \Google\Service\Resource
{
  /**
   * Fetches analytics stats of a short Dynamic Link for a given duration. Metrics
   * include number of clicks, redirects, installs, app first opens, and app
   * reopens. (v1.getLinkStats)
   *
   * @param string $dynamicLink Dynamic Link URL. e.g.
   * https://abcd.app.goo.gl/wxyz
   * @param array $optParams Optional parameters.
   *
   * @opt_param string durationDays The span of time requested in days.
   * @opt_param string sdkVersion Google SDK version. Version takes the form
   * "$major.$minor.$patch"
   * @return DynamicLinkStats
   */
  public function getLinkStats($dynamicLink, $optParams = [])
  {
    $params = ['dynamicLink' => $dynamicLink];
    $params = array_merge($params, $optParams);
    return $this->call('getLinkStats', [$params], DynamicLinkStats::class);
  }
  /**
   * Get iOS strong/weak-match info for post-install attribution.
   * (v1.installAttribution)
   *
   * @param GetIosPostInstallAttributionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GetIosPostInstallAttributionResponse
   */
  public function installAttribution(GetIosPostInstallAttributionRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('installAttribution', [$params], GetIosPostInstallAttributionResponse::class);
  }
  /**
   * Get iOS reopen attribution for app universal link open deeplinking.
   * (v1.reopenAttribution)
   *
   * @param GetIosReopenAttributionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GetIosReopenAttributionResponse
   */
  public function reopenAttribution(GetIosReopenAttributionRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('reopenAttribution', [$params], GetIosReopenAttributionResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(V1::class, 'Google_Service_FirebaseDynamicLinks_Resource_V1');
