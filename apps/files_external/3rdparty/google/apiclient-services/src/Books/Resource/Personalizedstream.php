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

namespace Google\Service\Books\Resource;

use Google\Service\Books\Discoveryclusters;

/**
 * The "personalizedstream" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google\Service\Books(...);
 *   $personalizedstream = $booksService->personalizedstream;
 *  </code>
 */
class Personalizedstream extends \Google\Service\Resource
{
  /**
   * Returns a stream of personalized book clusters (personalizedstream.get)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string locale ISO-639-1 language and ISO-3166-1 country code. Ex:
   * 'en_US'. Used for generating recommendations.
   * @opt_param string maxAllowedMaturityRating The maximum allowed maturity
   * rating of returned recommendations. Books with a higher maturity rating are
   * filtered out.
   * @opt_param string source String to identify the originator of this request.
   * @return Discoveryclusters
   */
  public function get($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Discoveryclusters::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Personalizedstream::class, 'Google_Service_Books_Resource_Personalizedstream');
