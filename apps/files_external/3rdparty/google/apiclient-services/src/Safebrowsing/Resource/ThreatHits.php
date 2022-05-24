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

namespace Google\Service\Safebrowsing\Resource;

use Google\Service\Safebrowsing\GoogleProtobufEmpty;
use Google\Service\Safebrowsing\GoogleSecuritySafebrowsingV4ThreatHit;

/**
 * The "threatHits" collection of methods.
 * Typical usage is:
 *  <code>
 *   $safebrowsingService = new Google\Service\Safebrowsing(...);
 *   $threatHits = $safebrowsingService->threatHits;
 *  </code>
 */
class ThreatHits extends \Google\Service\Resource
{
  /**
   * Reports a Safe Browsing threat list hit to Google. Only projects with
   * TRUSTED_REPORTER visibility can use this method. (threatHits.create)
   *
   * @param GoogleSecuritySafebrowsingV4ThreatHit $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function create(GoogleSecuritySafebrowsingV4ThreatHit $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleProtobufEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ThreatHits::class, 'Google_Service_Safebrowsing_Resource_ThreatHits');
