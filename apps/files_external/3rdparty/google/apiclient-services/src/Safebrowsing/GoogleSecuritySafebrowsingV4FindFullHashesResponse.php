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

namespace Google\Service\Safebrowsing;

class GoogleSecuritySafebrowsingV4FindFullHashesResponse extends \Google\Collection
{
  protected $collection_key = 'matches';
  protected $matchesType = GoogleSecuritySafebrowsingV4ThreatMatch::class;
  protected $matchesDataType = 'array';
  public $minimumWaitDuration;
  public $negativeCacheDuration;

  /**
   * @param GoogleSecuritySafebrowsingV4ThreatMatch[]
   */
  public function setMatches($matches)
  {
    $this->matches = $matches;
  }
  /**
   * @return GoogleSecuritySafebrowsingV4ThreatMatch[]
   */
  public function getMatches()
  {
    return $this->matches;
  }
  public function setMinimumWaitDuration($minimumWaitDuration)
  {
    $this->minimumWaitDuration = $minimumWaitDuration;
  }
  public function getMinimumWaitDuration()
  {
    return $this->minimumWaitDuration;
  }
  public function setNegativeCacheDuration($negativeCacheDuration)
  {
    $this->negativeCacheDuration = $negativeCacheDuration;
  }
  public function getNegativeCacheDuration()
  {
    return $this->negativeCacheDuration;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleSecuritySafebrowsingV4FindFullHashesResponse::class, 'Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4FindFullHashesResponse');
