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

namespace Google\Service\SearchConsole\Resource;

use Google\Service\SearchConsole\RunMobileFriendlyTestRequest;
use Google\Service\SearchConsole\RunMobileFriendlyTestResponse;

/**
 * The "mobileFriendlyTest" collection of methods.
 * Typical usage is:
 *  <code>
 *   $searchconsoleService = new Google\Service\SearchConsole(...);
 *   $mobileFriendlyTest = $searchconsoleService->mobileFriendlyTest;
 *  </code>
 */
class UrlTestingToolsMobileFriendlyTest extends \Google\Service\Resource
{
  /**
   * Runs Mobile-Friendly Test for a given URL. (mobileFriendlyTest.run)
   *
   * @param RunMobileFriendlyTestRequest $postBody
   * @param array $optParams Optional parameters.
   * @return RunMobileFriendlyTestResponse
   */
  public function run(RunMobileFriendlyTestRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('run', [$params], RunMobileFriendlyTestResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UrlTestingToolsMobileFriendlyTest::class, 'Google_Service_SearchConsole_Resource_UrlTestingToolsMobileFriendlyTest');
