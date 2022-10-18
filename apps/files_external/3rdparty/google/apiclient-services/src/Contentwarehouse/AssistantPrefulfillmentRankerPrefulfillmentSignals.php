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

namespace Google\Service\Contentwarehouse;

class AssistantPrefulfillmentRankerPrefulfillmentSignals extends \Google\Model
{
  public $calibratedParsingScore;
  /**
   * @var float
   */
  public $calibratedParsingScoreFloat;
  /**
   * @var bool
   */
  public $dominant;
  /**
   * @var float
   */
  public $effectiveArgSpanLength;
  public $groundabilityScore;
  /**
   * @var float
   */
  public $inQueryMaxEffectiveArgSpanLength;
  /**
   * @var string
   */
  public $intentName;
  public $intentNameAuisScore;
  public $intentNameAuisScoreExp;
  /**
   * @var bool
   */
  public $maskCandidateLevelFeatures;
  public $numConstraints;
  /**
   * @var float
   */
  public $numConstraintsFloat;
  public $numConstraintsSatisfied;
  /**
   * @var float
   */
  public $numConstraintsSatisfiedFloat;
  public $numGroundableArgs;
  /**
   * @var float
   */
  public $numGroundableArgsFloat;
  public $numGroundedArgs;
  /**
   * @var float
   */
  public $numGroundedArgsFloat;
  public $numVariables;
  /**
   * @var float
   */
  public $numVariablesFloat;
  public $numVariablesGrounded;
  /**
   * @var float
   */
  public $numVariablesGroundedFloat;
  public $pq2tVsAssistantIbstCosine;
  public $pq2tVsIbstCosine;

  public function setCalibratedParsingScore($calibratedParsingScore)
  {
    $this->calibratedParsingScore = $calibratedParsingScore;
  }
  public function getCalibratedParsingScore()
  {
    return $this->calibratedParsingScore;
  }
  /**
   * @param float
   */
  public function setCalibratedParsingScoreFloat($calibratedParsingScoreFloat)
  {
    $this->calibratedParsingScoreFloat = $calibratedParsingScoreFloat;
  }
  /**
   * @return float
   */
  public function getCalibratedParsingScoreFloat()
  {
    return $this->calibratedParsingScoreFloat;
  }
  /**
   * @param bool
   */
  public function setDominant($dominant)
  {
    $this->dominant = $dominant;
  }
  /**
   * @return bool
   */
  public function getDominant()
  {
    return $this->dominant;
  }
  /**
   * @param float
   */
  public function setEffectiveArgSpanLength($effectiveArgSpanLength)
  {
    $this->effectiveArgSpanLength = $effectiveArgSpanLength;
  }
  /**
   * @return float
   */
  public function getEffectiveArgSpanLength()
  {
    return $this->effectiveArgSpanLength;
  }
  public function setGroundabilityScore($groundabilityScore)
  {
    $this->groundabilityScore = $groundabilityScore;
  }
  public function getGroundabilityScore()
  {
    return $this->groundabilityScore;
  }
  /**
   * @param float
   */
  public function setInQueryMaxEffectiveArgSpanLength($inQueryMaxEffectiveArgSpanLength)
  {
    $this->inQueryMaxEffectiveArgSpanLength = $inQueryMaxEffectiveArgSpanLength;
  }
  /**
   * @return float
   */
  public function getInQueryMaxEffectiveArgSpanLength()
  {
    return $this->inQueryMaxEffectiveArgSpanLength;
  }
  /**
   * @param string
   */
  public function setIntentName($intentName)
  {
    $this->intentName = $intentName;
  }
  /**
   * @return string
   */
  public function getIntentName()
  {
    return $this->intentName;
  }
  public function setIntentNameAuisScore($intentNameAuisScore)
  {
    $this->intentNameAuisScore = $intentNameAuisScore;
  }
  public function getIntentNameAuisScore()
  {
    return $this->intentNameAuisScore;
  }
  public function setIntentNameAuisScoreExp($intentNameAuisScoreExp)
  {
    $this->intentNameAuisScoreExp = $intentNameAuisScoreExp;
  }
  public function getIntentNameAuisScoreExp()
  {
    return $this->intentNameAuisScoreExp;
  }
  /**
   * @param bool
   */
  public function setMaskCandidateLevelFeatures($maskCandidateLevelFeatures)
  {
    $this->maskCandidateLevelFeatures = $maskCandidateLevelFeatures;
  }
  /**
   * @return bool
   */
  public function getMaskCandidateLevelFeatures()
  {
    return $this->maskCandidateLevelFeatures;
  }
  public function setNumConstraints($numConstraints)
  {
    $this->numConstraints = $numConstraints;
  }
  public function getNumConstraints()
  {
    return $this->numConstraints;
  }
  /**
   * @param float
   */
  public function setNumConstraintsFloat($numConstraintsFloat)
  {
    $this->numConstraintsFloat = $numConstraintsFloat;
  }
  /**
   * @return float
   */
  public function getNumConstraintsFloat()
  {
    return $this->numConstraintsFloat;
  }
  public function setNumConstraintsSatisfied($numConstraintsSatisfied)
  {
    $this->numConstraintsSatisfied = $numConstraintsSatisfied;
  }
  public function getNumConstraintsSatisfied()
  {
    return $this->numConstraintsSatisfied;
  }
  /**
   * @param float
   */
  public function setNumConstraintsSatisfiedFloat($numConstraintsSatisfiedFloat)
  {
    $this->numConstraintsSatisfiedFloat = $numConstraintsSatisfiedFloat;
  }
  /**
   * @return float
   */
  public function getNumConstraintsSatisfiedFloat()
  {
    return $this->numConstraintsSatisfiedFloat;
  }
  public function setNumGroundableArgs($numGroundableArgs)
  {
    $this->numGroundableArgs = $numGroundableArgs;
  }
  public function getNumGroundableArgs()
  {
    return $this->numGroundableArgs;
  }
  /**
   * @param float
   */
  public function setNumGroundableArgsFloat($numGroundableArgsFloat)
  {
    $this->numGroundableArgsFloat = $numGroundableArgsFloat;
  }
  /**
   * @return float
   */
  public function getNumGroundableArgsFloat()
  {
    return $this->numGroundableArgsFloat;
  }
  public function setNumGroundedArgs($numGroundedArgs)
  {
    $this->numGroundedArgs = $numGroundedArgs;
  }
  public function getNumGroundedArgs()
  {
    return $this->numGroundedArgs;
  }
  /**
   * @param float
   */
  public function setNumGroundedArgsFloat($numGroundedArgsFloat)
  {
    $this->numGroundedArgsFloat = $numGroundedArgsFloat;
  }
  /**
   * @return float
   */
  public function getNumGroundedArgsFloat()
  {
    return $this->numGroundedArgsFloat;
  }
  public function setNumVariables($numVariables)
  {
    $this->numVariables = $numVariables;
  }
  public function getNumVariables()
  {
    return $this->numVariables;
  }
  /**
   * @param float
   */
  public function setNumVariablesFloat($numVariablesFloat)
  {
    $this->numVariablesFloat = $numVariablesFloat;
  }
  /**
   * @return float
   */
  public function getNumVariablesFloat()
  {
    return $this->numVariablesFloat;
  }
  public function setNumVariablesGrounded($numVariablesGrounded)
  {
    $this->numVariablesGrounded = $numVariablesGrounded;
  }
  public function getNumVariablesGrounded()
  {
    return $this->numVariablesGrounded;
  }
  /**
   * @param float
   */
  public function setNumVariablesGroundedFloat($numVariablesGroundedFloat)
  {
    $this->numVariablesGroundedFloat = $numVariablesGroundedFloat;
  }
  /**
   * @return float
   */
  public function getNumVariablesGroundedFloat()
  {
    return $this->numVariablesGroundedFloat;
  }
  public function setPq2tVsAssistantIbstCosine($pq2tVsAssistantIbstCosine)
  {
    $this->pq2tVsAssistantIbstCosine = $pq2tVsAssistantIbstCosine;
  }
  public function getPq2tVsAssistantIbstCosine()
  {
    return $this->pq2tVsAssistantIbstCosine;
  }
  public function setPq2tVsIbstCosine($pq2tVsIbstCosine)
  {
    $this->pq2tVsIbstCosine = $pq2tVsIbstCosine;
  }
  public function getPq2tVsIbstCosine()
  {
    return $this->pq2tVsIbstCosine;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantPrefulfillmentRankerPrefulfillmentSignals::class, 'Google_Service_Contentwarehouse_AssistantPrefulfillmentRankerPrefulfillmentSignals');
