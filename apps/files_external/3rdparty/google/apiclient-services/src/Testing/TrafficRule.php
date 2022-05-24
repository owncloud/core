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

namespace Google\Service\Testing;

class TrafficRule extends \Google\Model
{
  /**
   * @var float
   */
  public $bandwidth;
  /**
   * @var float
   */
  public $burst;
  /**
   * @var string
   */
  public $delay;
  /**
   * @var float
   */
  public $packetDuplicationRatio;
  /**
   * @var float
   */
  public $packetLossRatio;

  /**
   * @param float
   */
  public function setBandwidth($bandwidth)
  {
    $this->bandwidth = $bandwidth;
  }
  /**
   * @return float
   */
  public function getBandwidth()
  {
    return $this->bandwidth;
  }
  /**
   * @param float
   */
  public function setBurst($burst)
  {
    $this->burst = $burst;
  }
  /**
   * @return float
   */
  public function getBurst()
  {
    return $this->burst;
  }
  /**
   * @param string
   */
  public function setDelay($delay)
  {
    $this->delay = $delay;
  }
  /**
   * @return string
   */
  public function getDelay()
  {
    return $this->delay;
  }
  /**
   * @param float
   */
  public function setPacketDuplicationRatio($packetDuplicationRatio)
  {
    $this->packetDuplicationRatio = $packetDuplicationRatio;
  }
  /**
   * @return float
   */
  public function getPacketDuplicationRatio()
  {
    return $this->packetDuplicationRatio;
  }
  /**
   * @param float
   */
  public function setPacketLossRatio($packetLossRatio)
  {
    $this->packetLossRatio = $packetLossRatio;
  }
  /**
   * @return float
   */
  public function getPacketLossRatio()
  {
    return $this->packetLossRatio;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrafficRule::class, 'Google_Service_Testing_TrafficRule');
