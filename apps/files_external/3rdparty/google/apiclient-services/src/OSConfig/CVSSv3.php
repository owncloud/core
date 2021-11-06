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

namespace Google\Service\OSConfig;

class CVSSv3 extends \Google\Model
{
  public $attackComplexity;
  public $attackVector;
  public $availabilityImpact;
  public $baseScore;
  public $confidentialityImpact;
  public $exploitabilityScore;
  public $impactScore;
  public $integrityImpact;
  public $privilegesRequired;
  public $scope;
  public $userInteraction;

  public function setAttackComplexity($attackComplexity)
  {
    $this->attackComplexity = $attackComplexity;
  }
  public function getAttackComplexity()
  {
    return $this->attackComplexity;
  }
  public function setAttackVector($attackVector)
  {
    $this->attackVector = $attackVector;
  }
  public function getAttackVector()
  {
    return $this->attackVector;
  }
  public function setAvailabilityImpact($availabilityImpact)
  {
    $this->availabilityImpact = $availabilityImpact;
  }
  public function getAvailabilityImpact()
  {
    return $this->availabilityImpact;
  }
  public function setBaseScore($baseScore)
  {
    $this->baseScore = $baseScore;
  }
  public function getBaseScore()
  {
    return $this->baseScore;
  }
  public function setConfidentialityImpact($confidentialityImpact)
  {
    $this->confidentialityImpact = $confidentialityImpact;
  }
  public function getConfidentialityImpact()
  {
    return $this->confidentialityImpact;
  }
  public function setExploitabilityScore($exploitabilityScore)
  {
    $this->exploitabilityScore = $exploitabilityScore;
  }
  public function getExploitabilityScore()
  {
    return $this->exploitabilityScore;
  }
  public function setImpactScore($impactScore)
  {
    $this->impactScore = $impactScore;
  }
  public function getImpactScore()
  {
    return $this->impactScore;
  }
  public function setIntegrityImpact($integrityImpact)
  {
    $this->integrityImpact = $integrityImpact;
  }
  public function getIntegrityImpact()
  {
    return $this->integrityImpact;
  }
  public function setPrivilegesRequired($privilegesRequired)
  {
    $this->privilegesRequired = $privilegesRequired;
  }
  public function getPrivilegesRequired()
  {
    return $this->privilegesRequired;
  }
  public function setScope($scope)
  {
    $this->scope = $scope;
  }
  public function getScope()
  {
    return $this->scope;
  }
  public function setUserInteraction($userInteraction)
  {
    $this->userInteraction = $userInteraction;
  }
  public function getUserInteraction()
  {
    return $this->userInteraction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CVSSv3::class, 'Google_Service_OSConfig_CVSSv3');
