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

namespace Google\Service\ContainerAnalysis;

class CVSS extends \Google\Model
{
  /**
   * @var string
   */
  public $attackComplexity;
  /**
   * @var string
   */
  public $attackVector;
  /**
   * @var string
   */
  public $authentication;
  /**
   * @var string
   */
  public $availabilityImpact;
  /**
   * @var float
   */
  public $baseScore;
  /**
   * @var string
   */
  public $confidentialityImpact;
  /**
   * @var float
   */
  public $exploitabilityScore;
  /**
   * @var float
   */
  public $impactScore;
  /**
   * @var string
   */
  public $integrityImpact;
  /**
   * @var string
   */
  public $privilegesRequired;
  /**
   * @var string
   */
  public $scope;
  /**
   * @var string
   */
  public $userInteraction;

  /**
   * @param string
   */
  public function setAttackComplexity($attackComplexity)
  {
    $this->attackComplexity = $attackComplexity;
  }
  /**
   * @return string
   */
  public function getAttackComplexity()
  {
    return $this->attackComplexity;
  }
  /**
   * @param string
   */
  public function setAttackVector($attackVector)
  {
    $this->attackVector = $attackVector;
  }
  /**
   * @return string
   */
  public function getAttackVector()
  {
    return $this->attackVector;
  }
  /**
   * @param string
   */
  public function setAuthentication($authentication)
  {
    $this->authentication = $authentication;
  }
  /**
   * @return string
   */
  public function getAuthentication()
  {
    return $this->authentication;
  }
  /**
   * @param string
   */
  public function setAvailabilityImpact($availabilityImpact)
  {
    $this->availabilityImpact = $availabilityImpact;
  }
  /**
   * @return string
   */
  public function getAvailabilityImpact()
  {
    return $this->availabilityImpact;
  }
  /**
   * @param float
   */
  public function setBaseScore($baseScore)
  {
    $this->baseScore = $baseScore;
  }
  /**
   * @return float
   */
  public function getBaseScore()
  {
    return $this->baseScore;
  }
  /**
   * @param string
   */
  public function setConfidentialityImpact($confidentialityImpact)
  {
    $this->confidentialityImpact = $confidentialityImpact;
  }
  /**
   * @return string
   */
  public function getConfidentialityImpact()
  {
    return $this->confidentialityImpact;
  }
  /**
   * @param float
   */
  public function setExploitabilityScore($exploitabilityScore)
  {
    $this->exploitabilityScore = $exploitabilityScore;
  }
  /**
   * @return float
   */
  public function getExploitabilityScore()
  {
    return $this->exploitabilityScore;
  }
  /**
   * @param float
   */
  public function setImpactScore($impactScore)
  {
    $this->impactScore = $impactScore;
  }
  /**
   * @return float
   */
  public function getImpactScore()
  {
    return $this->impactScore;
  }
  /**
   * @param string
   */
  public function setIntegrityImpact($integrityImpact)
  {
    $this->integrityImpact = $integrityImpact;
  }
  /**
   * @return string
   */
  public function getIntegrityImpact()
  {
    return $this->integrityImpact;
  }
  /**
   * @param string
   */
  public function setPrivilegesRequired($privilegesRequired)
  {
    $this->privilegesRequired = $privilegesRequired;
  }
  /**
   * @return string
   */
  public function getPrivilegesRequired()
  {
    return $this->privilegesRequired;
  }
  /**
   * @param string
   */
  public function setScope($scope)
  {
    $this->scope = $scope;
  }
  /**
   * @return string
   */
  public function getScope()
  {
    return $this->scope;
  }
  /**
   * @param string
   */
  public function setUserInteraction($userInteraction)
  {
    $this->userInteraction = $userInteraction;
  }
  /**
   * @return string
   */
  public function getUserInteraction()
  {
    return $this->userInteraction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CVSS::class, 'Google_Service_ContainerAnalysis_CVSS');
