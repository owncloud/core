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

class RouterBgpPeerBfd extends \Google\Model
{
  /**
   * @var string
   */
  public $minReceiveInterval;
  /**
   * @var string
   */
  public $minTransmitInterval;
  /**
   * @var string
   */
  public $multiplier;
  /**
   * @var string
   */
  public $sessionInitializationMode;

  /**
   * @param string
   */
  public function setMinReceiveInterval($minReceiveInterval)
  {
    $this->minReceiveInterval = $minReceiveInterval;
  }
  /**
   * @return string
   */
  public function getMinReceiveInterval()
  {
    return $this->minReceiveInterval;
  }
  /**
   * @param string
   */
  public function setMinTransmitInterval($minTransmitInterval)
  {
    $this->minTransmitInterval = $minTransmitInterval;
  }
  /**
   * @return string
   */
  public function getMinTransmitInterval()
  {
    return $this->minTransmitInterval;
  }
  /**
   * @param string
   */
  public function setMultiplier($multiplier)
  {
    $this->multiplier = $multiplier;
  }
  /**
   * @return string
   */
  public function getMultiplier()
  {
    return $this->multiplier;
  }
  /**
   * @param string
   */
  public function setSessionInitializationMode($sessionInitializationMode)
  {
    $this->sessionInitializationMode = $sessionInitializationMode;
  }
  /**
   * @return string
   */
  public function getSessionInitializationMode()
  {
    return $this->sessionInitializationMode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RouterBgpPeerBfd::class, 'Google_Service_Compute_RouterBgpPeerBfd');
