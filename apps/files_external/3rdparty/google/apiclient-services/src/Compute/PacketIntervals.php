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

namespace Google\Service\Compute;

class PacketIntervals extends \Google\Model
{
  /**
   * @var string
   */
  public $avgMs;
  /**
   * @var string
   */
  public $duration;
  /**
   * @var string
   */
  public $maxMs;
  /**
   * @var string
   */
  public $minMs;
  /**
   * @var string
   */
  public $numIntervals;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setAvgMs($avgMs)
  {
    $this->avgMs = $avgMs;
  }
  /**
   * @return string
   */
  public function getAvgMs()
  {
    return $this->avgMs;
  }
  /**
   * @param string
   */
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return string
   */
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param string
   */
  public function setMaxMs($maxMs)
  {
    $this->maxMs = $maxMs;
  }
  /**
   * @return string
   */
  public function getMaxMs()
  {
    return $this->maxMs;
  }
  /**
   * @param string
   */
  public function setMinMs($minMs)
  {
    $this->minMs = $minMs;
  }
  /**
   * @return string
   */
  public function getMinMs()
  {
    return $this->minMs;
  }
  /**
   * @param string
   */
  public function setNumIntervals($numIntervals)
  {
    $this->numIntervals = $numIntervals;
  }
  /**
   * @return string
   */
  public function getNumIntervals()
  {
    return $this->numIntervals;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PacketIntervals::class, 'Google_Service_Compute_PacketIntervals');
