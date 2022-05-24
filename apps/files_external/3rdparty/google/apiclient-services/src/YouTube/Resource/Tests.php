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

namespace Google\Service\YouTube\Resource;

use Google\Service\YouTube\TestItem;

/**
 * The "tests" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google\Service\YouTube(...);
 *   $tests = $youtubeService->tests;
 *  </code>
 */
class Tests extends \Google\Service\Resource
{
  /**
   * POST method. (tests.insert)
   *
   * @param string|array $part
   * @param TestItem $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string externalChannelId
   * @return TestItem
   */
  public function insert($part, TestItem $postBody, $optParams = [])
  {
    $params = ['part' => $part, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], TestItem::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Tests::class, 'Google_Service_YouTube_Resource_Tests');
