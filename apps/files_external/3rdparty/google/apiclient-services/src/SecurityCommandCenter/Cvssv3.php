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

namespace Google\Service\SecurityCommandCenter;

class Cvssv3 extends \Google\Model
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
  public $availabilityImpact;
  public $baseScore;
  /**
   * @var string
   */
  public $confidentialityImpact;
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
  public function setBaseScore($baseScore)
  {
    $this->baseScore = $baseScore;
  }
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
class_alias(Cvssv3::class, 'Google_Service_SecurityCommandCenter_Cvssv3');
