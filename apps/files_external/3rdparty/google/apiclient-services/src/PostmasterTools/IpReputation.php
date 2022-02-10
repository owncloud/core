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

namespace Google\Service\PostmasterTools;

class IpReputation extends \Google\Collection
{
  protected $collection_key = 'sampleIps';
  /**
   * @var string
   */
  public $ipCount;
  /**
   * @var string
   */
  public $reputation;
  /**
   * @var string[]
   */
  public $sampleIps;

  /**
   * @param string
   */
  public function setIpCount($ipCount)
  {
    $this->ipCount = $ipCount;
  }
  /**
   * @return string
   */
  public function getIpCount()
  {
    return $this->ipCount;
  }
  /**
   * @param string
   */
  public function setReputation($reputation)
  {
    $this->reputation = $reputation;
  }
  /**
   * @return string
   */
  public function getReputation()
  {
    return $this->reputation;
  }
  /**
   * @param string[]
   */
  public function setSampleIps($sampleIps)
  {
    $this->sampleIps = $sampleIps;
  }
  /**
   * @return string[]
   */
  public function getSampleIps()
  {
    return $this->sampleIps;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IpReputation::class, 'Google_Service_PostmasterTools_IpReputation');
