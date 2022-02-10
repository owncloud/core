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

namespace Google\Service\Monitoring;

class Exponential extends \Google\Model
{
  public $growthFactor;
  /**
   * @var int
   */
  public $numFiniteBuckets;
  public $scale;

  public function setGrowthFactor($growthFactor)
  {
    $this->growthFactor = $growthFactor;
  }
  public function getGrowthFactor()
  {
    return $this->growthFactor;
  }
  /**
   * @param int
   */
  public function setNumFiniteBuckets($numFiniteBuckets)
  {
    $this->numFiniteBuckets = $numFiniteBuckets;
  }
  /**
   * @return int
   */
  public function getNumFiniteBuckets()
  {
    return $this->numFiniteBuckets;
  }
  public function setScale($scale)
  {
    $this->scale = $scale;
  }
  public function getScale()
  {
    return $this->scale;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Exponential::class, 'Google_Service_Monitoring_Exponential');
