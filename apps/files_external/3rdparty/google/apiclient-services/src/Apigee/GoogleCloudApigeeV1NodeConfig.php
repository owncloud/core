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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1NodeConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $currentAggregateNodeCount;
  /**
   * @var string
   */
  public $maxNodeCount;
  /**
   * @var string
   */
  public $minNodeCount;

  /**
   * @param string
   */
  public function setCurrentAggregateNodeCount($currentAggregateNodeCount)
  {
    $this->currentAggregateNodeCount = $currentAggregateNodeCount;
  }
  /**
   * @return string
   */
  public function getCurrentAggregateNodeCount()
  {
    return $this->currentAggregateNodeCount;
  }
  /**
   * @param string
   */
  public function setMaxNodeCount($maxNodeCount)
  {
    $this->maxNodeCount = $maxNodeCount;
  }
  /**
   * @return string
   */
  public function getMaxNodeCount()
  {
    return $this->maxNodeCount;
  }
  /**
   * @param string
   */
  public function setMinNodeCount($minNodeCount)
  {
    $this->minNodeCount = $minNodeCount;
  }
  /**
   * @return string
   */
  public function getMinNodeCount()
  {
    return $this->minNodeCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1NodeConfig::class, 'Google_Service_Apigee_GoogleCloudApigeeV1NodeConfig');
