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

namespace Google\Service\Acceleratedmobilepageurl\Resource;

use Google\Service\Acceleratedmobilepageurl\BatchGetAmpUrlsRequest;
use Google\Service\Acceleratedmobilepageurl\BatchGetAmpUrlsResponse;

/**
 * The "ampUrls" collection of methods.
 * Typical usage is:
 *  <code>
 *   $acceleratedmobilepageurlService = new Google\Service\Acceleratedmobilepageurl(...);
 *   $ampUrls = $acceleratedmobilepageurlService->ampUrls;
 *  </code>
 */
class AmpUrls extends \Google\Service\Resource
{
  /**
   * Returns AMP URL(s) and equivalent [AMP Cache URL(s)](/amp/cache/overview#amp-
   * cache-url-format). (ampUrls.batchGet)
   *
   * @param BatchGetAmpUrlsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchGetAmpUrlsResponse
   */
  public function batchGet(BatchGetAmpUrlsRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', [$params], BatchGetAmpUrlsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AmpUrls::class, 'Google_Service_Acceleratedmobilepageurl_Resource_AmpUrls');
