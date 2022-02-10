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

class BfdPacket extends \Google\Model
{
  /**
   * @var bool
   */
  public $authenticationPresent;
  /**
   * @var bool
   */
  public $controlPlaneIndependent;
  /**
   * @var bool
   */
  public $demand;
  /**
   * @var string
   */
  public $diagnostic;
  /**
   * @var bool
   */
  public $final;
  /**
   * @var string
   */
  public $length;
  /**
   * @var string
   */
  public $minEchoRxIntervalMs;
  /**
   * @var string
   */
  public $minRxIntervalMs;
  /**
   * @var string
   */
  public $minTxIntervalMs;
  /**
   * @var string
   */
  public $multiplier;
  /**
   * @var bool
   */
  public $multipoint;
  /**
   * @var string
   */
  public $myDiscriminator;
  /**
   * @var bool
   */
  public $poll;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $version;
  /**
   * @var string
   */
  public $yourDiscriminator;

  /**
   * @param bool
   */
  public function setAuthenticationPresent($authenticationPresent)
  {
    $this->authenticationPresent = $authenticationPresent;
  }
  /**
   * @return bool
   */
  public function getAuthenticationPresent()
  {
    return $this->authenticationPresent;
  }
  /**
   * @param bool
   */
  public function setControlPlaneIndependent($controlPlaneIndependent)
  {
    $this->controlPlaneIndependent = $controlPlaneIndependent;
  }
  /**
   * @return bool
   */
  public function getControlPlaneIndependent()
  {
    return $this->controlPlaneIndependent;
  }
  /**
   * @param bool
   */
  public function setDemand($demand)
  {
    $this->demand = $demand;
  }
  /**
   * @return bool
   */
  public function getDemand()
  {
    return $this->demand;
  }
  /**
   * @param string
   */
  public function setDiagnostic($diagnostic)
  {
    $this->diagnostic = $diagnostic;
  }
  /**
   * @return string
   */
  public function getDiagnostic()
  {
    return $this->diagnostic;
  }
  /**
   * @param bool
   */
  public function setFinal($final)
  {
    $this->final = $final;
  }
  /**
   * @return bool
   */
  public function getFinal()
  {
    return $this->final;
  }
  /**
   * @param string
   */
  public function setLength($length)
  {
    $this->length = $length;
  }
  /**
   * @return string
   */
  public function getLength()
  {
    return $this->length;
  }
  /**
   * @param string
   */
  public function setMinEchoRxIntervalMs($minEchoRxIntervalMs)
  {
    $this->minEchoRxIntervalMs = $minEchoRxIntervalMs;
  }
  /**
   * @return string
   */
  public function getMinEchoRxIntervalMs()
  {
    return $this->minEchoRxIntervalMs;
  }
  /**
   * @param string
   */
  public function setMinRxIntervalMs($minRxIntervalMs)
  {
    $this->minRxIntervalMs = $minRxIntervalMs;
  }
  /**
   * @return string
   */
  public function getMinRxIntervalMs()
  {
    return $this->minRxIntervalMs;
  }
  /**
   * @param string
   */
  public function setMinTxIntervalMs($minTxIntervalMs)
  {
    $this->minTxIntervalMs = $minTxIntervalMs;
  }
  /**
   * @return string
   */
  public function getMinTxIntervalMs()
  {
    return $this->minTxIntervalMs;
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
   * @param bool
   */
  public function setMultipoint($multipoint)
  {
    $this->multipoint = $multipoint;
  }
  /**
   * @return bool
   */
  public function getMultipoint()
  {
    return $this->multipoint;
  }
  /**
   * @param string
   */
  public function setMyDiscriminator($myDiscriminator)
  {
    $this->myDiscriminator = $myDiscriminator;
  }
  /**
   * @return string
   */
  public function getMyDiscriminator()
  {
    return $this->myDiscriminator;
  }
  /**
   * @param bool
   */
  public function setPoll($poll)
  {
    $this->poll = $poll;
  }
  /**
   * @return bool
   */
  public function getPoll()
  {
    return $this->poll;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
  /**
   * @param string
   */
  public function setYourDiscriminator($yourDiscriminator)
  {
    $this->yourDiscriminator = $yourDiscriminator;
  }
  /**
   * @return string
   */
  public function getYourDiscriminator()
  {
    return $this->yourDiscriminator;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BfdPacket::class, 'Google_Service_Compute_BfdPacket');
