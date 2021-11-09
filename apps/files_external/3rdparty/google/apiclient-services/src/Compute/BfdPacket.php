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
  public $authenticationPresent;
  public $controlPlaneIndependent;
  public $demand;
  public $diagnostic;
  public $final;
  public $length;
  public $minEchoRxIntervalMs;
  public $minRxIntervalMs;
  public $minTxIntervalMs;
  public $multiplier;
  public $multipoint;
  public $myDiscriminator;
  public $poll;
  public $state;
  public $version;
  public $yourDiscriminator;

  public function setAuthenticationPresent($authenticationPresent)
  {
    $this->authenticationPresent = $authenticationPresent;
  }
  public function getAuthenticationPresent()
  {
    return $this->authenticationPresent;
  }
  public function setControlPlaneIndependent($controlPlaneIndependent)
  {
    $this->controlPlaneIndependent = $controlPlaneIndependent;
  }
  public function getControlPlaneIndependent()
  {
    return $this->controlPlaneIndependent;
  }
  public function setDemand($demand)
  {
    $this->demand = $demand;
  }
  public function getDemand()
  {
    return $this->demand;
  }
  public function setDiagnostic($diagnostic)
  {
    $this->diagnostic = $diagnostic;
  }
  public function getDiagnostic()
  {
    return $this->diagnostic;
  }
  public function setFinal($final)
  {
    $this->final = $final;
  }
  public function getFinal()
  {
    return $this->final;
  }
  public function setLength($length)
  {
    $this->length = $length;
  }
  public function getLength()
  {
    return $this->length;
  }
  public function setMinEchoRxIntervalMs($minEchoRxIntervalMs)
  {
    $this->minEchoRxIntervalMs = $minEchoRxIntervalMs;
  }
  public function getMinEchoRxIntervalMs()
  {
    return $this->minEchoRxIntervalMs;
  }
  public function setMinRxIntervalMs($minRxIntervalMs)
  {
    $this->minRxIntervalMs = $minRxIntervalMs;
  }
  public function getMinRxIntervalMs()
  {
    return $this->minRxIntervalMs;
  }
  public function setMinTxIntervalMs($minTxIntervalMs)
  {
    $this->minTxIntervalMs = $minTxIntervalMs;
  }
  public function getMinTxIntervalMs()
  {
    return $this->minTxIntervalMs;
  }
  public function setMultiplier($multiplier)
  {
    $this->multiplier = $multiplier;
  }
  public function getMultiplier()
  {
    return $this->multiplier;
  }
  public function setMultipoint($multipoint)
  {
    $this->multipoint = $multipoint;
  }
  public function getMultipoint()
  {
    return $this->multipoint;
  }
  public function setMyDiscriminator($myDiscriminator)
  {
    $this->myDiscriminator = $myDiscriminator;
  }
  public function getMyDiscriminator()
  {
    return $this->myDiscriminator;
  }
  public function setPoll($poll)
  {
    $this->poll = $poll;
  }
  public function getPoll()
  {
    return $this->poll;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
  public function setYourDiscriminator($yourDiscriminator)
  {
    $this->yourDiscriminator = $yourDiscriminator;
  }
  public function getYourDiscriminator()
  {
    return $this->yourDiscriminator;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BfdPacket::class, 'Google_Service_Compute_BfdPacket');
